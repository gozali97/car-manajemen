<script setup>
import {Head, useForm, usePage} from "@inertiajs/vue3";
import App from "@/Layouts/App.vue";
import { ElNotification } from 'element-plus';

const props = defineProps({
    product:Object,
})

const form = useForm({
    car_id: props.product.id,
    price: props.product.price,
    address: '',
    phone_number:'',
    start_date: '',
    end_date: '',
})

function submit() {
    form.post(route('transaksi.store'), {
        onSuccess: (page) => {
            ElNotification({
                title: 'Success',
                message: page.props.flash.success,
                type: 'success',
            })
        }
    })
}

</script>
<template>
    <App>
        <Head :title="product.name" />
        <div class="flex justify-center w-full p-6">
            <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
                <div class="px-4 pt-8">
                    <p class="text-xl font-medium">Order Summary</p>
                    <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
                    <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                        <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                            <img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png" alt="" />
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{ props.product.name }}</span>
                                <span class="float-right text-gray-400">{{ props.product.brand.name }}</span>
                                <p class="text-lg font-bold">Rp. {{ Number(props.product.price).toLocaleString() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                    <form @submit.prevent="submit">
                    <p class="text-xl font-medium">Payment Details</p>
                    <p class="text-gray-400">Complete your order by providing your payment details.</p>
                    <div class="">
                        <label for="nama" class="mt-4 mb-2 block text-sm font-medium">Nama</label>
                        <div class="relative">
                            <input type="text" id="name" name="name" :value="usePage().props.auth.user.name" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                        </div>
                        <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                        <div class="relative">
                            <input type="email" id="email" name="email" :value="usePage().props.auth.user.email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxxxx" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                            </div>
                        </div>
                        <label for="phone_number" class="mt-4 mb-2 block text-sm font-medium">Phone Number</label>
                        <div class="relative">
                            <input type="number" id="phone_number" v-model="form.phone_number" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxxxx" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                            </div>
                        </div>
                        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Address</label>
                        <div class="relative">
                            <textarea id="address" v-model="form.address" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                        <div class="flex gap-2">
                            <div class="relative w-6/12 flex-shrink-0">
                                <label for="start_date" class="mt-4 mb-2 block text-sm font-medium">Start date</label>
                                <input type="date" id="start_date" v-model="form.start_date" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                            </div>
                            <div class="relative w-6/12 flex-shrink-0">
                                <label for="end_date" class="mt-4 mb-2 block text-sm font-medium">End date</label>
                                <input type="date" id="end_date" v-model="form.end_date" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-2xl font-semibold text-gray-900">Rp {{ Number(props.product.price).toLocaleString() }}</p>
                        </div>
                    </div>
                    <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </App>
</template>
