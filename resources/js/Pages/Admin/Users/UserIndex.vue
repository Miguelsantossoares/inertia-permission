<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableDataCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";

defineProps(["users"]);
</script>

<template>
    <Head title="Users index" />

    <AdminLayout>
        <div class="py-4 mx-auto max-w-7xl">
            <div class="flex justify-between">
                <h1>Users Index Page</h1>
                <Link :href="route('users.create')"
                    class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">New User</Link>
            </div>
            <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Email</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="user in users"
                            :key="user.id"
                            class="border-b"
                        >
                            <TableDataCell>{{ user.id }}</TableDataCell>
                            <TableDataCell>{{ user.name }}</TableDataCell>
                            <TableDataCell>{{ user.email }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link :href="route('users.edit', user.id)" class="px-3 py-2 font-semibold text-green-400 hover:text-green-600">Edit</Link>
                                <Link :href="route('users.destroy', user.id)" method="DELETE" as="button" class="px-3 py-2 font-semibold text-red-400 hover:text-red-600">Delete</Link>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
