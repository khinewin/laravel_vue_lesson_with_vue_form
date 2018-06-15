<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div v-for="pd in products">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{pd.title}} <span class="pull-right">{{getMn(pd)}} </span></div>
                        <div class="panel-body">
                            <p>{{pd.body}} ,,, <small>Post By : {{pd.user.name}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
               <new-product-form @completed="pullProduct"></new-product-form>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Product from '../model/products';
    import newProductForm from '../component/newProductForm';
    export default {
        components : {
            newProductForm
        },

        data(){
            return{
                products:[]
            }
        },
        created(){

            Product.getAll()
            .then(({data})=>this.products=data);
        },
        methods:{
            getMn(pd){
                return moment(pd.created_at).fromNow();
            },
            pullProduct(){
                Product.getAll()
                    .then(({data})=>this.products=data);
            }
        }
    }
</script>
