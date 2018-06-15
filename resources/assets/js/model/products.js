class Product{

    static getAll(){
        return axios.get('api/products');
    }
}

export  default Product;