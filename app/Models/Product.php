<?php

// Define the namespace for this class, following PSR-4 autoloading standards.
// This is a common practice in Laravel to organize classes.
namespace App\Models;

// Import necessary classes to be used in the model.
use Illuminate\Database\Eloquent\Factories\HasFactory;  // Trait to allow factory methods for seeding and testing.
use Illuminate\Database\Eloquent\Model;                  // Base Eloquent model class from which all Eloquent models extend.

// Define the Product class which extends Laravel's Eloquent Model class.
class Product extends Model
{
    // Use the HasFactory trait. This enables the model to be associated with a factory for database seeding/testing.
    use HasFactory;

    // Define the $fillable property. 
    // It's an array of column names that you allow to be mass assigned.
    // This means when creating or updating a model instance, only these columns can be set from input data.
    protected $fillable = [
        'name',           // The name of the product.
        'description',    // The description of the product.
        'price',          // The price of the product.
    ];
}
