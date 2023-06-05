<template>
    <div>
      <span class="font-bold">{{ listing.beds }}</span>   Beds <span class="text-gray-400"> | </span>
      <span class="font-bold">{{ listing.bathrooms }}</span> Bathrooms <span class="text-gray-400"> | </span>
      <span class="font-bold">{{ listing.area }}</span> m²
    </div>
</template>

<script setup>
defineProps({
    listing: Object,
})
</script>