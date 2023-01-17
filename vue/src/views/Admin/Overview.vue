<template>
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900">Main stats overview</h3>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-5">
            <div v-for="item in stats" :key="item.name"
                class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow border sm:p-6 min-h-[125px] flex flex-col justify-center">
                <dt class="truncate text-sm font-medium text-gray-500">{{ item.name }}</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ item.stat }}</dd>
            </div>
        </dl>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
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
})
</script>
<style lang="">
    
</style>