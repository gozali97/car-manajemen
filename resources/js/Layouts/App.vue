<script setup>
import {onMounted, onUnmounted, ref} from 'vue'
import { initFlowbite } from 'flowbite'
import AOS from "aos";
import { Top } from "@element-plus/icons-vue";
import Navbar from "@/Components/Navbar.vue";

onMounted(() => {
    initFlowbite();
    AOS.init();
})

const isHidden = ref(true)

const handleScroll = () => {
    if (window.pageYOffset > 500) {
        isHidden.value = false;
    } else {
        isHidden.value = true;
    }
}

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900" @scroll="handleScroll">
        <Navbar/>
        <div class="mt-12">
            <main>
                <slot />
            </main>
            <Footer/>
            <div class="fixed -bottom-6 right-0 p-4 m-20">
                <button @click="scrollToTop" :class="['bg-blue-600 hover:bg-blue-700 rounded-full px-3 py-3 transition ease-in-out duration-150 hover:mb-1 animate-pulse', { hidden: isHidden }]">
                <span class="justify-center flex items-center text-white">
                <el-icon><Top /></el-icon>
                </span>
                </button>
            </div>
        </div>

    </div>
</template>
