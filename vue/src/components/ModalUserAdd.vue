<template>
    <div class="bg-gray-50 px-5 py-4 flex justify-between items-center">
        <p> Add new client to the database</p>
        <Icon @click="$emit('toggleModal')" icon="ic:twotone-close" width="15px" class="cursor-pointer" />
    </div>

    <form action="#" class="">
        <div v-if="currentContent == 0" class="divide-y">
            <div class="px-3 py-3">
                <div class="grid grid-cols-2 [&>*]:mr-6 [&>*]:my-2">
                    <InputCustom label="Organization name" type="name" name="name" placeholder="Company name"
                        :required="true" />
                    <InputCustom label="CEO Name" type="CeoName" name="CeoName" placeholder="Wikotria Heidner"
                        :required="true" />
                    <InputCustom label="Email" type="email" name="email" placeholder="example@email.com"
                        :required="true" />
                    <InputCustom label="Phone" type="phone" name="phone" placeholder="+48 123 123 123"
                        :required="true" />
                    <InputCustom label="NIP" type="nip" name="nip" placeholder="123123123" :required="true" />
                    <InputCustom label="City" type="city" name="city" placeholder="Zielona Góra" :required="true" />
                    <InputCustom label="Zip-Code" type="zip" name="zip" placeholder="65-000" :required="true" />
                </div>

                <hr class="my-4">

                <div class="grid grid-cols-2 [&>*]:mr-6 [&>*]:my-2">
                    <InputCustom label="Main contact person" type="mainContact" name="mainContact"
                        placeholder="Daniel Buzon" :required="false" />
                    <InputCustom label="Email" type="emailMain" name="emailMain" placeholder="example@email.com"
                        :required="false" />
                    <InputCustom label="Phone" type="phoneMain" name="phoneMain" placeholder="+48 123 123 123"
                        :required="false" />
                </div>
            </div>
        </div>

        <!-- <div v-if="currentContent == 1" class="divide-y">
        </div>
        
        <div v-if="currentContent == 2" class="divide-y">
        </div> -->

        <div class="bg-gray-50 sm:flex justify-end px-5 py-4 space-y-2 sm:space-y-0 sm:space-x-2">
            <Button @click="next" styling="success" class="w-full md:w-auto" size="xs">
                Dodaj
            </Button>
        </div>
    </form>
</template>

<script lang="ts">
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { Button, InputCustom } from './';
import { Icon } from '@iconify/vue';

export default {
    components: {
        Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot, Button, Icon, InputCustom
    },
    props: {
        coach: Object,
        hour: Object,
        content: Object,
    },

    data() {
        return {
            currentContent: 0,
            playerCount: 0
        }
    },
    mounted() {
    },
    methods: {
        next() {
            this.currentContent++;
        },
        back() {
            this.currentContent--;
        },
    }
}
</script>

<style lang="">
    
</style>