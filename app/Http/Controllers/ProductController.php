<?php

// Define the namespace for the controller. This helps in organizing and structuring the codebase.
namespace App\Http\Controllers;

// Importing the necessary classes to be used in the controller.
use App\Models\Product; // Eloquent model for the Product table in the database.
use Illuminate\Http\Request; // Class to represent HTTP requests.

// Define a controller class named 'ProductController' that extends the base 'Controller' class.
class ProductController extends Controller
{
    // Method to retrieve and display all products from the database.
    public function index()
    {
        // Return all records from the 'products' table.
        return Product::all();
    }

    // Method to show a form for creating a new product. (This method is empty but can be filled as needed.)
    public function create()
    {
        //
    }

    // Method to save a new product to the database.
    public function store(Request $request)
    {
        // Validate incoming request data. Ensure 'name', 'description', and 'price' fields are present.
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
    
        // Create a new product record in the database using the validated data and return the created product.
        return Product::create($request->all());
    }

    // Method to display a specific product based on its ID.
    public function show(Product $product)
    {
        // Return the specific product passed as a parameter.
        return $product;
    }

    // Method to show a form for editing a specific product. (This method is empty but can be filled as needed.)
    public function edit(Product $product)
    {
        //
    }

    // Method to update a specific product's details in the database.
    public function update(Request $request, Product $product)
    {
        // Validate incoming request data. Ensure 'name', 'description', and 'price' fields are present.
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
    
        // Update the specific product's details in the database using the validated data.
        $product->update($request->all());
    
        // Return the updated product.
        return $product;
    }

    // Method to delete a specific product from the database.
    public function destroy(Product $product)
    {
        // Delete the specified product from the database.
        $product->delete();
        
        // Return a JSON response indicating the product was successfully deleted.
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
