<template>
    <div>
        <div>
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Contracts</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export</button>
                </div>
            </div>
            <ContractsTable />
        </div>
    </div>
</template>
<script lang="ts">
import { ContractsTable } from '../../components'
export default {
    components: {
        ContractsTable
    },
    data() {
        return {

        }
    }
}
</script>
<style lang="">
    
</style>