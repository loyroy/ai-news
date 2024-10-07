<script setup>
import axios from "axios";
import {onMounted, ref} from "vue";
import FeaturedArticleCard from "../components/article/FeaturedArticleCard.vue";
import ArticleCard from "../components/article/ArticleCard.vue";
import Pagination from "../components/layout/Pagination.vue";
import { getArticles } from "../services/ArticleApi.js";

const articles = ref([]);

onMounted(() => {
    getArticles().then((response) => {
        console.log(response);
    });
})

</script>
<template>
        <FeaturedArticleCard/>
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <div class="col-lg-6">
                <ArticleCard/>
                <ArticleCard/>
            </div>
            <div class="col-lg-6">
                <ArticleCard/>
                <ArticleCard/>
            </div>
        </div>
        <Pagination/>
</template>
