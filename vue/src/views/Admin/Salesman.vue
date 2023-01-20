<template>
    <div class="">

        <div class="grid grid-cols-2 [&>*]:mr-4">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-3 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ salesman.name }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Salesman information</p>
                </div>
                <div class="border-t border-gray-200 px-4 py-3 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Salesman</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.name }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.email }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.phone }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Department</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.department }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div v-for="item in stats" :key="item.name"
                    class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[50px] flex flex-col justify-center">
                    <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
                </div>
            </dl>
        </div>

        <ContractsTable :id="id" />
        <AppointmentsTable :id="id" />
    </div>

</template>
<script lang="ts">
import { getSalesman } from '../../ts/axios';
import { PaperClipIcon } from '@heroicons/vue/20/solid'
import { AppointmentsTable, ContractsTable } from '../../components'
import { Icon } from '@iconify/vue'
export default {
    components: {
        PaperClipIcon,
        ContractsTable,
        Icon,
        AppointmentsTable
    },

    props: {
        id: String as any,
    },

    data() {
        return {
            user: {
                id: 1,
                role: 'Admin'
            },

            salesman: { id: 1, name: '', email: '', phone: '', department: '', appointments: [], contracts: [], emails: [] },

            stats: [
                { name: 'All sales', stat: 0 },
                { name: 'Avg. sale', stat: '-' },
                { name: 'Contracts completed', stat: '-' },
                { name: 'Emails sent', stat: '-' },
                { name: 'Appointments completed', stat: '-' },
            ],

            actions: [
                { name: 'Add Contract', icon: 'mdi:account-credit-card', action: '' },
                { name: 'Add contact person', icon: 'mdi:card-account-mail', action: '' },
                { name: 'Schedule appointment', icon: 'ant-design:schedule-filled', action: '' },
                { name: 'Send email', icon: 'mdi:email-arrow-right', action: '' },
                { name: 'Edit info', icon: 'bi:person-fill-gear', action: '' },
            ]
        }
    },

    async mounted() {
        this.salesman = await getSalesman(this.id);

        let totalPrice: number = this.salesman.contracts.reduce((sum: number, item: { price: string }) => sum + parseFloat(item.price), 0);
        this.stats[0].stat = totalPrice;
        let avgPrice = totalPrice / this.salesman.contracts.length;
        this.stats[1].stat = Number(avgPrice.toFixed(2));
        this.stats[2].stat = this.salesman.contracts.length;
        this.stats[3].stat = this.salesman.emails.length;
        this.stats[4].stat = this.salesman.appointments.length;
    },

    methods: {

    }
}
</script>
<style lang="">
    
</style>