<?php

namespace App\Http\Controllers;

use DateTime;
use GuzzleHttp\Client;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //show all customer
    public function customers(){  

        // Try to reach data from docker api if cannot redirect to index
        try{
            $this->storeNewCustomers();

            //Get all customers from model
            $customers = Customer::all();

            return view('customers',[
                'customers' => $customers            
            ]);

        }catch (\Exception $e) {
            return redirect('/');
        }
    }

    public static function getCustomers(){

        //Used Client from GuzzleHttp to make a HTTP GET request 
        $client = new Client([
            'base_uri' => 'http://localhost:8080/api/v1/customers',
            'headers' => ['Content-Type' => 'application/json']
        ]);

        $response = $client->request('GET', 'customers');
        // Get body content of response 

        $customers = json_decode(($response->getBody()->getContents()), true);
        return $customers;              
    }
    
    public function storeNewCustomers(){
        // Clear current data from the customers table to add new customers every time
        Customer::truncate();

        // Run function to get customers from api
        $customers = $this->getCustomers();    
         
        //Store data to Customer model 
        foreach ($customers['customers'] as $customer) {
            $newCustomer = new Customer;
            $newCustomer->bsn = $customer['bsn'];
            $newCustomer->firstName = $customer['firstName'];
            $newCustomer->lastName = $customer['lastName'];
            $newCustomer->address = $customer['address']['street'];
            $newCustomer->city = $customer['address']['city'];
            $newCustomer->dateOfBirth = $customer['dateOfBirth'];
            $newCustomer->phoneNumber = $customer['phoneNumber'];
            $newCustomer->ipAddress = $customer['ipAddress'];
            $newCustomer->iban = $customer['iban'];
            $newCustomer->isFraudulent = 0;
            $newCustomer->description = '';
            $newCustomer->save();
        }       
    }    
}
