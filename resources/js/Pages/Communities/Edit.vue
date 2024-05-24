<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    community: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
        required: true,
    },
});

// Initialize form with props data
const form = useForm({
    name: props.community.name ?? '',
    description: props.community.description ?? '',
});

// Create a ref for the name input
const nameInput = ref(null);

// Define the submit function
const submit = () => {
    form.put(route("communities.update", { community: props.community.id }));
};

// Set focus on the name input when the component is mounted
onMounted(() => {
    if (nameInput.value) {
        nameInput.value.focus();
    }
});
</script>
    

<template>
    <Head title="Edit Community" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Community</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div class="shadow sm:rounded-md sm:border-gray-300 sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="name" value="Name" />

                                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                        ref="nameInput" autocomplete="name" />

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="description" value="Description" />

                                    <TextInput id="description" type="text" class="mt-1 block w-full"
                                        v-model="form.description" required autocomplete="description" />

                                    <InputError class="mt-2" :message="form.errors.description" />
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-4 bg-gray-50 sm:p-6 border-t border-gray-300">
                            <div class="flex items-center justify-end">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Update
                                </PrimaryButton>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

