<template>
    <router-view></router-view>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

import { Navbar } from '../components'

export default defineComponent({
    components: {
        Navbar
    }
})
</script>

<style lang="">
    
</style>