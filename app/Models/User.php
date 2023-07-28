<?php

// Define the namespace for this class, following PSR-4 autoloading standards.
// This is a common practice in Laravel to organize classes.
namespace App\Models;

// Importing necessary classes to be used in the model.
// The commented-out class, MustVerifyEmail, would be used if email verification was required for the user.
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;      // Trait to allow factory methods for seeding and testing.
use Illuminate\Foundation\Auth\User as Authenticatable;    // Base class that includes authentication features for the model.
use Illuminate\Notifications\Notifiable;                   // Trait that allows the model to be "notifiable", meaning it can receive notifications.
use Laravel\Sanctum\HasApiTokens;                          // Trait from Laravel Sanctum that provides API token abilities to the model.

// Define the User class which extends Laravel's Authenticatable class.
// This means users represented by this model can be authenticated.
class User extends Authenticatable
{
    // Using multiple traits for the User model.
    // HasApiTokens provides features related to API token management.
    // HasFactory enables the model to be associated with a factory for database seeding/testing.
    // Notifiable allows the user to receive notifications.
    use HasApiTokens, HasFactory, Notifiable;

    // The $fillable property defines an array of column names that are allowed to be mass-assigned.
    // This means when creating or updating a model instance, only these columns can be set from input data.
    protected $fillable = [
        'name',           // The name of the user.
        'email',          // The email of the user.
        'password',       // The password for the user.
    ];

    // The $hidden property specifies which attributes should be hidden when the model is converted to an array or JSON.
    // This is useful for sensitive information like passwords.
    protected $hidden = [
        'password',          // Hide the password when showing user data.
        'remember_token',    // Hide the remember_token, used for "remember me" functionality during authentication.
    ];

    // The $casts property defines how certain attributes should be cast when accessed.
    // In this case, the email_verified_at attribute is cast to a datetime instance, and
    // the password is considered as hashed (though this specific casting isn't standard in Laravel).
    protected $casts = [
        'email_verified_at' => 'datetime', // Cast the email_verified_at attribute to a datetime instance.
        'password' => 'hashed',            // A custom cast, which isn't standard in Laravel.
    ];
}
