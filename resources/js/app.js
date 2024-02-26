import { createApp } from "vue";

require("./bootstrap");

import App from "./App.vue";
import axios from "axios";
import router from "./router/router";

function AuthUserToken() {
    return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!AuthUserToken()) {
            next({
                path: "/login",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    } else if (to.matched.some((record) => record.meta.guest)) {
        if (AuthUserToken()) {
            next({
                path: "/",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(router);
app.mount("#app");
