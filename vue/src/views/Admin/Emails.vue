<template>
    <div>
        <p class="text-md font-medium">Emails</p>
        <div class="mx-auto py-5">
            <div class="relative bg-white shadow-xl">
                <h2 class="sr-only">Select a client to send an email to</h2>

                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Contact information -->
                    <div class="relative overflow-hidden bg-indigo-700 py-10 px-6 sm:px-10 xl:p-12">
                        <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
                            <svg class="absolute inset-0 h-full w-full" width="343" height="388" viewBox="0 0 343 388"
                                fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z"
                                    fill="url(#linear1)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff" />
                                        <stop offset="1" stop-color="#fff" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 sm:block lg:hidden"
                            aria-hidden="true">
                            <svg class="absolute inset-0 h-full w-full" width="359" height="339" viewBox="0 0 359 339"
                                fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z"
                                    fill="url(#linear2)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff" />
                                        <stop offset="1" stop-color="#fff" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 lg:block"
                            aria-hidden="true">
                            <svg class="absolute inset-0 h-full w-full" width="160" height="678" viewBox="0 0 160 678"
                                fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z"
                                    fill="url(#linear3)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff" />
                                        <stop offset="1" stop-color="#fff" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-white">Select clients to email</h3>
                        <select multiple id="countries_multiple"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-gray-700 h-full">
                            <option value="Client1" selected>Klient 1</option>
                            <option value="Client2">Klient 2</option>
                            <option value="Client3">Klient 3</option>
                            <option value="Client4">Klient 4</option>
                            <option value="Client5">Klient 5</option>
                        </select>

                    </div>

                    <!-- Contact form -->
                    <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
                        <form action="#" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                            <div class="sm:col-span-2">
                                <label for="subject" class="block text-sm font-medium text-gray-900">Subject</label>
                                <div class="mt-1">
                                    <input type="text" name="subject" id="subject"
                                        class="block w-full rounded-lg border border-gray-200 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between">
                                    <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                                    <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                                </div>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="4"
                                        class="block w-full rounded-lg border border-gray-200 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        aria-describedby="message-max" />
                                </div>
                            </div>
                            <div class="sm:col-span-2 sm:flex sm:justify-end">
                                <button type="submit"
                                    class="mt-2 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script lang="ts">
import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/outline'
export default {
    components: {
        EnvelopeIcon, PhoneIcon
    }
}
</script>
<style lang="">
    
</style>