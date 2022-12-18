<template>
    <section class="container mx-auto">
        <div class="flex flex-col justify-center h-screen">
            <div>
                <h1 class="font-bold">{{ title }}</h1>

                <div class="md:max-w-[60%]">
                    <h2 class="mb-14">{{ subtitle }}</h2>
                </div>

                <router-link to="/login">
                    <Button>{{ buttonText }}</Button>
                </router-link>
            </div>
        </div>
    </section>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

import { Button } from '../../components'
export default defineComponent({
    components: {
        Button
    },
    data() {
        return {
            title: '"Joker" CRM',
            subtitle: 'Your verified working CRM system for your exact needs. Register now and join us in our journey!',
            buttonText: 'Login'
        }
    },
})
</script>

<style lang="scss">

</style>