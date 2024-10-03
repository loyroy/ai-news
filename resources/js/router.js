import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        component: () => import("./Pages/Home.vue"),
    },
    {
        path: '/article',
        component: () => import("./Pages/ArticleDetail.vue"),
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
