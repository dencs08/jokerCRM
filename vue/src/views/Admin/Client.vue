<template>
    <div class="">
        <Modal ref="modalRef" />
        <div class="grid grid-cols-3 [&>*]:mr-4">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-3 sm:px-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ client.name }}</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Information about the client.</p>
                    </div>
                    <div>
                        <Icon icon="ri:information-fill" class="w-6 h-6 text-purple-500 cursor-pointer"
                            @click="showModalInfo()" />
                    </div>
                </div>
                <div class="border-t border-gray-200 px-4 py-3 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">CEO Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ client.ceoname }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="space-x-7">
                                <span class="text-sm text-gray-900 sm:mt-0">{{ client.email }}</span>
                            </dd>
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

            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-3 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Main contact channels</h3>
                </div>
                <div class="border-t border-gray-200 px-4 py-3 sm:p-0">
                    <dl class="sm:divide-gray-200  divide-y">
                        <div v-for="contact in client.client_contacts"
                            class="py-4 sm:grid sm:grid-cols-12 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 col-span-4"> {{ contact.name }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 col-span-8">

                                <p>{{ contact.email }}</p>
                                <p>{{ contact.phone }}</p>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div v-for="item in stats" :key="item.name"
                    class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[50px] flex flex-col justify-center">
                    <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-7">
            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-6">
                <div v-for="item in actions" :key="item.name" @click="item.action"
                    class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[50px] flex justify-center items-center space-x-1 text-gray-500 hover:text-gray-700 hover:bg-gray-50 hover:shadow-xl transition-all duration-75 cursor-pointer">
                    <Icon :icon="item.icon" />
                    <dt class="truncate text-sm font-medium ">{{ item.name }}</dt>
                </div>
            </dl>
        </div>

        <ContractsTable :id="id" />
        <AppointmentsTable :id="id" />
        <div
            class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 flex flex-col justify-center mt-7">
            <Bar v-if="loaded" id="my-chart-id" :style="myStyles" :options="chartOptions" :data="chartData" />
        </div>
    </div>

</template>
<script lang="ts">
import { getClient } from '../../ts/axios';
import { PaperClipIcon } from '@heroicons/vue/20/solid'
import { AppointmentsTable, ContractsTable, Modal } from '../../components'
import { Icon } from '@iconify/vue'

import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    components: {
        PaperClipIcon,
        ContractsTable,
        Icon,
        AppointmentsTable,
        Modal,
        Bar
    },

    props: {
        id: String as any,
    },
    computed: {
        myStyles() {
            return {
                height: `${300}px`,
                position: 'relative'
            }
        }
    },
    data() {
        return {
            loaded: false,
            chartData: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Sprzedaż dla jednego miesiąca',
                        backgroundColor: '#A855F7',
                        data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
                    },
                ],
            },
            chartOptions: {
                responsive: true
            },


            client: { id: 1, name: '', ceoname: '', email: '', phone: '', nip: '', city: '', zipcode: '', appointments: [], contracts: [], emails: [], client_contacts: [{ name: '', phone: '', email: '' }] },

            stats: [
                { name: 'All sales', stat: 0 },
                { name: 'Avg. sale', stat: '-' },
                { name: 'Contracts completed', stat: '-' },
                { name: 'Emails sent', stat: '-' },
                { name: 'Appointments completed', stat: '-' },
            ],

            actions: [
                { name: 'Add Contract', icon: 'mdi:account-credit-card', action: this.addContract },
                { name: 'Add contact form', icon: 'mdi:card-account-mail', action: this.addContactPerson },
                { name: 'Add appointment', icon: 'ant-design:schedule-filled', action: this.addScheduleAppointment },
                { name: 'Add information', icon: 'material-symbols:info', action: this.addInformation },
                { name: 'Send email', icon: 'mdi:email-arrow-right', action: '' },
                { name: 'Edit info', icon: 'bi:person-fill-gear', action: '' },
            ]
        }
    },

    async mounted() {
        this.client = await getClient(this.id);

        let totalPrice: number = this.client.contracts.reduce((sum: number, item: { netamount: string }) => sum + parseFloat(item.netamount), 0);
        this.stats[0].stat = totalPrice;
        let avgPrice = totalPrice / this.client.contracts.length;
        this.stats[1].stat = Number(avgPrice.toFixed(2));
        this.stats[2].stat = this.client.contracts.length;
        this.stats[3].stat = this.client.emails.length;
        this.stats[4].stat = this.client.appointments.length;
        console.log(this.client.contracts);

        this.chartData.datasets[0].data = this.sumPricesByMonth(this.client.contracts)
        this.loaded = true;
    },

    methods: {
        showModalInfo() {
            (this.$refs.modalRef as any).showClientInfo();
            return;
        },
        addContract() {
            // console.log('addContract');
            (this.$refs.modalRef as any).showContractAdd();
        },
        addContactPerson() {
            // console.log('addContactPerson');
            (this.$refs.modalRef as any).showContactPersonAdd();
        },
        addScheduleAppointment() {
            // console.log('addScheduleAppointment');
            (this.$refs.modalRef as any).showAppointmentAdd();
        },
        addInformation() {
            // console.log('addScheduleAppointment');
            (this.$refs.modalRef as any).showInfoAdd();
        },
        sumPricesByMonth(contracts: any[]): number[] {
            const result: number[] = Array(12).fill(0);
            for (const contract of contracts) {
                const month = new Date(contract.created_at).getMonth();
                result[month] += parseFloat(contract.netamount);
            }
            return result;
        }
    }
}
</script>
<style lang="">
    
</style>

<!-- in typescript, you have an array of objects. each object has field "created_at" (type string example: 2023-06-07T07:40:02.000000Z) and field "netamount" (type string with format : 100.00). make a function which gets all the contracts for each month and sums the prices. the output of the function should be an array of numbers, in order from January to December -->