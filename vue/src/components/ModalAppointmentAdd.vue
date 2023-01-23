<template>
    <div>
        <div class="bg-gray-50 px-5 py-4 flex justify-between items-center">
            <p>Add new appointment</p>
            <Icon @click="$emit('toggleModal')" icon="ic:twotone-close" width="15px" class="cursor-pointer" />
        </div>

        <form @submit.prevent="submitForm" class="">
            <div class="divide-y">
                <div class="px-3 py-3">
                    <div class="grid grid-cols-2 [&>*]:mr-6 [&>*]:my-2">
                        <InputCustom v-model="date" label="Date" type="date" name="date" placeholder="2022-12-12"
                            :required="true" />
                        <InputCustom v-model="time" label="Time" type="time" name="time" placeholder="00:00"
                            :required="true" />
                        <InputCustom v-model="location" label="Location" type="location" name="location"
                            placeholder="Zielona Góra" :required="true" />
                        <ListBox v-model="status" title="Status"
                            :options="[{ id: 1, name: 'Completed' }, { id: 2, name: 'Pending' }, { id: 3, name: 'Canceled' }]" />
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
import { getClients, addAppointment } from '../ts/axios'
export default {
    components: {
        Button, InputCustom, ListBox
    },
    data() {
        return {
            date: '',
            time: '',
            location: '',
            status: '',
            client: '',

            clients: [{
                id: 0,
                name: '-'
            }],

            user: {
                id: 1,
                role: 'admin'
            }
        }
    },
    async created() {
        this.clients = await getClients();
    },

    methods: {
        async submitForm() {
            const appointment = { date: this.date, time: this.time, location: this.location, status: this.status, client: this.client, user: this.user.id };

            if (this.$route.name === "Client") {
                appointment.client = this.$route.params.id as string;
            }

            await addAppointment(appointment);
            this.$emit('toggleModal');

            setTimeout(() => {
                this.$router.go(0);
            }, 500);
        }
    }
}
</script>
<style lang="">
    
</style>