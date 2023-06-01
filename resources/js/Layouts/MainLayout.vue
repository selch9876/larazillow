<template>
    <Link href="/">Index Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>&nbsp;
    <Link href="/listing">Listings</Link>&nbsp;
    <Link href="/listing/create">New Listing</Link>&nbsp;
    <!-- <div>The page timer {{ timer}}</div> -->

    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot></slot>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {ref} from 'vue'
import { computed } from 'vue';

const flashSuccess = computed(() => usePage().props.flash.success)

// const timer = ref(0)
// setInterval(() => timer.value++, 1000)
</script>

<style scoped>
    .success {
        background-color: green;
        color: white;
    }
</style>