<template>
    <div>
        <h5 id="associating-form-text-with-form-controls">Name:</h5>
        <!-- {{ product.name }}: This is a Vue template expression, which will display the value of product.name. The double curly braces {{ }} are used for string interpolation in Vue. -->
        <h6>{{ product.name }}</h6>
        <h5 id="associating-form-text-with-form-controls">Description:</h5>
        <!-- {{ product.description }}: Displays the value of product.description -->
        <p>{{ product.description }}</p>
        <h5 id="associating-form-text-with-form-controls">Price:</h5>
        <!-- {{ product.price }}: Displays the value of product.price -->
        <p>Price: {{ product.price }}</p>
        <!-- <router-link>: This is a Vue Router component that creates a link. When clicked, it will navigate to a different route without causing a full-page reload.
         
        :to="/products/${product.id}/edit": This binds the to prop of the <router-link> to a computed URL. The ${product.id} part uses JavaScript template literals to insert the product's id into the URL.
        -->
        <router-link :to="`/products/${product.id}/edit`" class="btn btn-primary">Edit</router-link>
    </div>
</template>

<script>
// This imports the axios library, a popular HTTP client for making API requests.
import axios from 'axios';
// This line starts the definition of the Vue component. export default means that this component can be imported into other files.
export default {
    // The data() function is a core feature of Vue components. It returns the component's reactive data object. Here, we have a single product property initialized as an empty object.
data() {
    return {
    product: {}
    }
},
// The created() function is a Vue lifecycle hook that gets called immediately after the component instance is created. It's asynchronous because of the async keyword, allowing the use of await inside it.

async created() {
    // Starts a try block. This allows error handling for the subsequent code.
    try {
    // Makes an asynchronous API request to fetch a product based on its id. The id is extracted from the current route's parameters (this.$route.params.id).
    const response = await axios.get(`/api/products/${this.$route.params.id}`);
    this.product = response.data;
    // Assigns the data received from the API response to the product data property of the component.
    } catch (error) {
    // Logs the error to the browser's console.
    console.error(error);
    }
}
}
</script>