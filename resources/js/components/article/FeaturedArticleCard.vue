<script setup>
const props = defineProps([
    'article'
])
</script>
<template>
    <div class="card mb-4">
        <router-link :to="{ name: 'article', params: { uuid: article.uuid } }">
            <img class="card-img-top" :src="article.image" alt="..." />
        </router-link>
        <div class="card-body">
            <div class="small text-muted">{{ article.published_at }}</div>
            <h2 class="card-title">{{ article.title }}</h2>
            <p class="card-text">{{ article.subtitle }}</p>
            <router-link class="btn btn-primary" :to="{ name: 'article', params: { uuid: article.uuid } }">
                Read more
            </router-link>
        </div>
    </div>
</template>
