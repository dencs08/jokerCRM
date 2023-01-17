<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="toggleModal">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0 divide-y">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl divide-y">

                            <ModalUserAdd @toggleModal="toggleModal" v-if="currentContent === 'userAdd'" />
                            <ModalUserAdd @toggleModal="toggleModal" v-if="currentContent === 'danger'" />

                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
<script lang="ts">
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { Button, ModalUserAdd, ModalDanger } from './';
import { Icon } from '@iconify/vue';

export default {
    components: {
        Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot, Button, Icon, ModalUserAdd, ModalDanger
    },

    data() {
        return {
            currentContent: '',
            open: false,
        }
    },
    methods: {
        toggleModal() {
            this.open = !this.open;
        },
        showUserAddContent() {
            this.currentContent = 'userAdd';
            this.toggleModal();
        },
        danger() {
            this.currentContent = 'danger';
            this.toggleModal();
        },
    },
}
</script>


  
<style lang="">
    
</style>
