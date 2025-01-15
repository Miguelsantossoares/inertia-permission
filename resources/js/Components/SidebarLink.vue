<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? "relative flex items-center px-4 py-3 space-x-4 text-white rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400"
        : "flex items-center px-4 py-3 space-x-4 text-gray-600 rounded-md group"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
