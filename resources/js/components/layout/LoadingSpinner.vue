<script setup>
import {onMounted, ref, watchEffect} from "vue";

const props = defineProps([
    'loading'
]);
</script>
<template>
    <div v-if="props.loading" class="loading-spinner-wrapper d-flex justify-content-center">
        <div class="lds-dual-ring" v-if="true"></div>
    </div>
</template>
