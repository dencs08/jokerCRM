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
                                    Client</th>
                                <th v-if="user.role == 'Admin' && !essential" scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Salesman
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Location</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Date</th>
                                <th scope="col" v-if="!essential"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Time</th>
                                <th v-if="!essential" scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status
                                </th>
                                <th scope="col" class="relative py-3.5 pl-1 pr-1 sm:pr-0">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="meeting in appointments" :key="meeting.id">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    <router-link :to="{ name: 'Client', params: { id: meeting.client.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ meeting.client.name }}
                                    </router-link>
                                </td>
                                <td v-if="user.role == 'Admin' && !essential"
                                    class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                    <router-link
                                        :to="{ name: 'Salesman', params: { id: meeting.system_user.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ meeting.system_user.name }}
                                    </router-link>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ meeting.location }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ meeting.date }}
                                </td>
                                <td v-if="!essential" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    meeting.time
                                }}</td>
                                <td v-if="!essential" class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    <span class="rounded-full px-3 py-1 text-xs text-white" :class="[meeting.status === 'Completed' ? 'bg-emerald-500' : '',
                                    meeting.status === 'Canceled' ? 'bg-red-500' : '',
                                    meeting.status === 'Confirmed' ? 'bg-blue-500' : '',
                                    meeting.status === 'Unconfirmed' ? 'bg-yellow-500' : '']">
                                        {{ meeting.status }}
                                    </span>
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-4">
                                    <router-link :to="{ name: 'Client', params: { id: meeting.client.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <Icon icon="ooui:arrow-next-ltr" class="inline" />
                                        <span class="sr-only">,
                                            Stats
                                        </span>
                                    </router-link>

                                    <a href="#" @click="destroyAppointmentID(meeting.id)"
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
import { Icon } from '@iconify/vue'
import { getAppointments, getClient, getSalesman, destroyAppointment } from '../ts/axios'
import { nextTick } from 'vue'

export default {
    components: {
        Icon
    },
    props: {
        id: Number as any,

        essential: {
            type: Boolean,
            default: false
        },
    },

    data() {
        return {
            user: {
                id: 10,
                role: 'Admin'
            },
            client: {
                id: 1,
                name: '',
                appointments: [
                    {
                        id: 1,
                        location: 'Location 2',
                        date: '10 January 2022',
                        time: '16:00',
                        datetime: '2022-01-10T17:00',
                        status: '',
                        client: {
                            id: 1,
                            name: ''
                        },
                        system_user: {
                            id: 1,
                            name: ''
                        }
                    }
                ]
            },
            appointments: [
                {
                    id: 1,
                    location: 'Location 2',
                    date: '10 January 2022',
                    time: '16:00',
                    datetime: '2022-01-10T17:00',
                    status: '',
                    client: {
                        id: 1,
                        name: ''
                    },
                    system_user: {
                        id: 1,
                        name: ''
                    }
                }
            ]
        }
    },

    async mounted() {
        this.getData();
    },

    methods: {
        async destroyAppointmentID(id: any) {
            await destroyAppointment(id);
            await nextTick()
            setTimeout(async () => {
                this.getData()
            }, 500);
        },
        async getData() {
            if (this.$route.name === "MyAppointments") {
                this.appointments = await getAppointments(this.user.id);
                return;
            }
            if (this.$route.name === "Client") {
                this.client = await getClient(this.id);
                this.appointments = this.client.appointments;
                return;
            }
            if (this.$route.name === "Salesman") {
                this.client = await getSalesman(this.id);
                this.appointments = this.client.appointments;
                return;
            }

            this.appointments = await getAppointments(this.user.id);
            console.log(this.appointments);

            if (this.essential) this.appointments.length = 10;
        }
    }
}
</script>
<style lang="">
    
</style>