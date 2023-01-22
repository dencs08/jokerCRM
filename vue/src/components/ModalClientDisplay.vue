<template>
    <div class="bg-gray-50 px-5 py-4 flex justify-between items-center">
        <p> Clients additional information</p>
        <Icon @click="$emit('toggleModal')" icon="ic:twotone-close" width="15px" class="cursor-pointer" />
    </div>

    <div class="divide-y">
        <div class="px-3 py-3">
            <div class="grid grid-cols-1 [&>*]:mr-6 [&>*]:my-2">
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-1">
                    <div class="flex justify-between">
                        <p class="text-md font-medium text-gray-800">Client name: {{ client.name }}</p>
                        <!-- <button class="text-xs font-medium px-3 py-2 rounded-md text-white bg-purple-500">Add</button> -->
                    </div>
                    <div v-for="info in client.client_info"
                        class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[125px] flex flex-col justify-center">
                        <dt class="truncate text-md font-medium text-gray-800">{{ info.title }}</dt>
                        <dd class="mt-1 text-sm font-regular tracking-tight text-gray-500">
                            {{ info.info }}
                        </dd>

                        <a href="#" @click="infoDestroyID(info.id)"
                            class="font-semibold text-xs text-purple-500 mt-2">Remove</a>
                    </div>
                </dl>
            </div>

            <hr class="my-4">

            <div class="grid grid-cols-2 [&>*]:mr-6 [&>*]:my-2">

            </div>
        </div>
    </div>

    <!-- <div v-if="currentContent == 1" class="divide-y">
        </div>
        
        <div v-if="currentContent == 2" class="divide-y">
        </div> -->
</template>
<script lang="ts">
import { getClient, infoDestroy } from '../ts/axios'
import { Icon } from '@iconify/vue'
export default {
    components: { Icon },
    data() {
        return {
            client: {
                id: 0,
                name: '',
                client_info: [{
                    id: 0,
                    title: '',
                    info: ''
                }]
            }
        }
    },

    async mounted() {
        this.client = await getClient(this.$route.params.id);
    },

    methods: {
        async infoDestroyID(id: any) {
            infoDestroy(id);
            setTimeout(async () => {
                this.client = await getClient(this.$route.params.id);
            }, 500);
        }
    }
}
</script>
<style lang="">
    
</style>