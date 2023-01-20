<template>
    <div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">My Appointments</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                    appointment</button>
            </div>
        </div>
        <AppointmentsTable />
    </div>
</template>
<script lang="ts">
import { AppointmentsTable } from '../../components'
export default {
    components: {
        AppointmentsTable
    },
}
</script>
<style lang="">
    
</style>