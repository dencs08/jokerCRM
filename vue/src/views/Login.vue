<template>
    <section class="h-screen">
        <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <div>
                    <img class="mx-auto h-12 w-auto" src="../assets/logo.svg" alt="Your Company" />
                    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account
                    </h2>
                </div>
                <form class="mt-8 space-y-6" action="#" @submit.prevent="handleLogin">
                    <input type="hidden" name="remember" value="true" />
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div>
                            <label for="name" class="sr-only">Name</label>
                            <input v-model="formData.name" id="name" name="name" type="name" autocomplete="name"
                                required
                                class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Name" />
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input v-model="formData.password" id="password" name="password" type="password"
                                autocomplete="current-password" required
                                class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Password" />
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-mainPink hover:text-pink-400">Forgot your
                                password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-mainPink py-2 px-4 text-sm font-medium text-white hover:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                    aria-hidden="true" />
                            </span>
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
import { axiosAuthenticator } from '../ts/axios'

import { LockClosedIcon } from '@heroicons/vue/20/solid'

export default defineComponent({
    components: {
        LockClosedIcon
    },
    data() {
        return {
            error: '',
            formData: {
                name: '',
                password: ''
            }
        }
    },

    mounted() {
    },

    methods: {
        handleLogin() {
            axiosAuthenticator.get('/sanctum/csrf-cookie').then(response => {
                console.log(response);
                axiosAuthenticator.post('/api/login', this.formData)
                    .then(response => {
                        this.$router.push({ path: '/dashboard' })
                        console.log(response);
                    })
                    .catch(error => {
                        this.error = 'Invalid name or password.';
                        console.log(response);
                    })
            });
        },
    }
})
</script>
<style lang="scss">

</style>