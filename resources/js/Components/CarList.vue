<script setup>
import {Head, router, usePage} from "@inertiajs/vue3";
import Paginate from "@/Components/Paginate.vue";
import {ElNotification} from "element-plus";
import Link from "@/Components/Link.vue";
import NavLink from "@/Components/NavLink.vue";
defineProps({
    products: Object,
})

const auth = usePage().props.auth;
const addToCart = (product) => {
    // console.log(product)
    router.post(route('cart.store', product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                ElNotification({
                    title: 'Success',
                    message: page.props.flash.success,
                    type: 'success',
                })
            }
        },
    })
}
</script>

<template>
    <Head title="Car List" />
    <div class="bg-white dark:bg-gray-900">
        <div class="mx-auto flex flex-col w-full px-4 sm:px-6 lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8 ">
                <div v-for="product in products.data" :key="product.id" class="shadow-lg rounded-lg p-4">
                    <div>
                        <img v-if="product.image" :src="pimg.image ? pimg.image : sampleImage" :alt="product.title" class="h-20 w-20 object-cover object-center lg:h-full lg:w-full" />
                        <img v-else src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png" class="h-20 w-20 object-cover object-center lg:h-full lg:w-full" />
                    </div>

                    <div class="px-4 mt-4">
                        <div>
                            <Link :href="route('product.view', product.slug)" class="text-gray-900 font-semibold dark:text-gray-100">
                                <span aria-hidden="true" class="line-clamp-1">{{ product.name }}</span>
                            </Link>
                        </div>
                    </div>
                    <div class="flex justify-between px-4">
                        <div>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ product.brand.name }}</p>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-50">Rp. {{ Number(product.price).toLocaleString() }}</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div>
                                <div v-if="product.inStock == 1" class="bg-blue-600 p-2 rounded-full transition duration-200 hover:scale-110 hover:bg-blue-800">
                                    <Link v-if="auth.user" :href="route('transaksi.add', product.slug)" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </Link>
                                    <NavLink v-else :href="route('login')" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </NavLink>
                                </div>
                                <div v-else class="bg-red-500 text-white px-2 py-0.5 rounded-lg">
                                    Out of stock
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div data-aos="fade-left" class="mt-10 flex justify-end gap-3">
                <Paginate :products="products"/>
            </div>
        </div>
    </div>
</template>
