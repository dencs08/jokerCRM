<template>
    <div>
        <div class="grid grid-cols-2 gap-5">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-3 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">WIP</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Your account information</p>
                </div>
                <div class="border-t border-gray-200 px-4 py-3 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Username</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">WIP</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">WIP</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Clients</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">WIP</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Contracts</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">WIP</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Appointments</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">WIP</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">WIP</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Main stats overview</h3>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div v-for="item in stats" :key="item.name"
                        class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[140px] flex flex-col justify-center">
                        <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <AppointmentsTable :essential="true" />
            <ContractsTable :essential="true" />
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
import { ClientsTable, ContractsTable, AppointmentsTable } from '../../components';
export default defineComponent({
    components: {
        ContractsTable,
        ClientsTable,
        AppointmentsTable
    },
    data() {
        return {
            stats: [
                { name: 'All sales', stat: '71,897' },
                { name: 'Avg. sales', stat: '3000,11' },
                { name: 'Clients', stat: '30' },
                { name: 'Contracts completed', stat: '10' },
                { name: 'Emails sent', stat: '59' },
                { name: 'Appointments completed', stat: '129' },
            ]
        }
    }
})
</script>
<style lang="">
    
</style>