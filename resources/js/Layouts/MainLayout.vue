<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div class="text-lg font-medium">
            <Link :href="route('listing.index')">Listings</Link>
          </div>
          <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
            <Link :href="route('home')">LaraZillow</Link>
          </div>
          <div class="flex items-center gap-4" v-if="user">
            <Link :href="route('realtor.listing.index')" class="text-gray-500">{{ user.name}}</Link>
            <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
            <Link :href="route('logout')" as="button" method="delete" class="btn-danger">Logout</Link>
          </div>
          <div v-else class="flex gap-4">
            <Link :href="route('user-account.create')">Register</Link>
            <Link :href="route('login')">Sign In</Link>
          </div>
        </nav>
      </div>
    </header>
  
    <main class="container mx-auto p-4 w-full">
      <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
        {{ flashSuccess }}
      </div>
      <slot>Default</slot>
    </main>
  </template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {ref} from 'vue'
import { computed } from 'vue';

const flashSuccess = computed(() => usePage().props.flash.success)
const user = computed(() => usePage().props.user)

</script>
