<template>
  <form @submit.prevent="update">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Beds</label>
        <input class="input" v-model.number="form.beds" type="text" />
        <div v-if="form.errors.beds">
          {{ form.errors.beds }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Baths</label>
        <input class="input" v-model.number="form.bathrooms" type="text" />
        <div v-if="form.errors.bathrooms" class="input-error">
          {{ form.errors.bathrooms }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Area</label>
        <input class="input" v-model.number="form.area" type="text" />
        <div v-if="form.errors.area" class="input-error">
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="label">City</label>
        <input class="input" v-model="form.city" type="text" />
        <div v-if="form.errors.city" class="input-error">
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Post Code</label>
        <input class="input" v-model="form.postcode" type="text" />
        <div v-if="form.errors.postcode" class="input-error">
          {{ form.errors.postcode }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="label">Street</label>
        <input class="input" v-model="form.street" type="text" />
        <div v-if="form.errors.street" class="input-error">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Street No</label>
        <input class="input" v-model.number="form.street_nr" type="text" />
        <div v-if="form.errors.street_no" class="input-error">
          {{ form.errors.street_no }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="label">Price</label>
        <input class="input" v-model.number="form.price" type="text" />
        <div v-if="form.errors.price" class="input-error">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit" class="btn-primary">Edit</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
  listing: Object,
})
const form = useForm({
  beds: props.listing.beds,
  bathrooms: props.listing.bathrooms,
  area: props.listing.area,
  city: props.listing.city,
  street: props.listing.street,
  postcode: props.listing.postcode,
  street_no: props.listing.street_no,
  price: props.listing.price,
})
const update = () => form.put(route('realtor.listing.update', {listing: props.listing.id}))
</script>

<style scoped>
label {
  margin-right: 2em;
}
div {
  padding: 2px
}
</style>