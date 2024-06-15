<template>
    <div class="container">
        <div class="col-md-8 ">
            <h2>Minhas Publicações <a class="btn btn-primary ml-3" @click="newPost()"> <b>+</b> </a></h2>
            
        </div>
        <hr />
        <div
            class="card mt-3"
            v-for="product in products"
            :key="product.id"
            style="width: auto"
        >
            <div class="card-body">
                <h5 class="card-title">{{ product.name }}</h5>
                <p class="card-text">{{ product.name_product }}</p>
                <p class="card-text">{{ product.created_at }}</p>
            </div>
            <div class="card-footer">
                <button
                    class="btn btn-danger float-end mx-auto"
                    @click="deletePost(product.id)"
                >
                    <b>Excluir</b>
                </button>
                <a class="btn btn-warning ml-3" @click="editPost(product.id)">
                    Editar
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "myposts",
    data() {
        return {
            products: [],
            nameUser: "",
        };
    },
    created() {},
    methods: {
        newPost() {
            this.$router.push("/admin/add");
        },
        editPost(id) {
            this.$router.push(`/admin/edit/${id}`);
        },
        deletePost(id) {
            this.$axios
                .delete(`/api/product/delete/${id}`)
                .then((response) => {
                    window.location.href = "/admin/home";
                })
                .catch(function (error) {
                    strError = "";
                });
        },
    },

    mounted() {
        this.$axios
            .get(`/api/getProductsByUserId/${localStorage.getItem("user_id")}`)
            .then((response) => {
                this.products = response.data.productsUser;

            });
    },
};
</script>

<style>
body {
    overflow-y: scroll !important;
    overflow-x: hidden !important;
}
</style>
