<template>
    <div>
        <p class="mb-3 font-medium text-lg">Salesmen</p>

        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <li v-for="person in salesmen" :key="person.email"
                class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                <router-link :to="{ name: 'Salesman', params: { id: person.id.toString() } }">
                    <div class="flex w-full items-center justify-between space-x-6 p-6">
                        <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="truncate text-sm font-medium text-gray-900">{{ person.name }}</h3>
                                <span
                                    class="inline-block flex-shrink-0 rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">{{
                                        person.role
                                    }}</span>
                            </div>
                            <p class="mt-1 truncate text-sm text-gray-500">Commision: {{ person.percentage }}%</p>
                            <p class="mt-1 truncate text-sm text-gray-500">Earned: ${{ person.earned }}</p>
                            <p class="mt-1 truncate text-sm text-gray-500">Net Amount: ${{ person.netamount }}</p>
                        </div>
                        <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                            src="https://source.unsplash.com/random/100x100/?face" alt="" />
                    </div>
                </router-link>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="flex w-0 flex-1">
                            <a :href="`mailto:${person.email}`"
                                class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                <EnvelopeIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                <Icon icon="ic:baseline-email" class="text-gray-500 h-5 w-5" />
                                <span class="ml-2">Email</span>
                            </a>
                        </div>
                        <div class="-ml-px flex w-0 flex-1">
                            <a href="#"
                                class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                <PhoneIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                <Icon icon="material-symbols:phone-enabled-sharp" class="text-gray-500 h-5 w-5" />
                                <span class="ml-2">Call</span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

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