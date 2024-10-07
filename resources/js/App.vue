<script setup>
    import Header from "./components/Header.vue";
</script>
<template>
    <Header/>
    <router-view v-slot="{ Component, route }" class="router-view">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
</template>
