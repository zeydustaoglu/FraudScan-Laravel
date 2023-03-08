<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $fillable = ['bsn', 'firstName', 'lastName',
    'address','city','dateOfBirth','phoneNumber','ipAddress','iban','isFraudulent','description'];
}
