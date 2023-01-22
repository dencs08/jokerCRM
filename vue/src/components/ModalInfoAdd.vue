<template>
    <div>
        <div class="bg-gray-50 px-5 py-4 flex justify-between items-center">
            <p>Add new information</p>
            <Icon @click="$emit('toggleModal')" icon="ic:twotone-close" width="15px" class="cursor-pointer" />
        </div>

        <form @submit.prevent="submitForm" class="">
            <div class="divide-y">
                <div class="px-3 py-3">
                    <div class="grid grid-cols-2 [&>*]:mr-6 [&>*]:my-2">
                        <InputCustom v-model="title" label="Info title" type="title" name="title"
                            placeholder="Title for message" :required="true" />
                        <InputCustom v-model="info" label="Info body" type="info" name="info"
                            placeholder="Message information" :required="true" />
                        <ListBox v-if="$route.name != 'Client'" v-model="client" title="Client" :options="clients" />
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 sm:flex justify-end px-5 py-4 space-y-2 sm:space-y-0 sm:space-x-2">
                <Button type="submit" styling="success" class="w-full md:w-auto" size="xs">
                    Dodaj
                </Button>
            </div>
        </form>
    </div>
</template>
<script lang="ts">
import { Button, InputCustom, ListBox } from './';
import { getClients } from '../ts/axios'

export default {
    components: {
        Button, InputCustom, ListBox
    },
    data() {
        return {
            title: '',
            info: '',
            client: '',

            clients: [{
                id: 0,
                name: '-'
            }]
        }
    },

    async created() {
        this.clients = await getClients();
    },

    methods: {
        async submitForm() {
            const info = { title: this.title, info: this.info, client: this.client };
            console.log(info);

            // await addClient(client);
            // this.$emit('toggleModal');

            // setTimeout(() => {
            // this.$router.go(0);
            // }, 500);
        }
    }
}
</script>
<style lang="">
    
</style>