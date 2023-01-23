<template>
    <div>
        <div class="grid grid-cols-2 gap-5">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-3 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Hello, {{ salesman.name }}!</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Your account information</p>
                </div>
                <div class="border-t border-gray-200 px-4 py-3 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Username</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.name }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.email }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{
                                salesman.phone
                            }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.role }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Department</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.department }}
                            </dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-3 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Commision</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ salesman.percentage }}%
                            </dd>
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

        <div
            class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 flex flex-col justify-center mt-7">
            <Bar v-if="loaded" id="my-chart-id" :style="myStyles" :options="chartOptions" :data="chartData" />
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
import { getSalesman, getClients, getUser } from '../../ts/axios'

import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default defineComponent({
    components: {
        ContractsTable,
        ClientsTable,
        AppointmentsTable,
        Bar
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
            loadedUser: false,
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

            stats: [
                { name: 'All sales', stat: 0 },
                { name: 'Avg. sales', stat: '-' },
                { name: 'Clients', stat: '-' },
                { name: 'Contracts completed', stat: '-' },
                { name: 'Emails sent', stat: '-' },
                { name: 'Appointments completed', stat: '-' },
            ],
            salesman: { id: 1, name: '', email: '', phone: '', department: '', appointments: [], contracts: [], emails: [], role: '', percentage: '' },
            user: {
                id: 10,
                role: 'Admin'
            },
            clients: [{}]
        }
    },
    async mounted() {
        this.loaded = false;
        this.loadedUser = false;

        this.user = await getUser();
        this.getData(this.user.id)
    },
    methods: {
        async getData(id: any) {
            this.salesman = await getSalesman(id);
            this.clients = await getClients();

            let totalPrice: number = this.salesman.contracts.reduce((sum: number, item: { netamount: string }) => sum + parseFloat(item.netamount), 0);
            this.stats[0].stat = totalPrice;
            let avgPrice = totalPrice / this.salesman.contracts.length;
            this.stats[1].stat = Number(avgPrice.toFixed(2));
            this.stats[2].stat = this.clients.length;
            this.stats[3].stat = this.salesman.contracts.length;
            this.stats[4].stat = this.salesman.emails.length;
            this.stats[5].stat = this.salesman.appointments.length;

            this.chartData.datasets[0].data = this.sumPricesByMonth(this.salesman.contracts)
            this.loaded = true;
        },
        sumPricesByMonth(contracts: any): number[] {
            const result: number[] = Array(12).fill(0);
            for (const contract of contracts) {
                const month = new Date(contract.created_at).getMonth();
                result[month] += parseFloat(contract.netamount);
            }
            return result;
        },
    },

})
</script>
<style lang="">
    
</style>