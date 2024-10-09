<script setup>
import LoadingSpinner from "../components/layout/LoadingSpinner.vue";
import { onMounted, ref } from "vue";
import { getArticle } from "../services/ArticleApi.js";
import { useRoute } from 'vue-router'

const route = useRoute()
const loading = ref(true);
const article = ref([]);

onMounted(() => {
    getArticle(route.params.uuid).then((response) => {
        article.value = response.data;
        loading.value = false;
    }).catch((error) => {
        console.error(error);
        alert('something went wrong');
        loading.value = false;
    });
})

</script>
<template>
    <LoadingSpinner :loading="loading"/>

    <div class="">
        <h1>{{ article.title }}</h1>
        <img class="w-100 rounded py-1" :src="article.image" :alt="article.title">
        <div class="small text-muted py-1">{{ article.published_at }}</div>
        <div v-html="article.content"></div>
    </div>
</template>
