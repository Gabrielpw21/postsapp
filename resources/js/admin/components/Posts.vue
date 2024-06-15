<template>
    <div class="container">

        <div
            class="card mt-3"
            v-for="product in products"
            :key="product.id"
            style="width: auto"
        >
            <div class="card-body">
                <h5 class="card-title">{{ product.user.name }}</h5>
                <p class="card-text">{{ product.name_product }}</p>
                <img :src="`../../../${product.img_path }`" width="100" height="100" alt="">
                <p class="card-text">{{ product.dateFormat }}</p>
                
            </div>
            <!-- <div class="card-footer" v-if="token">
                <button class="btn btn-danger" @click="deletePost(post.id)">
                    Excluir
                </button>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    name: "products",
    data() {
        return {
            products: [],
            nameUser: "",
        };
    },
    created() {},
    methods: {

        fetchAllProducts() {

            this.$axios.get("/api/allProducts").then((response) => {
                this.products = response.data.allProducts;

                this.nameUser = this.allProducts;
            });
        },

        deletePost(id) {
            this.$axios
                .delete(`/api/product/delete/${id}`)
                .then((response) => {
                    $isTrueMsg = true;
                    this.$router.push("/");
                })
                .catch(function (error) {
                    $isErrorMsg = true;
                    strError = "";
                    
                });
        },
    },

    mounted() {
        this.fetchAllProducts();
    },
};
</script>

<style>
    body{
        overflow-y:scroll !important;
        overflow-x:hidden !important;
    }
</style>
