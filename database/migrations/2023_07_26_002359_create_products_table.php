<?php

// Import necessary classes to be used in the migration.
use Illuminate\Database\Migrations\Migration;  // Base class for all migrations.
use Illuminate\Database\Schema\Blueprint;     // Blueprint is used for defining the structure of database tables.
use Illuminate\Support\Facades\Schema;        // Facade class for interacting with the database's schema.

// Define a new anonymous class that extends Laravel's Migration class.
// This approach, using an anonymous class, was introduced in Laravel 8.
return new class extends Migration
{
    // Method to execute the migration (i.e., create the 'products' table).
    public function up(): void
    {
        // Using Laravel's Schema facade to define and create the 'products' table.
        Schema::create('products', function (Blueprint $table) {
            // Define an auto-incrementing ID column as the primary key.
            $table->id();
            // Define a 'name' column of type string (varchar).
            $table->string('name');
            // Define a 'description' column of type text, suitable for longer texts.
            $table->text('description');
            // Define a 'price' column of type float for storing product prices.
            $table->float('price');
            // Add 'created_at' and 'updated_at' timestamp columns for tracking creation and update times.
            $table->timestamps();
        });
    }

    // Method to reverse the migration (i.e., drop the 'products' table).
    public function down(): void
    {
        // Using Laravel's Schema facade to drop the 'products' table.
        Schema::dropIfExists('products');
    }
};
