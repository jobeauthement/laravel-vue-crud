<template>
    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Loop through each product in the products array -->
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>              <!-- Display product ID -->
                    <td>{{ product.name }}</td>            <!-- Display product name -->
                    <td>{{ product.description }}</td>     <!-- Display product description -->
                    <td>{{ product.price }}</td>           <!-- Display product price -->
                    <td>
                      <!-- Action buttons for each product -->
                      <div class="row gap-3">
                        <!-- View button - navigates to product details page -->
                        <router-link :to="`/products/${product.id}`" class="p-2 col border btn btn-primary">View</router-link>
                        <!-- Edit button - navigates to product edit page -->
                        <router-link :to="`/products/${product.id}/edit`" class="p-2 col border btn btn-success">Edit</router-link>
                        <!-- Delete button - calls the deleteProduct method with product's ID -->
                        <button @click="deleteProduct(product.id)" type="button" class="p-2 col border btn btn-danger">Delete</button>
                      </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'; // Import the Axios library for making HTTP requests

export default {
  data() {
    return {
      products: [] // Initialize an empty products array
    }
  },
  async created() {
    try {
      // Fetch the list of products from the API when the component is created
      const response = await axios.get('/api/products');
      this.products = response.data; // Assign the fetched products to the products array
    } catch (error) {
      // Log any errors that occur during the HTTP request
      console.error(error);
    }
  },
  methods: {
    async deleteProduct(id) {
      try {
        // Send a DELETE request to the API to delete a product by its ID
        await axios.delete(`/api/products/${id}`);
        // Update the products array to remove the deleted product
        this.products = this.products.filter(product => product.id !== id);
      } catch (error) {
        // Log any errors that occur during the HTTP request
        console.error(error);
      }
    }
  }
}
</script>