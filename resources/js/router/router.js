import {createWebHistory, createRouter} from 'vue-router';
import Register from '../pages/Register.vue';
import Login from '../pages/Login.vue';
import Loading from '../components/LoadingSplash.vue';
import Home from '../components/Home.vue';
import AddPost from '../components/AddPost.vue';
import EditPost from '../components/Edit.vue';
import Posts from '../components/Posts.vue';


export const routes = [
    {
        path: '/',
        component: Posts,
        meta: {requiresAuth: true}
    },
    {
        name: 'load',
        path: '/load',
        component: Loading,
        meta: {requiresAuth: true}
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
        name: 'myposts',
        path: '/home',
        component: Home,
        meta: {requiresAuth: true}
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost,
        meta: {requiresAuth: true}
    },
    {
        name: 'add',
        path: '/add',
        component: AddPost,
        meta: {requiresAuth: true}
    },

    {
        path: '/:pathMatch(.*)*',
        redirect: '/login' 
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;