<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import VueMultiselect from "vue-multiselect";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import TableHeaderCell from "@/Components/TableDataCell.vue";
import { onMounted, watch } from "vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
    roles: Array,
    permissions: Array,
});

const form = useForm({
    name: props.user?.name,
    email: props.user?.email,
    roles: [],
    permissions: [],
});

const submit = () => {
    form.put(route("users.update", props.user?.id));
};

onMounted(() => {
    form.permissions = props.user?.permissions;
    form.roles = props.user?.roles;
});

watch(
    () => props.user,
    () => {
        (form.permissions = props.user?.permissions),
            (form.roles = props.user?.roles);
    }
);
</script>

<template>
    <AdminLayout>
        <Head title="Create user" />
        <div class="max-w-7xl mx-auto mt-4">
            <div class="flex justify-between">
                <Link
                    :href="route('users.index')"
                    class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700"
                    >Back</Link
                >
            </div>
        </div>
        <div class="max-w-6xl mx-auto mt-6 p-6 bg-slate-100">
            <form @submit.prevent="submit">
                <div class="mt-4">
                    <InputLabel for="name" value="Name" />
                    <!-- Name -->
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <!-- Roles -->
                <div class="mt-4">
                    <InputLabel for="roles" value="Roles" />
                    <VueMultiselect
                        v-model="form.roles"
                        :options="roles"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="Pick some"
                        label="name"
                        track-by="id"
                    />
                </div>
                <!-- Permissions -->
                <div class="mt-4">
                    <InputLabel for="permissions" value="Permissions" />
                    <VueMultiselect
                        v-model="form.permissions"
                        :options="permissions"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="Pick some"
                        label="name"
                        track-by="id"
                    />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Update User
                    </PrimaryButton>
                </div>
            </form>
        </div>

        <div
            class="max-w-6xl p-6 mx-auto mt-6 rounded-lg shadow-lg bg-slate-100"
        >
            <h1 class="text-2xl font-semibold text-indigo-700">Roles</h1>
            <div class="bg-white">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="userRole in user.roles"
                            :key="userRole.id"
                            class="border-b"
                        >
                            <TableDataCell>{{ userRole.id }}</TableDataCell>
                            <TableDataCell>{{ userRole.name }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="
                                        route('users.roles.destroy', [
                                            user.id,
                                            userRole.id,
                                        ])
                                    "
                                    method="DELETE"
                                    as="button"
                                    class="px-3 py-2 font-semibold text-red-400 hover:text-red-600"
                                    preserve-scroll
                                    >Revoke</Link
                                >
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
        <div
            class="max-w-6xl p-6 mx-auto mt-6 rounded-lg shadow-lg bg-slate-100"
        >
            <h1 class="text-2xl font-semibold text-indigo-700">Permissions</h1>
            <div class="bg-white">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="userPermission in user.permissions"
                            :key="userPermission.id"
                            class="border-b"
                        >
                            <TableDataCell>{{
                                userPermission.id
                            }}</TableDataCell>
                            <TableDataCell>{{
                                userPermission.name
                            }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="
                                        route('users.permissions.destroy', [
                                            user.id,
                                            userPermission.id,
                                        ])
                                    "
                                    method="DELETE"
                                    as="button"
                                    class="px-3 py-2 font-semibold text-red-400 hover:text-red-600"
                                    preserve-scroll
                                    >Revoke</Link
                                >
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
