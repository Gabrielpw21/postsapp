import { createApp } from "vue";

require("./bootstrap");

import App from "./App.vue";
import axios from "axios";
import router from "./router/router";

function AuthUserToken() {
   return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
    const token = AuthUserToken();

    if (window.location.path === '/admin' && token) {
        next({ path: '/admin/home' });
        return;
    }

    if (window.location.path === '/admin' && !token) {
        next({ path: '/login' });
        return;
    }

    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!token) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
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
