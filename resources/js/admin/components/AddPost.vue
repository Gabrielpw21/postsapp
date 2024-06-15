<template>
    <div class="container container-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default col-md-12">
                    <div class="card-header">
                        <h5>Adicione uma Publicação</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row mt-1">
                                <label class="col-md-12 col-form-label text-md-right">Nome do Produto: </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" v-model="product.name_product"
                                        autocomplete="off" placeholder="" value="{{ product.name_product }}">
                                </div>
                                <div class="col-12">
                                    <label for="price">Preço: </label>
                                    <input type="text" v-model="product.price">
                                </div>

                                <div class="col-6">
                                    <label for="files">Fotos do Produto: </label>
                                    <input type="file" name="img_path" @change="fileChange">
                                </div>
                                <div class="col-6"></div>
                            </div>

                            <div class="form-group row mt-3 mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-success form-control" @click="createProduct">
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
        async createProduct(e) {
            e.preventDefault();
            try {
                let dataForm = new FormData();
                dataForm.append('name_product', this.product.name_product);
                dataForm.append('price', this.product.price);
                dataForm.append('user_id', localStorage.getItem('user_id'));
                dataForm.append('img_path', this.product.img_path); // Certifique-se de que img_path esteja corretamente configurado

                const response = await this.$axios.post('/api/posts/addProduct', dataForm, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                console.log(response);
                this.uploadStts = response.data.message;
            } catch (error) {
                this.uploadStatus = 'Erro ao criar Produto';
            }
        },
        fileChange(e) {
            this.product.img_path = e.target.files[0];
        },
    },

    mounted() {
        this.$axios.get("api/user").then((response) => {
            this.user = response.data;
        });

    },

}
</script>
