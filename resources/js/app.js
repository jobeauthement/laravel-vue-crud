/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import "./bootstrap";
// import { createApp } from "vue";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

// const app = createApp({});

// import ExampleComponent from "./components/ExampleComponent.vue";
// app.component("example-component", ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

// Importing the createApp function from Vue.js. This function is used to create a new instance of a Vue app.
import { createApp } from "vue";

// Importing functions related to Vue Router. createRouter is used to define a new router, and createWebHistory is used for browser history mode.
import { createRouter, createWebHistory } from "vue-router";

// Importing Vue components that will be used in the application.
import App from "./components/App.vue"; // Main App component
import ProductList from "./components/ProductList.vue"; // Component to display a list of products
import ProductForm from "./components/ProductForm.vue"; // Component for adding and editing products
import Product from "./components/Product.vue"; // Component to display a single product

// Creating a new router instance. This defines the different paths of the application and maps them to their respective components.
const router = createRouter({
    // Setting the router to use "history" mode, which eliminates the need for "#" in URLs.
    history: createWebHistory(),
    // Defining the routes for the application.
    routes: [
        { path: "/", component: ProductList }, // Root path displays the product list
        { path: "/products/create", component: ProductForm }, // Path for adding a new product
        { path: "/products/:id", component: Product }, // Dynamic path for displaying a single product based on its ID
        { path: "/products/:id/edit", component: ProductForm }, // Dynamic path for editing a product based on its ID
    ],
});

// Creating a new Vue app instance using the main App component.
const app = createApp(App);

// Making the Vue app use the router we defined earlier. This integrates Vue Router with the app.
app.use(router);

// Mounting the Vue app to a DOM element with the id of "app". This is where the Vue app will render its content.
app.mount("#app");
