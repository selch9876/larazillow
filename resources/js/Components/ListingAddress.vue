<template>
    <span>
        {{ listing.city }} {{ listing.street }} {{ listing.street_no }}, for {{ listing.price }}
    </span>
</template>

<script setup>
defineProps({
    listing: Object,
})
</script>