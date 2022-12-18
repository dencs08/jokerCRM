<template>
    <Navbar />
    <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
            <component :is="Component" />
        </transition>
    </router-view>
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

<style lang="scss">
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.250s ease-out;
}
</style>