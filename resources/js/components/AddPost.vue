<template>
    <div class="container container-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default col-md-12">
                    <div class="card-header"><h5>Adicione uma Publicação</h5></div>
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

                            <div class="form-group row mt-3 mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <button
                                        type="submit"
                                        class="btn btn-success form-control"
                                        @click="createPost"
                                    >
                                        Criar Publicação
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
    name: "add",
    data() {
        return {
            product: {
                name_product: "",
                price: "",
                img_path: "",
            },
            user: {},
        };
    },

    methods: {
        createPost(e) {
            e.preventDefault();
            var datePost = new Date().toLocaleString(); 
            this.$axios
                .post('/api/posts/addPost', {
                    name_product: this.product.name_product,
                    price: this.product.price,
                    img_path: this.product.img_path,
                    user_id: localStorage.getItem('user_id'),
                    dateFormat: datePost
                })
                .then((response) => {
                    this.$router.push('/admin/home')
                });
        },
    },

    mounted() {
        this.$axios.get("api/user").then((response) => {
            this.user = response.data;
        });
        
    },

}
</script>
