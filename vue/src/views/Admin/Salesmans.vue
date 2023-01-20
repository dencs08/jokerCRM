<template>
    <div>
        <p class="mb-3 font-medium text-lg">Salesmen</p>
        <div class="bg-white">
            <div class="grid grid-cols-2 gap-5">
                <div v-for="salesman in salesmen" :key="salesman.id" class="">
                    <router-link :to="{ name: 'Salesman', params: { id: salesman.id.toString() } }"
                        class="block hover:bg-gray-50 shadow sm:rounded-md p-2 border border-gray-100">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="truncate text-sm font-medium text-indigo-600">
                                    {{ salesman.name }}
                                    <span class="text-gray-500 ml-3 text-xs">{{ salesman.role }}</span>
                                </p>
                                <div class="ml-2 flex flex-shrink-0">
                                    <p
                                        class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                        {{ salesman.email }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <Icon icon="majesticons:location-marker" class="mr-1" />
                                            {{ salesman.department }}
                                        </span>
                                    </p>

                                </div>
                                <div class="mt-2 flex flex-col text-sm items-end text-gray-500 sm:mt-0">
                                    <p>
                                        Commision:
                                        {{ ' ' }}
                                        <span class="font-bold">{{ salesman.percentage }}%</span>
                                    </p>
                                    <p>
                                        Earned:
                                        {{ ' ' }}
                                        <span class="font-bold">${{ salesman.earned }}</span>
                                    </p>
                                    <p>
                                        Net Amount:
                                        {{ ' ' }}
                                        <span class="font-bold">${{ salesman.netamount }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { getSalesmen } from '../../ts/axios';
import { Icon } from '@iconify/vue'
export default {
    components: {
        Icon
    },
    data() {
        return {
            salesmen: [
                {
                    id: 1,
                    name: 'Sprzedawca 1',
                    email: 'example@example.pl',
                    role: 'User',
                    department: 'Zielona gora',
                    percentage: 10,
                    earned: '$1000',
                    netamount: '$100000'
                },
            ]
        }
    },

    async mounted() {
        this.salesmen = await getSalesmen();
    }
}
</script>
<style lang="">
    
</style>