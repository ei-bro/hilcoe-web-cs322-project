import { getElement } from "../utils.js";
import display from "../displayProducts.js";

const setupPrice = (store) => {
	const priceInput = getElement(".price-filter");
	const priceValue = getElement(".price-value");

	// setup filter
	let maxPrice = store.map((product) => product.price);
	maxPrice = Math.max(...maxPrice);
	// console.log(maxPrice);
	maxPrice = Math.ceil(maxPrice / 10);
	priceInput.value = maxPrice;
	priceInput.max = maxPrice;
	priceInput.min = 0;
	priceValue.innerHTML = `Value : <b>ETB</b> - ${maxPrice}`;
	// console.log(maxPrice);

	priceInput.addEventListener("input", function () {
		const value = parseInt(priceInput.value);
		console.log(value);
		priceValue.innerHTML = `Value : <b>ETB</b> - ${value}`;
		let newStore = store.filter((product) => product.price / 10 <= value);
		display(newStore, getElement(".products-container"));
		if (newStore.length < 1) {
			const products = getElement(".products-container");
			products.innerHTML = `<h3 class="filter-error"><b>
       sorry,</b> no products matched
       </h3>`;
		}
	});
};

export default setupPrice;
