<template>
    <button class="btn rounded-full text-white font-semibold" :class="['btn-' + styling, 'btn-' + size]">
        <slot></slot>
    </button>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        styling: {
            type: String,
            default: "primary",
            validator: value => ['primary', 'danger', 'white', 'success'].includes(value as string),
        },
        size: {
            type: String,
            default: "md",
            validator: value => ['xs', 'sm', 'md', 'lg'].includes(value as string),
        },
    },
    mounted() {

    },
    methods: {

    }
})
</script>

<style lang="scss" scoped>
.btn {
    padding-top: clamp(1em, 0.9vw, 1.5em);
    padding-right: clamp(1.75em, 2vw, 2.5em);
    padding-bottom: clamp(1em, 0.9vw, 1.5em);
    padding-left: clamp(1.75em, 2vw, 2.5em);
}

.btn-xs {
    font-size: clamp(0.75rem, 0.7vw, 1.5rem);

    padding-top: clamp(0.5em, 0.6vw, 1.5em);
    padding-right: clamp(1.75em, 1.25vw, 2.5em);
    padding-bottom: clamp(0.5em, 0.6vw, 1.5em);
    padding-left: clamp(1.75em, 1.25vw, 2.5em);
}

.btn-sm {
    font-size: clamp(0.75rem, 0.8vw, 1.5rem);
}

.btn-md {
    font-size: clamp(0.8rem, 0.9vw, 2rem) !important;
}

.btn-lg {
    font-size: clamp(0.85rem, 1vw, 2.5rem) !important;
}

.btn-primary {
    background: linear-gradient(60deg,
            rgb(212, 6, 212) 0%,
            rgb(185, 16, 95) 30%,
            rgb(212, 6, 212) 75%,
            rgb(212, 6, 212) 100%);

    background-size: 500% 200%;
    background-position: 10% 0;

    transition: all 0.5s;

    &:hover {
        background-position: 100% 0;
    }
}

.btn-danger {
    background: rgb(153 27 27);
}

.btn-white {
    background: rgb(241 245 249);
    color: #686868;

    border: 1px solid #dfdfdf;
}

.btn-success {
    background: rgb(16 185 129);
}
</style>