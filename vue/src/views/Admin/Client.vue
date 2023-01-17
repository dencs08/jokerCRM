<template>
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
                        <dt class="text-sm font-medium text-gray-500">zipcode</dt>
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
</template>
<script lang="ts">
import { axiosClient } from '../../ts/axios';
import { PaperClipIcon } from '@heroicons/vue/20/solid'
export default {
    components: {
        PaperClipIcon
    },

    props: {
        id: Number as any,
    },

    data() {
        return {
            client: { id: 1, name: '', ceoname: '', email: '', phone: '', nip: '', city: '', zipcode: '' },

            stats: [
                { name: 'All sales', stat: '71,897' },
                { name: 'Avg. sale', stat: '1234,12' },
                { name: 'Contracts completed', stat: '10' },
                { name: 'Emails sent', stat: '59' },
                { name: 'Appointments completed', stat: '129' },
            ]
        }
    },

    mounted() {
        this.getClient(this.id);
    },

    methods: {
        async getClient(id: Number) {
            try {
                const response = await axiosClient.get('/client/' + id);
                console.log(response.data);
                this.client = response.data;
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>
<style lang="">
    
</style>