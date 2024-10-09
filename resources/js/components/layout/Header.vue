<script setup>

</script>
<template>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <router-link class="navbar-brand" :to="{ name: 'home' }">AI News</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <router-link class="nav-item nav-link" :to="{ name: 'home' }">Home</router-link>
                    <router-link class="nav-item nav-link" :to="{ name: 'about' }">About</router-link>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">News, as told by AI.</h1>
                <p class="lead mb-0">Because AI would never lie to you.</p>
            </div>
        </div>
    </header>
</template>
