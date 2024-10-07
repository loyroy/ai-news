<script setup>
    import Header from "./components/layout/Header.vue";
    import Search from "./components/layout/Search.vue";
</script>
<template>
    <Header/>
    <!-- Page content-->
    <div class="container">
        <router-view v-slot="{ Component, route }" class="router-view">
            <div :key="route.name" class="row">
                <div class="col-lg-8">
                    <Component :is="Component" />
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <Search/>
                </div>
            </div>
        </router-view>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Nobody 2024</p></div>
    </footer>
</template>
