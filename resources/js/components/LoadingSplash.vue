<template>
    <div class="background"></div>
    <div class="loadingSplash">
        <img class="img-fluid logoImg" src="../../../imgs/vue.svg" alt="" />
        <p><b>Carregando...</b></p>
    </div>
</template>

<script>
export default {
    mounted() {
        setTimeout(() => {
            this.$router.push("/admin/home");
        }, 2000);
    },
};
</script>

<style>
.loadingSplash {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin-top: -12vh;
    overflow: hidden !important;
}
body {
    overflow: hidden !important;
}

.logoImg {
    z-index: 10 !important;
    width: auto;
    height: auto;
}

.loadingSplash p {
    z-index: 10;
}

.background {
    position: absolute;
    z-index: 1;
    margin-top: -20vh;
    margin-bottom: -20vh;
    width: 1500px;
    height: 110%;
    overflow: hidden;
    background-color: rgb(2, 165, 111);
}
</style>
