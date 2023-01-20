<template>
    <div class="">

        <div class="grid grid-cols-2 [&>*]:mr-4">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-3 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ client.name }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Information about the client.</p>
                </div>
                <div class="border-t border-gray-200 px-4 py-3 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">CEO Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.ceoname }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.email }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.phone }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">NIP</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.nip }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">City</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.city }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Zip Code</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.zipcode }}</dd>
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

        <div class="mt-7">
            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-5">
                <div v-for="item in actions" :key="item.name" @click="item.action"
                    class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[50px] flex justify-center items-center space-x-1 text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:shadow-xl transition-all duration-75 cursor-pointer">
                    <Icon :icon="item.icon" class="" />
                    <dt class="truncate text-sm font-medium ">{{ item.name }}</dt>
                </div>
            </dl>
        </div>

        <ContractsTable :id="id" />
        <AppointmentsTable :id="id" />
    </div>

</template>
<script lang="ts">
import { getClient } from '../../ts/axios';
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
            client: { id: 1, name: '', ceoname: '', email: '', phone: '', nip: '', city: '', zipcode: '', appointments: [], contracts: [], emails: [] },

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
        this.client = await getClient(this.id);

        let totalPrice: number = this.client.contracts.reduce((sum: number, item: { price: string }) => sum + parseFloat(item.price), 0);
        this.stats[0].stat = totalPrice;
        let avgPrice = totalPrice / this.client.contracts.length;
        this.stats[1].stat = Number(avgPrice.toFixed(2));
        this.stats[2].stat = this.client.contracts.length;
        this.stats[3].stat = this.client.emails.length;
        this.stats[4].stat = this.client.appointments.length;
    },

    methods: {

    }
}
</script>
<style lang="">
    
</style>