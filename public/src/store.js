import { getStorageItem, setStorageItem } from "./utils.js";
let store = getStorageItem("store");
const setupStore = (products) => {
	store = products.map((product) => {
		const { id, featured, name, price, company, image } = product;

		return { id, featured, name, price, company, image };
	});
	setStorageItem("store", store);
};
// console.log(store);
const findProduct = (id) => {
	let product = store.find((product) => product.id === id);
	return product;
};
export { store, setupStore, findProduct };
