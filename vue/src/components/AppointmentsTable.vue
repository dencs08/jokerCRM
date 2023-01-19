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
                                    Location</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Date</th>
                                <th scope="col" v-if="!essential"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Time</th>
                                <th scope="col" class="relative py-3.5 pl-1 pr-1 sm:pr-0">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="meeting in meetings" :key="meeting.id">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    <router-link :to="{ name: 'Client', params: { id: meeting.client.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <!-- :to="{ name: 'Client', params: { id: meeting.client.id.toString() } -->
                                        {{ meeting.client.name }}
                                    </router-link>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ meeting.location }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ meeting.date }}
                                </td>
                                <td v-if="!essential" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    meeting.time
                                }}</td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-4">
                                    <router-link :to="{ name: 'Client', params: { id: meeting.client.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <Icon icon="ooui:arrow-next-ltr" class="inline" />
                                        <span class="sr-only">,
                                            Stats
                                        </span>
                                    </router-link>

                                    <a href="#" @click="" class="text-indigo-600 hover:text-indigo-900">
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
import { Icon } from '@iconify/vue'
import { axiosClient } from '../ts/axios'
import axios from 'axios'
export default {
    components: {
        Icon
    },
    props: {
        get: String,
        id: Number as any,

        essential: {
            type: Boolean,
            default: false
        },
    },

    data() {
        return {
            userid: 10,
            meetings: [
                {
                    id: 1,
                    location: 'Location 2',
                    date: '10 January 2022',
                    time: '16:00',
                    datetime: '2022-01-10T17:00',
                    client: {
                        id: 1,
                        name: ''
                    }
                }
            ]
        }
    },

    async mounted() {
        this.meetings = await this.getAppointments();
    },

    methods: {
        async getAppointments() {
            try {
                const response = await axiosClient.get("/appointments/" + this.userid);
                return response.data;
            } catch (error) {
                console.log(error);
                return error;
            }
        }
    }
}
</script>
<style lang="">
    
</style>