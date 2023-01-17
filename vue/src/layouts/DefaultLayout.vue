<template>
    <Navbar />
    <section class="overflow-hidden relative">
        <img class="opacity-[35%] absolute z-[-99] min-w-[150vw] blur-md" src="../assets/logo.svg" alt="" />

        <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>
    </section>
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