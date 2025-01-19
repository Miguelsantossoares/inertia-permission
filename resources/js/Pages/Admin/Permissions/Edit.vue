<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({ 
    permission: { 
        type: Object, 
        required: true 
    }
})

const form = useForm({
    name: props.permission?.name,
});
</script>

<template>
    <Head title="Update permission" />

    <AdminLayout>
        <div class="py-4 mx-auto max-w-7xl">
            <div class="flex justify-between">
                <Link
                    :href="route('permissions.index')"
                    class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700"
                    >Back</Link
                >
            </div>
            <div
                class="max-w-md p-6 mx-auto mt-6 rounded-lg shadow-lg bg-slate-100"
            >
                <h1 class="p-4 text-2xl">Update permission</h1>
                <form @submit.prevent="form.put(route('permissions.update', permission.id))">
                    <div>
                        <InputLabel for="name" value="Name" />
                        <TextInput
                            id="name"
                            type="text"
                            class="block w-full mt-1"
                            v-model="form.name"
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="flex items-center mt-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
