<template>
    <div class="container">

        <div
            class="card mt-3"
            v-for="post in posts"
            :key="post.id"
            style="width: auto"
        >
            <div class="card-body">
                <h5 class="card-title">{{ post.user.name }}</h5>
                <p class="card-text">{{ post.textPost }}</p>
                <p class="card-text">{{ post.dateFormat }}</p>
                
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
    name: "posts",
    data() {
        return {
            posts: [],
            nameUser: "",
        };
    },
    created() {},
    methods: {

        fetchAllProducts() {

            this.$axios.get("/api/allProducts").then((response) => {
                this.posts = response.data.allProducts;

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
