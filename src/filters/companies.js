import { getElement } from "../utils.js";
import display from "../displayProducts.js";

const setupCompanies = (store) => {
    let companies = [
        "all",
        ...new Set(store.map((product) => product.company)),
    ];
    const companiesDOM = getElement(".companies");
    companiesDOM.innerHTML = companies
        .map((company) => {
            return ` <button class="company-btn">${company}</button>`;
        })
        .join("");
    companiesDOM.addEventListener("click", function (e) {
        const element = e.target;
        if (element.classList.contains("company-btn")) {
            let newStore = [];
            if (element.textContent === "all") {
                newStore = [...store];
            } else {
                newStore = store.filter(
                    (product) => product.company === e.target.textContent
                );
            }
            console.log(newStore);
            display(newStore, getElement(".products-container"));
        }
    });
};

// const setupCompanies = (store) => {
//     let companies = [
//         "all",
//         ...new Set(store.map((product) => product.company)),
//     ];
//     // console.log(companies);
//     let companiesDOM = getElement(".companies");
//     companiesDOM.innerHTML = companies
//         .map((company) => {
//             return `<button class="company-btn">${company}</button>`;
//         })
//         .join("");
//     companiesDOM.addEventListener("click", (e) => {
//         const element = e.target.textContent;
//         console.log(element);
//         let newStore = store.filter((product) => {
//             if (product.company == element) {
//                 return product;
//             }
//         });
//         console.log(newStore);
//         display(newStore, getElement(".products-container"));
//         if (element == "all") {
//             display(store, getElement(".products-container"));
//         }
//     });
// };

export default setupCompanies;
