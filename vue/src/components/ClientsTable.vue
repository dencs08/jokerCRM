<template>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Email</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Phone</th>
                                <th scope="col" v-if="!essential"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    NIP</th>
                                <th scope="col" v-if="!essential"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    City</th>
                                <th scope="col" class="relative py-3.5 pl-1 pr-1 sm:pr-0">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="person in people" :key="person.email">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">

                                    <router-link :to="{ name: 'Client', params: { id: person.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ person.name }}
                                    </router-link>

                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.email }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.phone }}
                                </td>
                                <td v-if="!essential" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    person.nip
                                }}</td>
                                <td v-if="!essential" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    person.city
                                }}</td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-4">

                                    <router-link :to="{ name: 'Client', params: { id: person.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <Icon icon="ooui:arrow-next-ltr" class="inline" />
                                        <span class="sr-only">,
                                            Stats
                                        </span>
                                    </router-link>

                                    <a href="#" @click="destroyClientID(person.id)"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <span>
                                            <Icon icon="bxs:trash" class="inline" />
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { Icon } from '@iconify/vue';
import { getClients, destroyClient } from '../ts/axios';
import { nextTick } from 'vue'
export default {
    props: {
        essential: {
            type: Boolean,
            default: false
        }
    },
    components: {
        Icon
    },
    data() {
        return {
            people: [] as { id: Number, name: string; phone: string; city: string; email: string; nip: string; }[],
            user: {
                id: 5,
                role: 'Admin'
            }
        }
    },
    async mounted() {
        this.people = await getClients();
    },
    methods: {
        async destroyClientID(id: Number) {
            await destroyClient(id);
            await nextTick()
            setTimeout(async () => {
                this.people = await getClients();
            }, 500);
        },
    },
}
</script>
<style lang="">
    
</style>