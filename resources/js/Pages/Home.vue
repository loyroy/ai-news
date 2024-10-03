<script setup>
import axios from "axios";
import { ref } from "vue";

const article = ref();

async function getArticle() {
    let response = await axios.get("api/article");
    article.value = response.data;
}
</script>
<template>
    <div>
        <h1>HOME</h1>
        <router-link to="/article"> Take me to article detail page </router-link>
        <button @click="getArticle">Trigger Endpoint</button>
        <div v-if="article">

            <h2>{{ article.title }}</h2>
            <p>
                {{ article.content }}
            </p>
        </div>
    </div>
</template>
