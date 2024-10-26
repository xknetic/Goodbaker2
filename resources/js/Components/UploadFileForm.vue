<script setup>
import InputLabel from '@/Components/InputLabel.vue';
</script>

<template>
    <!-- <form class="bg-white shadow-lg border border-gray-400 rounded-2xl p-8 text-center text-lg max-w-sm">
        <span class="text-black text-2xl font-medium">Upload your Image</span>
        <p class="mt-2 text-sm text-gray-600">File should be an image</p>
        <label for="file-input" class="relative flex flex-col items-center justify-center gap-2 mt-8 p-3 rounded-lg border-2 border-dashed border-blue-200 text-gray-600 cursor-pointer hover:bg-blue-100 hover:border-gray-700 transition">
            <span class="text-lg font-bold">Drop files here</span>
            or
            <input type="file" accept="image/*" required id="file-input" class="w-full max-w-[350px] text-gray-600 p-1 bg-white rounded-lg border border-gray-400" />
        </label>
    </form> -->

    <div class="grid w-full max-w-xs items-center gap-1.5">
        <InputLabel for="picture" value="Picture" />
        <input id="picture" type="file" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
    </div>
</template>