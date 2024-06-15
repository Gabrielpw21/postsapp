import { createWebHistory, createRouter } from 'vue-router';
import Register from '../pages/Register.vue';
import Login from '../pages/Login.vue';
import Loading from '../admin/components/LoadingSplash.vue';
import MyPosts from '../admin/components/Home.vue';
import AddPost from '../admin/components/AddPost.vue';
import EditPost from '../admin/components/Edit.vue';
import Home from '../admin/components/Posts.vue';

//Components Ecommerce

import EcommIndex from '../ecommerce/IndexEcomm.vue';
import Product from '../ecommerce/components/Product.vue';


export const routes = [
    {
        name: 'Home',
        path: '/admin/home',
        component: Home,
        meta: { requiresAuth: true }
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login,

    },
    {
        name: 'load',
        path: '/admin/load',
        component: Loading,
        meta: { requiresAuth: true }
    },
    {
        name: 'myposts',
        path: '/admin/myposts',
        component: MyPosts,
        meta: { requiresAuth: true }
    },
    {
        name: 'edit',
        path: '/admin/edit/:id',
        component: EditPost,
        meta: { requiresAuth: true }
    },
    {
        name: 'add',
        path: '/admin/add',
        component: AddPost,
        meta: { requiresAuth: true }
    },

// ------------ E-Commerce ----------- \\

    {
        name: 'Ecommerce',
        path: '/',
        component: EcommIndex,
        // meta: {require: false}
    },

    {
        name: 'Product',
        path: '/product/:id',
        component: Product, 
        // meta:
    },

// ------------ E-Commerce ----------- \\

    {
        path: '/admin/:pathMatch(.*)*',
        redirect: '/login' 
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;