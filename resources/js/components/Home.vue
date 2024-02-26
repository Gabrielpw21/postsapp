<template>
    <div class="container">
        <div class="col-md-8 ">
            <h2>Minhas Publicações <a class="btn btn-primary ml-3" @click="newPost()"> <b>+</b> </a></h2>
            
        </div>
        <hr />
        <div
            class="card mt-3"
            v-for="post in posts"
            :key="post.id"
            style="width: auto"
        >
            <div class="card-body">
                <h5 class="card-title">{{ post.user_name }}</h5>
                <p class="card-text">{{ post.textPost }}</p>
                <p class="card-text">{{ post.created_at }}</p>
            </div>
            <div class="card-footer">
                <button
                    class="btn btn-danger float-end mx-auto"
                    @click="deletePost(post.id)"
                >
                    <b>Excluir</b>
                </button>
                <a class="btn btn-warning ml-3" @click="editPost(post.id)">
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
            posts: [],
            nameUser: "",
        };
    },
    created() {},
    methods: {
        newPost() {
            this.$router.push("/add");
        },
        editPost(id) {
            this.$router.push(`/edit/${id}`);
        },
        deletePost(id) {
            this.$axios
                .delete(`api/posts/delete/${id}`)
                .then((response) => {
                    window.location.href = "/home";
                })
                .catch(function (error) {
                    strError = "";
                });
        },
    },

    mounted() {
        this.$axios
            .get(`api/getPostByUserId/${localStorage.getItem("user_id")}`)
            .then((response) => {
                this.posts = response.data.postsUser;
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
