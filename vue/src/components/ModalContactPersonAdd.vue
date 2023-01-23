<template>
    <div>
        <div class="bg-gray-50 px-5 py-4 flex justify-between items-center">
            <p>Add new contact person</p>
            <Icon @click="$emit('toggleModal')" icon="ic:twotone-close" width="15px" class="cursor-pointer" />
        </div>

        <form @submit.prevent="submitForm" class="">
            <div class="divide-y">
                <div class="px-3 py-3">
                    <div class="grid grid-cols-2 [&>*]:mr-6 [&>*]:my-2">
                        <InputCustom v-model="name" label="Contact person name" type="name" name="name"
                            placeholder="Contact person name" :required="true" />
                        <InputCustom v-model="email" label="Email" type="email" name="email"
                            placeholder="example@email.com" :required="true" />
                        <InputCustom v-model="phone" label="Phone" type="phone" name="phone"
                            placeholder="+48 123 123 123" :required="true" />
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
import { Button, InputCustom } from './';
import { addClientContact } from '../ts/axios'

export default {
    components: {
        Button, InputCustom
    },
    data() {
        return {
            name: '',
            email: '',
            phone: '',

            user: {
                id: 1,
                role: 'admin'
            }
        }
    },

    methods: {
        async submitForm() {
            const contact = { name: this.name, email: this.email, phone: this.phone, client: '' };

            if (this.$route.name === "Client") {
                contact.client = this.$route.params.id as string;
            }

            await addClientContact(contact);
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