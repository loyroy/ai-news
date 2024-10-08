<script setup>
import axios from "axios";
import {computed, onMounted, ref} from "vue";
import FeaturedArticleCard from "../components/article/FeaturedArticleCard.vue";
import ArticleCard from "../components/article/ArticleCard.vue";
import Pagination from "../components/layout/Pagination.vue";
import { getArticles } from "../services/ArticleApi.js";

const featuredArticle = ref([]);
const articles = ref([]);

onMounted(() => {
    getArticles(0, 5).then((response) => {
        featuredArticle.value = response.data[0];
        articles.value = response.data.slice(1);
    });
})


</script>
<template>
        <FeaturedArticleCard
            :article="featuredArticle"
        />
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <div
                class="col-6"
                v-for="article in articles"
            >
                <ArticleCard
                    :article
                />
            </div>
        </div>
        <Pagination/>
</template>
