<template>
    <div>
        <Modal ref="modalRef" />
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Clients</h1>
                <p class="mt-2 text-sm text-gray-700">Full client list</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button @click="addClient" type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Add Client
                </button>
            </div>
        </div>
        <ClientsTable />
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
import { ClientsTable, Modal } from '../../components'
export default defineComponent({
    components: {
        ClientsTable, Modal
    },
    data() {
        return {
            modalObj: Object as any,
        }
    },
    mounted() {
        this.modalObj = this.$refs.modalRef;
    },
    methods: {
        addClient() {
            (this.$refs.modalRef as any).showUserAddContent();
            return;
        }
    }
})
</script>
<style lang="">
    
</style>