<script setup>
const props = defineProps([
    'article'
])
</script>
<template>
    <div class="card mb-4" v-if="article">
        <a href="#!">
            <img class="card-img-top" :src="article.image" alt="..." />
        </a>
        <div class="card-body">
            <div class="small text-muted">{{ article.published_at }}</div>
            <h2 class="card-title">{{ article.title }}</h2>
            <p class="card-text">{{ article.subtitle }}</p>
            <a class="btn btn-primary" href="#!">Read more →</a>
        </div>
    </div>
</template>
