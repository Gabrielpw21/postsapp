<template>
    <div class="container container-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default col-md-12">
                    <div class="card-header"><h5>Entrar no Sistema</h5></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row mt-1">
                                <label
                                    class="col-md-12 col-form-label text-md-right"
                                    >Texto da Publicação</label
                                >
                                <div class="col-md-12">
                                    <textarea
                                        type="text"
                                        class="form-control"
                                        v-model="post"
                                        required
                                        autocomplete="off"
                                        placeholder=""
                                        value="{{ post }}"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="form-group row mt-3 mx-auto mb-0">
                                <div class="col-md-6 ">
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                        @click="updatePost"
                                    >
                                        Editar Publicação
                                    </button>
                                </div>
                                <div class="col-md-6 ">
                                    <button class="btn btn-primary float-end mx-auto" @click="backPage">
                                        Voltar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "edit",
    data() {
        return {
            post: "",
            user: {},
        };
    },

    methods: {
        backPage(){
            this.$router.push('/home');
        },
        updatePost(e) {
            e.preventDefault();
            this.$axios
                .post(`/api/posts/update/${this.$route.params.id}`, {
                    textPost: this.post,
                })
                .then((response) => {
                    this.$router.push('/home')
                });
        },
    },

    mounted() {
        this.$axios
            .get(`/api/posts/edit/${this.$route.params.id}`)
            .then((response) => {
                this.post = response.data.textPost;
            });

        this.$axios.get("api/user").then((response) => {
            this.user = response.data;
        });
    },
};
</script>
