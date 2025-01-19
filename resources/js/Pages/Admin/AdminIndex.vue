<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 :text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-4">
            <h1>Welcome Admin</h1>
        </div>
    </AdminLayout>
</template>
