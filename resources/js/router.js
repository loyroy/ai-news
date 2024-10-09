import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import("./pages/Home.vue"),
    },
    {
        path: '/article/:uuid?',
        name: 'article',
        component: () => import("./pages/ArticleDetail.vue"),
    },
    {
        path: '/about',
        name: 'about',
        component: () => import("./pages/About.vue"),
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
