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
                                <th v-if="!essential" scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Salesman
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Company
                                </th>
                                <th v-if="!essential" scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Commision
                                </th>
                                <th v-if="!essential" scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Price
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Net amount
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status
                                </th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="contract in contracts" :key="contract.id">
                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                    {{
                                        contract.transactionID
                                    }}
                                </td>
                                <td v-if="!essential"
                                    class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                    <router-link :to="{ name: 'Salesman', params: { id: contract.user.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ contract.user.name }}
                                    </router-link>
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                                    <router-link :to="{ name: 'Client', params: { id: contract.client.id.toString() } }"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ contract.client.name }}
                                    </router-link>
                                </td>
                                <td v-if="!essential" class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    {{
                                        contract.commision
                                    }}
                                </td>
                                <td v-if="!essential" class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    {{
                                        contract.price
                                    }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    {{
                                        contract.netamount
                                    }}
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                    <span class="rounded-full px-3 py-1 text-xs text-white" :class="[contract.status === 'Completed' ? 'bg-emerald-500' : '',
                                    contract.status === 'Canceled' ? 'bg-red-500' : '',
                                    contract.status === 'Pending' ? 'bg-yellow-500' : '']">
                                        {{ contract.status }}
                                    </span>
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-4">
                                    <a href="#" @click="destroyContractID(contract.id)"
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
import { getContracts, getClient, getSalesman, destroyContract } from '../ts/axios';
import { Icon } from '@iconify/vue'
import { nextTick } from 'vue'
import { getUser } from '../ts/axios'
export default {
    components: { Icon },
    props: {
        id: Number as any,
        essential: {
            type: Boolean,
            default: false
        }
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
                contracts: [{
                    id: '1',
                    transactionID: 'FV2023/1',
                    commision: '+$50',
                    price: '$3,509.00',
                    status: 'Completed',
                    netamount: '$4,397.00',
                    client: {
                        id: 1,
                        name: ''
                    },
                    user: {
                        id: 1,
                        name: ''
                    }
                }]
            },
            contracts: [
                {
                    id: '1',
                    transactionID: 'FV2023/1',
                    commision: '+$50',
                    price: '$3,509.00',
                    status: 'Completed',
                    netamount: '$4,397.00',
                    client: {
                        id: 1,
                        name: ''
                    },
                    user: {
                        id: 1,
                        name: ''
                    }
                },
            ],
        }
    },

    async mounted() {
        this.user = await getUser();
        this.getData()
    },

    methods: {
        async destroyContractID(id: any) {
            await destroyContract(id);
            await nextTick()
            setTimeout(async () => {
                this.getData()
            }, 500);
        },
        async getData() {
            if (this.$route.name === "MyContracts") {
                this.contracts = await getContracts(this.user.id);
                return;
            }
            if (this.$route.name === "Client") {
                this.client = await getClient(this.id);
                this.contracts = this.client.contracts;

                console.log(this.client.contracts);

                return;
            }
            if (this.$route.name === "Salesman") {
                this.client = await getSalesman(this.id);
                this.contracts = this.client.contracts;
                return;
            }

            this.contracts = await getContracts(this.user.id);
            if (this.essential && this.contracts.length > 10) this.contracts.length = 10;
        }
    }
}
</script>
<style lang="">
    
</style>