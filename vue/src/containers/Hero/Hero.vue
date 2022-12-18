<template>
    <section class="lg:container mx-auto">
        <div class="flex flex-col justify-center h-screen">
            <div>
                <h1 class="font-bold">{{ title }}</h1>
                <h2 class="mb-6">{{ subtitle }}</h2>
                <Button>test</Button>
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
            title: 'Joker CRM',
            imageUrl: 'https://example.com/image.jpg',
            subtitle: 'My Subtitle',
            buttonText: 'Click me'
        }
    },
})
</script>
<style lang="scss">

</style>