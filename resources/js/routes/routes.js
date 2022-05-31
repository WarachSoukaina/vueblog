import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from "../components/Home.vue";
import PostDetails from "../components/PostDetails.vue";

Vue.use(VueRouter)

const routes = [
    {
        path : '/',
        component :Home,
        name : 'home'
    },
    {
        path : '/post/:slug',
        component :PostDetails,
        name : 'poostDetails'
    }
];

const router = new VueRouter({
    routes,
    hashbang : false,
     mode: 'history'
})

export default router;
