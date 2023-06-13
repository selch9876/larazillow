<template>
    <form action="" @submit.prevent="register">
        <div class="w-1/4 mx-auto mt-4">
            <div>
                <label for="name" class="label">Name</label>
                <input type="text" id="name" class="input" v-model.name="form.name" />
                <div class="input-error" v-if="form.errors.name">{{form.errors.name}}</div>
            </div>
            <div>
                <label for="email" class="label">Email</label>
                <input type="text" id="email" class="input" v-model.email="form.email" />
                <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" class="input" v-model.password="form.password" />
                <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input type="password" id="password_confirmation" class="input" v-model.password_confirmation="form.password_confirmation" />
                <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div>
                <button type="submit" class="btn-primary mt-4 w-full">Create Account</button>
                <div class="mt-2 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-500">
                        Already have an account? Click here...
                    </Link>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const register = () => form.post(route('user-account.store'))
</script>