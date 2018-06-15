<template>
    <div>
        <div v-if="okInfo" class="alert alert-success">{{okInfo.msg}}</div>
    <div class="panel panel-primary">
        <div class="panel-heading">New Product</div>
        <div class="panel-body">

            <form @submit.prevent="newProduct">
                <div class="form-group">
                    <input @keypress="clearInfo"  @keydown="form.errors.clear('title')" type="text" v-model="form.title"  class="form-control" placeholder="Product Title">
                    <div class="text-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></div>
                </div>
                <div class="form-group">
                    <textarea @change="newProduct" @keydown="form.errors.clear('body')" class="form-control" v-model="form.body" placeholder="Product Body">

                    </textarea>
                    <div class="text-danger" v-if="form.errors.has('body')" v-text="form.errors.get('body')"></div>


                </div>
                <div class="form-group">
                    <button class="btn btn-primary" :disabled="form.errors.any()">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</template>


<script>

    export default {

        data(){
          return{
              okInfo: '',
              form : new Form({
                  title : '',
                  body : ''
              }),

          }
        },


        methods:{
            newProduct(){
                this.form.post('api/new-product').then(result=>this.okInfo=result);
            }
            ,
            clearInfo(){
                this.okInfo=''
            }
        }

    }
</script>