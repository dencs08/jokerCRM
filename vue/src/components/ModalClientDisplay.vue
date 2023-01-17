<template>
    <div class="bg-gray-50 px-5 py-4 flex justify-between items-center">
        <p> Client specific statistics</p>
        <Icon @click="$emit('toggleModal')" icon="ic:twotone-close" width="15px" class="cursor-pointer" />
    </div>

    <div class="divide-y">
        <div class="px-3 py-3">
            <div class="grid grid-cols-1 [&>*]:mr-6 [&>*]:my-2">
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-5">
                    <div v-for="item in stats" :key="item.name"
                        class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[125px] flex flex-col justify-center">
                        <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
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
export default {
    data() {
        return {
            stats: [
                { name: 'All sales', stat: '71,897' },
                { name: 'Avg. sales', stat: '3000,11' },
                { name: 'Clients', stat: '30' },
                { name: 'Contracts completed', stat: '10' },
                { name: 'Emails sent', stat: '59' },
                { name: 'Appointments completed', stat: '129' },
            ]
        }
    }
}
</script>
<style lang="">
    
</style>