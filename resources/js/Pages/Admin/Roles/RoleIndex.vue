<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableDataCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";

defineProps(["roles"]);
</script>

<template>

    <Head title="Dashboard" />

    <AdminLayout>
        <div class="py-4 mx-auto max-w-7xl">
            <div class="flex justify-between">
                <h1>Roles Index Page</h1>
                <Link :href="route('roles.create')"
                    class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">New Role</Link>
            </div>
            <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="role in roles" :key="role.id" class="border-b">
                            <TableDataCell>{{ role.id }}</TableDataCell>
                            <TableDataCell>{{ role.name }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link :href="route('roles.edit', role.id)" class="px-3 py-2 font-semibold text-green-400 hover:text-green-600">Edit</Link>
                                <Link :href="route('roles.destroy', role.id)" method="DELETE" as="button" class="px-3 py-2 font-semibold text-red-400 hover:text-red-600">Delete</Link>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>