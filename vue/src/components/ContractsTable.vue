<template>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Transaction ID</th>
                                <th v-if="user.role == 'Admin'" scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Salesman</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Company</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Commision</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Price</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Net amount</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="transaction in transactions" :key="transaction.id">
                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{
                                    transaction.id
                                }}</td>
                                <td v-if="user.role == 'Admin'"
                                    class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        transaction.salesman
                                    }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{
                                    transaction.client
                                }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{
                                    transaction.commission
                                }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{
                                    transaction.price
                                }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{
                                    transaction.netAmount
                                }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    <span class="rounded-full px-3 py-1 text-xs text-white" :class="[transaction.status === 'Completed' ? 'bg-emerald-500' : '',
                                    transaction.status === 'Canceled' ? 'bg-red-500' : '',
                                    transaction.status === 'Pending' ? 'bg-yellow-500' : '']">
                                        {{ transaction.status }}
                                    </span>
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-4">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Remove</a>
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
export default {
    data() {
        return {
            user: {
                role: 'Admin'
            },
            transactions: [
                {
                    id: 'FV2023/1',
                    salesman: 'Sprzedawca 1',
                    client: 'Klient 1',
                    commission: '+$50',
                    price: '$3,509.00',
                    status: 'Completed',
                    netAmount: '$4,397.00',
                },
                {
                    id: 'FV2023/2',
                    salesman: 'Sprzedawca 2',
                    client: 'Klient 2',
                    commission: '+$50',
                    price: '$3,509.00',
                    status: 'Pending',
                    netAmount: '$4,397.00',
                },
                {
                    id: 'FV2023/3',
                    salesman: 'Sprzedawca 3',
                    client: 'Klient 2',
                    commission: '+$50',
                    price: '$3,509.00',
                    status: 'Canceled',
                    netAmount: '$4,397.00',
                },
            ],
        }
    }
}
</script>
<style lang="">
    
</style>