<template>
    <div class="fixed z-[999]">
        <div class="container mx-auto flex items-center justify-between min-h-[50px] h-[9vh] w-[100vw]">
            <div>
                <router-link to="/start">
                    <img :src="logo" class="min-w-[35px] md:w-[70px]" alt="">
                </router-link>
            </div>
            <div class="space-x-4">
                <router-link to="/start">Start</router-link>
                <router-link to="/login">Login</router-link>
                <!-- <router-link to="/register">Register</router-link> -->
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';

import logo from '../../assets/logo.svg';

import { Button } from '../../components'
export default defineComponent({
    components: {
        Button
    },
    data() {
        return {
            logo: logo,
        }
    }
})
</script>
<style lang="">
    
</style>