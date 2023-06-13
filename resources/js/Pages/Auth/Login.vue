<template>
    <form action="" @submit.prevent="login">
        <div class="w-1/4 mx-auto mt-4">
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
            <div>
                <button type="submit" class="btn-primary mt-4 w-full">Login</button>
                <div class="mt-2 text-center">
                    <Link :href="route('user-account.create')" class="text-sm text-gray-500">
                        Need an account? Click here...
                    </Link>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post(route('login.store'))
</script>