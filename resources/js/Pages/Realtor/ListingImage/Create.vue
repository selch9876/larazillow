<template>
    <div>
        <form enctype="multipart/form-data" method="post" :action="route('realtor.listing.image.store', {listing: listing.id})">
            <input type="file" multiple name="images[]">
            <button type="submit">Send</button>
        </form>
    </div>
</template>

<script setup>
defineProps({listing: Object})
</script>