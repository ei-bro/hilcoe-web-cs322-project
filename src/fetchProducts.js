// import { allProducts } from "../data/allProducts.js";
const fetchProducts = async () => {
    const response = await fetch("../data/allProducts.json").catch((err) =>
        console.log(err)
    );
    if (response) {
        // console.log(response);
        return response.json();
    }
    return response;
};

export default fetchProducts;
