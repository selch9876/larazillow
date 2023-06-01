<template>
    <form @submit.prevent="update">
      
        <div>
          <label>Beds</label>
          <input v-model.number="form.beds" type="text" />
          <div v-if="form.errors.beds">
            {{ form.errors.beds }}
          </div>
        </div>
  
        <div>
          <label>Baths</label>
          <input v-model.number="form.bathrooms" type="text" />
          <div v-if="form.errors.bathrooms">
            {{ form.errors.bathrooms }}
          </div>
        </div>
  
        <div>
          <label>Area</label>
          <input v-model.number="form.area" type="text" />
          <div v-if="form.errors.area">
            {{ form.errors.area }}
          </div>
        </div>
  
        <div>
          <label>City</label>
          <input v-model="form.city" type="text" />
          <div v-if="form.errors.city">
            {{ form.errors.city }}
          </div>
        </div>
  
        <div>
          <label>Post Code</label>
          <input v-model="form.postcode" type="text" />
          <div v-if="form.errors.postcode">
            {{ form.errors.postcode }}
          </div>
        </div>
  
        <div>
          <label>Street</label>
          <input v-model="form.street" type="text" />
          <div v-if="form.errors.street">
            {{ form.errors.street }}
          </div>
        </div>
  
        <div>
          <label>Street Nr</label>
          <input v-model.number="form.street_no" type="text" />
          <div v-if="form.errors.street_no">
            {{ form.errors.street_no }}
          </div>
        </div>
  
        <div>
          <label>Price</label>
          <input v-model.number="form.price" type="text" />
          <div v-if="form.errors.price">
            {{ form.errors.price }}
          </div>
        </div>
  
        <div>
  
        <div>
          <button type="submit">Update</button>
        </div>
      </div>
    </form>
  </template>

  <script setup>
  import {useForm} from '@inertiajs/vue3'
  const props = defineProps({
    listing: Object,
  })

    const form = useForm({
        beds: props.listing.beds,
        bathrooms: props.listing.bathrooms,
        area: props.listing.area,
        city: props.listing.city,
        postcode: props.listing.postcode,
        street: props.listing.street,
        street_no: props.listing.street_no,
        price: props.listing.price,
    });

    const update = () => form.put(`/listing/${props.listing.id}`)
  </script>
  
  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>