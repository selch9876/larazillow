<template>
    <form>
        <div class="mb-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input v-model="filterForm.deleted" type="checkbox" id="deleted" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="deleted">Deleted</label>
                <input type="checkbox" id="drafts" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="drafts">Drafts</label>
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive, watch } from 'vue';

const filterForm = reactive({
    deleted: false,
})

// reactive , ref or computed
watch(filterForm, () => console.log('change detected'))
</script>