<script setup>
import { ref } from 'vue';
import Dropdown2nd from '@/Components/Dropdown2nd.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import IconButtons from '@/Components/IconButtons.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { usePermission } from '@/composables/permission';

const { hasRole } = usePermission();
const isSidebarOpen = ref(false);

// Toggle sidebar visibility
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};
</script>

<template>
    <div class="h-screen w-screen p-5 bg-[#D9D9D9]">
        <div class="flex h-full w-full gap-5">
            <!-- Sidebar -->
            <aside
                :class="isSidebarOpen ? 'w-[20%] min-w-[17rem]' : 'w-[7%] 2xl:w-[5%] xl:visible xl:block hidden pt-10'"
                class="bg-white p-5 flex flex-col justify-between rounded-lg transition-all duration-300"
            >
                <!-- Top -->
                <div class="overflow-y-auto">
                    <div class="my-5 h-[0.1px]" />
                
                    <!-- Dashboard -->
                    <ResponsiveNavLink 
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                        class="flex ps-3 gap-2 items-center mb-1 text-sm"
                    >
                        <svg fill="currentColor" viewBox="0 0 8 8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="">
                            <path d="M3.5 0c-.97 0-1.84.4-2.47 1.03l2.97 2.97v-3.97c-.16-.02-.33-.03-.5-.03zm1.5 1.06v3.41l-2.72 2.72c.61.5 1.37.81 2.22.81 1.93 0 3.5-1.57 3.5-3.5 0-1.76-1.31-3.19-3-3.44zm-4.09 1.31c-.56.54-.91 1.29-.91 2.13 0 .96.46 1.79 1.16 2.34l2.13-2.13-2.38-2.34z"></path>
                        </svg>
                        <!-- Label text only when sidebar is open -->
                        <span v-if="isSidebarOpen"> Dashboard </span>
                    </ResponsiveNavLink>

                    <!-- User -->
                    <ResponsiveNavLink 
                        v-if="hasRole('admin')"
                        :href="route('users.index')"
                        :active="route().current('users.index') || route().current('users.create') || route().current('users.edit')"
                        class="flex ps-3 gap-2 items-center mb-1 text-sm"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                        <span v-if="isSidebarOpen"> User List </span>
                    </ResponsiveNavLink>

                    <!-- Branches -->
                    <ResponsiveNavLink 
                        v-if="hasRole('admin') || hasRole('branch')"
                        :href="route('branches.index')"
                        :active="route().current('branches.index') || route().current('branches.create') || route().current('branches.show')"
                        class="flex ps-3 gap-2 items-center mb-1 text-sm"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                            <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                        </svg>
                        <span v-if="isSidebarOpen"> Branches </span>
                    </ResponsiveNavLink>

                    <!-- Sales -->
                    <ResponsiveNavLink
                        v-if="hasRole('admin') || hasRole('agent')"
                        :href="route('sales.index')"
                        :active="route().current('sales.index')"
                        class="flex ps-3 gap-2 items-center mb-1 text-sm"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                            <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z"/>
                            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5"/>
                        </svg>
                        <span v-if="isSidebarOpen"> Sales </span>
                    </ResponsiveNavLink>

                    <!-- Delivery -->
                    <ResponsiveNavLink
                        v-if="hasRole('admin') || hasRole('agent')"
                        :href="route('deliveries.index')"
                        :active="route().current('deliveries.index') || route().current('deliveries.create')"
                        class="flex ps-3 gap-2 items-center mb-1 text-sm"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                        </svg>
                        <span v-if="isSidebarOpen"> Delivery </span>
                    </ResponsiveNavLink>

                    <!-- Inventory -->
                    <Dropdown2nd v-if="hasRole('admin')">
                        <template #trigger>
                            <button
                            type="button"
                            class="w-full my-2 flex justify-between items-center text-sm ps-3 gap-2 py-1">
                                <div @click="toggleSidebar" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-layers mr-2" viewBox="0 0 16 16">
                                        <path d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0zM8 9.433 1.562 6 8 2.567 14.438 6z"/>
                                    </svg>

                                    <span v-if="isSidebarOpen"> Inventory </span>
                                </div>

                                <svg v-if="isSidebarOpen" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </button>
                        </template>

                        <template #content>
                            <div class="px-6" v-if="isSidebarOpen">
                                <!-- Products -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin') || hasRole('agent')"
                                    :href="route('products.index')"
                                    :active="route().current('products.index') || route().current('products.create') || route().current('products.edit')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Products </span>
                                </ResponsiveNavLink>

                                <!-- Premixes -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('premixes.index')"
                                    :active="route().current('premixes.index') || route().current('premixes.create') || route().current('premixes.edit')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Premixes </span>
                                </ResponsiveNavLink>

                                <!-- Raw Materials -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('rawmaterials.index')"
                                    :active="route().current('rawmaterials.index') || route().current('rawmaterials.create')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Raw Materials </span>
                                </ResponsiveNavLink>

                                <!-- Transfer Products -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('transfers.index')"
                                    :active="route().current('transfers.index') || route().current('transfers.create')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Transfer Items </span>
                                </ResponsiveNavLink>
                            </div>
                        </template>
                    </Dropdown2nd>

                    <!-- Contacts -->
                    <Dropdown2nd v-if="hasRole('admin')">
                        <template #trigger>
                            <button
                            type="button"
                            class="w-full my-2 flex justify-between items-center text-sm ps-3 gap-2 py-1">
                                <div @click="toggleSidebar" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone mr-2" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                    </svg>

                                    <span v-if="isSidebarOpen"> Contacts </span>
                                </div>

                                <svg v-if="isSidebarOpen" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </button>
                        </template>

                        <template #content>
                            <div class="px-6" v-if="isSidebarOpen">
                                <!-- Clients -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('clients.index')"
                                    :active="route().current('clients.index') || route().current('clients.create') || route().current('clients.edit')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Clients </span>
                                </ResponsiveNavLink>

                                <!-- Suppliers -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('suppliers.index')"
                                    :active="route().current('suppliers.index') || route().current('suppliers.create') || route().current('suppliers.edit')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Suppliers </span>
                                </ResponsiveNavLink>
                            </div>
                        </template>
                    </Dropdown2nd>

                    <!-- Purchases -->
                    <Dropdown2nd v-if="hasRole('admin')">
                        <template #trigger>
                            <button
                            type="button"
                            class="w-full my-2 flex justify-between items-center text-sm ps-3 gap-2 py-1">
                                <div @click="toggleSidebar" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-check mr-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>

                                    <span v-if="isSidebarOpen"> Purchases </span>
                                </div>

                                <svg v-if="isSidebarOpen" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </button>
                        </template>

                        <template #content>
                            <div class="px-6" v-if="isSidebarOpen">
                                <!-- View Purchases -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('purchases.index')"
                                    :active="route().current('purchases.index')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> View Purchases </span>
                                </ResponsiveNavLink>

                                <!-- Purchase Return -->
                                <!-- Add more items here -->
                            </div>
                        </template>
                    </Dropdown2nd>

                    <!-- Reports -->
                    <Dropdown2nd v-if="hasRole('admin')">
                        <template #trigger>
                            <button
                            type="button"
                            class="w-full my-2 flex justify-between items-center text-sm ps-3 gap-2 py-1">
                                <div @click="toggleSidebar" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-data mr-2" viewBox="0 0 16 16">
                                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                                    </svg>
                                    <span v-if="isSidebarOpen"> Reports </span>
                                </div>

                                <svg v-if="isSidebarOpen" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </button>
                        </template>

                        <template #content>
                            <div class="px-6" v-if="isSidebarOpen">
                                <!-- Sales Reports -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('salesreports.index')"
                                    :active="route().current('salesreports.index')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Sales Reports </span>
                                </ResponsiveNavLink>

                                <!-- Inventory Reports -->
                                <ResponsiveNavLink
                                    v-if="hasRole('admin')"
                                    :href="route('inventoryreports.index')"
                                    :active="route().current('inventoryreports.index')"
                                    class="flex ps-3 gap-2 items-center mb-1 text-sm"
                                >
                                    <span> Inventory Reports </span>
                                </ResponsiveNavLink>
                            </div>
                        </template>
                    </Dropdown2nd>
                </div>

                <!-- Bottom -->
                <div>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="text-[#B91C1C] hover:bg-[#B91C1C] flex ps-3 gap-2 items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left mr-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                        <span v-if="isSidebarOpen"> Signout </span>
                    </ResponsiveNavLink>
                </div>
            </aside>

            <main class="flex-1">
                <div class="h-full gap-2 flex flex-col">
                    <nav class="bg-white rounded-lg py-2 px-4 flex justify-between items-center gap-5">
                        <!-- Burger -->
                        <button @click="toggleSidebar" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </button>

                        <div class="flex items-center gap-5">
                        <!-- Bell Icon -->
                            <div class="flex items-center relative">
                                <Dropdown>
                                    <template #trigger>
                                        <button class="rounded-full p-2 transition-all duration-200 hover:bg-gray-100 hover:border-black focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                                            </svg>
                                            <!-- Notification Badge -->
                                            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-medium text-white bg-[#F7C849] border-2 border-white rounded-full" />
                                        </button>
                                    </template>

                                    <template #content 
                                        class="border-4 border-black"
                                        >
                                        <div class="px-4 py-2">
                                            <span class="block w-full text-start text-sm font-medium leading-5 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"> Notifications </span>

                                            <div class="border-b border-gray-700 my-2 mb-5" />

                                            <!-- Notification content -->
                                        </div>
                                    </template>
                                </Dropdown>
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="">
                                <Dropdown>
                                    <template #trigger>
                                        <button class="rounded-full p-2 transition-all duration-200 hover:bg-gray-100 hover:border-black focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                            </svg>
                                        </button>
                                    </template>

                                    <template #content>
                                        <span class="block w-full px-4 py-2 text-start text-sm font-medium leading-5 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"> {{ $page.props.auth.user.name }} </span>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Sign Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                        </div>
                    </nav>

                    <div
                    :class="isSidebarOpen ? 'max-w-[20rem] sm:max-w-[20rem] md:max-w-[28rem] lg:max-w-[44rem] xl:max-w-[65rem] 2xl:max-w-[100rem]' : 'max-w-[21rem] sm:max-w-[38rem] md:max-w-[46rem] lg:max-w-[62rem] xl:max-w-[76rem] 2xl:max-w-[111rem]'"
                    class="h-full w-full overflow-y-auto">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>