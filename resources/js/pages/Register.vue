<template>
    <div class="container container-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
                    <strong>{{error}}</strong>
                </div>
                
                <div class="card card-default">
                    <div class="card-header"><h5>Entrar no Sistema</h5></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row mt-1">
                                <label for="name" class="col-md-5 col-form-label text-md-right">Nome</label>
                                <div class="col-md-7">
                                    <input id="name" type="name" class="form-control" v-model="name"
                                           required autocomplete="off" placeholder="Insíra seu Nome">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-5 col-form-label text-md-right">Endereço de E-Mail</label>
                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Seu Melhor E-Mail">
                                </div>
                            </div>



                            <div class="form-group row mt-1">
                                <label for="password" class="col-md-5 col-form-label text-md-right">Crie sua Senha</label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off" placeholder="Crie sua Senha">
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-success form-control" @click="handleSubmit">
                                        Criar Conta
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-12 offset-md-2">
                                    <small class="text-muted">
                                        Ja tem uma conta? Entre Aqui 
                                        <router-link to="/login" >Acessar Conta</router-link>
                                    </small>
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
        data() {
            return {
                name: "",
                email: "",
                password: "",
                error: null
            }
        },

        methods: {
            handleSubmit(e) {
                e.preventDefault()
                if(this.password.length > 0) {
                    this.$axios.get('/sanctum/csrf-cookie').then(response => {
                        this.$axios.post('api/register', {
                            name: this.name,
                            email: this.email,
                            password: this.password
                        })
                        .then(response => {
                            if (response.data.success) {
                                this.$router.push('/dashboard');
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                    })
                }
            }
        },

        beforeRouteEnter(to, from, next) {
            if (window.Laravel.isLoggedin) {
                return next('dashboard');
            }
            next();
        }
    }
</script>


<style>
 
 body{
    background: #e2e2e2;
 }
 .container-body{
    display: flex;
    justify-content: center;
    align-items: center;
 }

</style>