<template>
    <div class="container container-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div v-if="error == true" class="alert alert-success text-center" role="alert">
                Estamos te redirecionando...
            </div>


                <div class="card card-default mx-auto">
                    <div class="card-header text-center mt-2">
                        <h5>Entrar no Sistema</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-6 col-form-label text-md-right"
                                    >Endereço de E-Mail</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        v-model="user.email"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Enter your email"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <label
                                    for="password"
                                    class="col-md-6 col-form-label text-md-right"
                                    >Sua Senha</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        v-model="user.password"
                                        required
                                        autocomplete="off"
                                        placeholder="Enter your password"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mt-2 mb-0">
                                <div class="col-md-6 offset-md-3">
                                    <button
                                        type="submit"
                                        class="btn btn-success form-control"
                                        @click="loginUser"
                                    >
                                        Entrar
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-6 offset-md-4">
                                    <small class="text-muted">
                                        Não Possui uma Conta? Crie Aqui
                                        <router-link to="/admin/register"
                                            >Criar Conta</router-link
                                        >
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
            user: {
                email: "",
                password: "",
                device_name: "browser",
            },
           error: null,
        };
    },

    methods: {
        loginUser(e) {
            e.preventDefault();
            if (this.user.password.length > 0) {
                this.$axios
                    .post("api/login", this.user)
                    .then((response) => {
                        localStorage.setItem("token", response.data.token);
                        localStorage.setItem("user_id", response.data.user.id);
                        this.error = true;
                        setInterval(() => {
                            window.location.href = "/admin/load";
                            this.isLoggedin = true;
                        }, 3000);
                    })
                    .catch(function (error) {
                        this.error = false;
                    });
            }
        },

        mounted(){
            const token = localStorage.getItem('user_id');
            if(!token){
                window.location.href = '/admin/posts';
            }
        }
    },
};
</script>

<style>
.container-body {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
