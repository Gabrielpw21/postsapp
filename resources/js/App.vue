<template>
    <div class="container">
        <nav class="navbar navbar-expand-sm mb-4">
            <a class="navbar-brand" href="#">Processo Seletivo Vue 3</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            ></button>

            <div class="dropdown"></div>
            <div class="navbar-nav dropdown" v-if="isLoggedin">
                <button
                    class="btn btn-warning dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    Menu
                </button>
                <ul class="dropdown-menu">
                    <router-link to="/home" class="nav-item nav-link dropdown-item">Minhas Publicações</router-link>
                    <router-link to="/add" class="nav-item nav-link dropdown-item">Adicionar Publicação</router-link>
                    <a class="nav-item nav-link" style="cursor: pointer" @click="logout">Sair</a>
                </ul>
            </div>
            <div class="navbar-nav" v-else>
                <router-link to="/" class="nav-item nav-link">Página Inicial</router-link>
                <router-link to="/login" class="nav-item nav-link">Entrar</router-link>
                <router-link to="/register" class="nav-item nav-link">Registrar</router-link>
            </div>
        </nav>
    </div>

    <router-view></router-view>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
            token: this.tokenized(),
            userAuth: {},
        };
    },
    mounted() {
        window.axios.defaults.headers.common[
            "Authorization"
        ] = `Bearer ${this.token}`;

        if (this.tokenized()) {
            this.isLoggedin = true;

            this.$axios.get("api/user").then((response) => {
                this.userAuth = response.data;
            });
        } else {
            this.isLoggedin = false;
        }
    },

    methods: {
        tokenized() {
            return localStorage.getItem("token");
        },

        destroyToken() {
            this.$axios
                .post("api/logout")
                .then((response) => {
                    localStorage.removeItem("token");
                    this.isLoggedin = false;
                    this.redirectLogout();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        redirectLogout() {
            this.$router.push("/login");
        },

        logout(e) {
            e.preventDefault();
            this.destroyToken();
        },
    },
};
</script>

<style>
body {
    overflow-y: scroll !important;
    overflow-x: hidden !important;
}
</style>
