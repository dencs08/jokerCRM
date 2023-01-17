<template>
    <div class="flex h-screen">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="relative z-40 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>

                <div class="fixed inset-0 z-40 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full" enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                        leave-to="-translate-x-full">
                        <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-white focus:outline-none">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0"
                                enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100"
                                leave-to="opacity-0">
                                <div class="absolute top-0 right-0 -mr-12 pt-2">
                                    <button type="button"
                                        class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                        @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>
                            <div class="h-0 flex-1 overflow-y-auto pt-5 pb-4">
                                <div class="flex flex-shrink-0 items-center px-4">
                                    <!-- <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                        alt="Your Company" /> -->
                                    JokerCRM
                                </div>
                                <nav aria-label="Sidebar" class="mt-5">
                                    <div class="space-y-1 px-2">
                                        <router-link v-for="item in navigation" :key="item.name" :to="item.href"
                                            :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
                                            <component :is="item.icon"
                                                :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 h-6 w-6']"
                                                aria-hidden="true" />
                                            {{ item.name }}
                                        </router-link>
                                    </div>
                                </nav>
                            </div>
                            <div class="flex flex-shrink-0 border-t border-gray-200 p-4">
                                <a href="#" class="group block flex-shrink-0">
                                    <div class="flex items-center">
                                        <div>
                                            <img class="inline-block h-10 w-10 rounded-full"
                                                src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">
                                                Daniel Buzon</p>
                                            <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">View
                                                profile</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                    <div class="w-14 flex-shrink-0" aria-hidden="true">
                        <!-- Force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex w-38 flex-col">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-gray-100">
                    <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
                        <div class="flex flex-shrink-0 items-center px-4">
                            <!-- <img class="h-8 w-auto" src="../../../assets/logo.svg" alt="Your Company" /> -->
                            <p class="text-lg font-medium">JokerCRM</p>
                        </div>
                        <nav class="mt-2 flex-1 space-y-3" aria-label="Sidebar">
                            <div class="space-y-1 px-2">
                                <router-link v-for="item in navigation" :key="item.name" :to="item.href"
                                    :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                    <Icon :icon="item.icon" class="w-4 h-4 mr-2" />
                                    {{ item.name }}
                                </router-link>
                            </div>
                            <hr v-if="user.role === 'Admin'" class="border-gray-300">
                            <div v-if="user.role === 'Admin'" class="space-y-1 px-2">
                                <p class="text-xs ml-3 text-gray-600">Team managing</p>
                                <router-link v-for="item in navigationCEO" :key="item.name" :to="item.href"
                                    :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                    <Icon :icon="item.icon" class="w-4 h-4 mr-2" />
                                    {{ item.name }}
                                </router-link>
                            </div>
                        </nav>
                    </div>
                    <div class="flex flex-shrink-0 border-t border-gray-200 p-4">
                        <a href="#" class="group block w-full flex-shrink-0">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-9 w-9 rounded-full"
                                        src="https://source.unsplash.com/featured/300x201" alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">{{
                                        user.name
                                    }}</p>
                                    <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">View profile
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
            <div class="lg:hidden">
                <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50 px-4 py-1.5">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="Your Company" />
                    </div>
                    <div>
                        <button type="button"
                            class="-mr-3 inline-flex h-12 w-12 items-center justify-center rounded-md text-gray-500 hover:text-gray-900"
                            @click="sidebarOpen = true">
                            <span class="sr-only">Open sidebar</span>
                            <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="relative z-0 flex flex-1 overflow-hidden">
                <main class="w-full">
                    <div class="mx-auto py-6 sm:px-6 lg:px-8">
                        <!-- Replace with your content -->
                        <router-view v-slot="{ Component }">
                            <transition name="quickFade" mode="out-in">
                                <component :is="Component" />
                            </transition>
                        </router-view>
                        <!-- /End replace -->
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';

import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems, TransitionRoot, TransitionChild, Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { Icon } from '@iconify/vue';
export default defineComponent({
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Bars3Icon,
        BellIcon,
        XMarkIcon,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogPanel,
        Icon
    },
    data() {
        return {
            navigation: [
                { name: 'Dashboard', href: '/dashboard/overview', current: false, icon: 'mdi:home' },
                { name: 'Clients', href: '/dashboard/clients', current: false, icon: 'mdi:account-group' },
                { name: 'Emails', href: '/dashboard/emails', current: false, icon: 'mdi:email' },
                { name: 'MyContracts', href: '/dashboard/mycontracts', current: false, icon: 'mdi:account-credit-card' },
                { name: 'MyAppointments', href: '/dashboard/myappointments', current: false, icon: 'mdi:calendar' },
                // { name: 'Reports', href: '#', current: false, icon: 'mdi:message-alert' },
            ],
            navigationCEO: [
                { name: 'Salesmens', href: '/dashboard/salesmans', current: false, icon: 'mdi:account-group' },
                { name: 'Contracts', href: '/dashboard/contracts', current: false, icon: 'mdi:account-credit-card' },
                { name: 'Appointments', href: '/dashboard/appointments', current: false, icon: 'mdi:calendar' },

            ],
            user: {
                name: 'Daniel Buzon',
                email: 'danielbuzon@example.com',
                imageUrl:
                    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
                role: 'Admin' //salesman or admin
            },
            userNavigation: [
                { name: 'Your Profile', href: '#' },
                { name: 'Settings', href: '#' },
                { name: 'Sign out', href: '#' },
            ],
            sidebarOpen: true,
        }
    }
})
</script>
<style lang="scss">
.quickFade-enter-from,
.quickFade-leave-to {
    opacity: 0;
}

.quickFade-enter-active,
.quickFade-leave-active {
    transition: opacity 0.125s ease-out;
}
</style>