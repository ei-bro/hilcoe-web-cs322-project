// global imports
import "./src/toggleSidebar.js";
import "./src/cart/toggleCart.js";
import "./src/cart/setupCart.js";
// specific imports
import fetchProducts from "./src/fetchProducts.js";
import { setupStore, store } from "./src/store.js";
import display from "./src/displayProducts.js";
import { getElement } from "./src/utils.js";

const init = async () => {
	const products = await fetchProducts();
	console.log(products);
	if (products) {
		// add products to the store
		setupStore(products);
		// console.log(store);
		const featured = store.filter((product) => product.featured === "1");
		// console.log(featured);
		display(featured, getElement(".featured-center"));
	}
};
window.addEventListener("DOMContentLoaded", init);
