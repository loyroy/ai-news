import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        component: () => import("./pages/Home.vue"),
    },
    {
        path: '/article',
        component: () => import("./pages/ArticleDetail.vue"),
    },
    {
        path: '/about',
        component: () => import("./pages/About.vue"),
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
