<template>
  <div>
    <!-- <h2 v-if="isNewProduct">Add Product</h2>: The v-if directive in Vue is used to conditionally render this <h2> tag. If isNewProduct is true, "Add Product" will be displayed.
    <h2 v-else>Edit Product</h2>: The v-else directive is used to render this <h2> tag if the v-if condition isn't met (i.e., isNewProduct is false). In this case, "Edit Product" will be displayed. -->
    <h2 v-if="isNewProduct">Add Product</h2>
    <h2 v-else>Edit Product</h2>
    <!-- <form @submit.prevent="submitForm">: This is a form element. The @submit.prevent is a Vue directive that listens for the form's submit event and prevents the default action (which is to refresh the page). Instead, it calls the submitForm method defined in the component. -->
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <!-- The <input> field: v-model="product.name" creates a two-way data binding on the input field, meaning that it will both update product.name whenever the input changes and set the input's value to product.name. This pattern repeats for the "Description" and "Price" fields, each with their corresponding input types (textarea for "Description" and type="number" for "Price").-->
          <input class="form-control" type="text" id="name" v-model="product.name" required />
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea class="form-control" id="description" v-model="product.description" required></textarea>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price:</label>
          <input class="form-control" type="number" id="price" v-model="product.price" required />
        </div>
        <!-- These two <button> elements are the form's submit buttons. Just like the <h2> tags above, the button to display depends on whether isNewProduct is true or false.
        html -->
        <button type="submit" v-if="isNewProduct" class="btn btn-primary">Add Product</button>
        <button type="submit" v-else class="btn btn-primary">Update Product</button>
      </form>
  </div>
</template>

<script>
// The axios library is imported for making HTTP requests.
import axios from 'axios';

// The export default statement marks the beginning of the Vue component definition.
export default {
  /*
  The data() function returns the reactive data object for this component. Here, it's a product object with name, description, and price properties.
  */
  data() {
    return {
      product: {
        name: '',
        description: '',
        price: 0
      }
    }
  },
  /*
  The computed property contains computed properties, which are reactive and update when their dependencies change. Here, isNewProduct checks if the current route's path contains the word 'edit', and returns the inverse of that. So, if the path includes 'edit', isNewProduct will be false, and vice versa.
  */
  computed: {
    isNewProduct() {
      return !this.$route.path.includes('edit');
    }
  },
  async created() {
    if (!this.isNewProduct) {
      const response = await axios.get(`/api/products/${this.$route.params.id}`);
      this.product = response.data;
    }
  },
  methods: {
    async submitForm() {
      try {
        if (this.isNewProduct) {
          await axios.post('/api/products', this.product);
        } else {
          await axios.put(`/api/products/${this.$route.params.id}`, this.product);
        }
        this.$router.push('/');
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>