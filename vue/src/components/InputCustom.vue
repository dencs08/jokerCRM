<template>
    <div>
        <div class="flex justify-between">
            <label :for="name" class="block text-sm font-medium text-gray-700">{{ label }} <span
                    v-if="required">*</span></label>
            <span v-if="optional" class="text-sm text-gray-500" :id="name + '-optional'">Opcjonalne</span>
        </div>
        <div class="mt-1">
            <input :type="type" :name="name" :id="name"
                class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-xs sm:text-sm p-2 sm:p-3"
                :placeholder="placeholder" :aria-describedby="name + '-optional'" />
        </div>
    </div>
</template>

<script lang="ts">
export default {
    props: {
        label: String,
        type: String,
        name: String,
        placeholder: String,
        required: Boolean,

        optional: {
            default: false,
            type: Boolean,
        }
    }
}
</script>
<style lang="">
    
</style>