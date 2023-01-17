<template>
    <div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">My Appointments</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                    appointment</button>
            </div>
        </div>
        <ol class="mt-4 divide-y divide-gray-100 text-sm leading-6 lg:col-span-7 xl:col-span-8">
            <li v-for="meeting in meetings" :key="meeting.id" class="relative flex space-x-6 py-4 xl:static">
                <div class="flex-auto">
                    <div>
                        <h4 class="pr-10 font-semibold text-gray-800 xl:pr-0 text-xl">{{ meeting.name }}</h4>
                    </div>
                    <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                        <div class="flex items-start space-x-3">
                            <dt class="mt-0.5">
                                <span class="sr-only">Date</span>
                                <CalendarIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </dt>
                            <dd>
                                <time :datetime="meeting.datetime">{{ meeting.date }} at {{ meeting.time }}</time>
                            </dd>
                        </div>
                        <div
                            class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">
                            <dt class="mt-0.5">
                                <span class="sr-only">Miejsce</span>
                                <MapPinIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </dt>
                            <dd>{{ meeting.location }}</dd>
                        </div>
                    </dl>
                </div>
                <Menu as="div" class="absolute top-6 right-0 xl:relative xl:top-auto xl:right-auto xl:self-center">
                    <div>
                        <MenuButton class="-m-2 flex items-center rounded-full p-2 text-gray-500 hover:text-gray-600">
                            <span class="sr-only">Open options</span>
                            <EllipsisHorizontalIcon class="h-5 w-5" aria-hidden="true" />
                        </MenuButton>
                    </div>

                    <transition enter-active-class="transition ease-out duration-100"
                        enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95">
                        <MenuItems
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                <a href="#"
                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Change
                                    the date</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#"
                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Unbook</a>
                                </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
            </li>
        </ol>
    </div>
</template>
<script lang="ts">
import {
    CalendarIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
    EllipsisHorizontalIcon,
    MapPinIcon,
} from '@heroicons/vue/20/solid'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
export default {
    components: {
        CalendarIcon,
        ChevronLeftIcon,
        ChevronRightIcon,
        EllipsisHorizontalIcon,
        MapPinIcon,
        Menu, MenuButton, MenuItem, MenuItems
    },
    data() {
        return {
            meetings: [
                {
                    id: 1,
                    date: '10 January 2022',
                    time: '16:00',
                    datetime: '2022-01-10T17:00',
                    name: 'Klient 1',
                    location: 'Location 2',
                },
                {
                    id: 2,
                    date: '10 January 2022',
                    time: '16:00',
                    datetime: '2022-01-10T17:00',
                    name: 'Klient 1',
                    location: 'Location 1',
                },
                {
                    id: 3,
                    date: '10 January 2022',
                    time: '16:00',
                    datetime: '2022-01-10T17:00',
                    name: 'Klient 1',
                    location: 'Location 1',
                },
            ]
        }
    },
}
</script>
<style lang="">
    
</style>