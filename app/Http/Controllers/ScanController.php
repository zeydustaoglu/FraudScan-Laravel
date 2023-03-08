<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Customer;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    //Scan customers
    public function scanCustomers(){  

        //To get customers from model
        $customers = Customer::all();

        // filter if customer fraudulent or not
        foreach ($customers as $customer) {

            $isFraudulent = false;
            $reason = '';

            // Find the customers which have same iban and ip address 
            // Remark customers as a Fraud and add description about the reason 
            foreach ($customers as $otherCustomer) {
                
                if ($customer->id !== $otherCustomer->id) {
                    if ($customer->iban === $otherCustomer->iban) {
                        $isFraudulent = true;
                        $reason = 'Customer has same Iban as ' . $otherCustomer->firstName . ' ' . $otherCustomer->lastName;
                        break;
                    }
                    if ($customer->ipAddress === $otherCustomer->ipAddress) {
                        $isFraudulent = true;
                        $reason = 'Customer has same IP as ' . $otherCustomer->firstName . ' ' . $otherCustomer->lastName;
                        break;
                    }
                }
            }

            // Control if customer younger than 18
            if ($this->calculateAge($customer->dateOfBirth) < 18) {
                $isFraudulent = true;
                $reason = 'Customer is younger than 18 years old';
            }

            // Control if customer has nl phone number or not
            if (substr($customer->phoneNumber, 0, 3) !== '+31') {
                $isFraudulent = true;
                $reason = 'Customer has non-NL phone nr.';
            } 

            // Update customers with relevant data after scan
            $customer = Customer::find($customer->id);
            $customer->description = $reason;
            $customer->isFraudulent = $isFraudulent ? 1 : 0;
            $customer->updated_at = now();
            $customer->save();
        }

        // Get new data to send scan page
        $customers = Customer::all();

        return view('scan',[
            'customers' => $customers   ,
            'total'  => Customer::where('isFraudulent', 1)->count()   
        ]);
    }

    // Get Scan details view page for each customer
    public static function scanDetail($id){

        $customer = Customer::find($id);

        return view('scanDetail ',[
            'customer' => $customer           
        ]);
    }
    
    // convert date of birth to age
    public function calculateAge($dateOfBirth) {
        $today = new DateTime();
        $diff = $today->diff(DateTime::createFromFormat('d-m-Y', $dateOfBirth));
        return $diff->y;
    }
}
