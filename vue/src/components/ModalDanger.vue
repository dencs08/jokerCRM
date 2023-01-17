<template >
    <div class="sm:flex sm:items-start">
        <div
            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <ExclamationTriangleIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">Deactivate account</DialogTitle>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will
                    be permanently removed from our servers forever. This action cannot be undone.</p>
            </div>
        </div>
    </div>
    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
        <button type="button"
            class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
            @click="open = false">Deactivate</button>
        <button type="button"
            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm"
            @click="open = false" ref="cancelButtonRef">Cancel</button>
    </div>
</template>
<script lang="ts">
import { DialogTitle } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

export default {
    components: {
        DialogTitle, ExclamationTriangleIcon
    },
    data() {
        return {
            open: false,
        }
    }
}
</script>
<style lang="">
    
</style>