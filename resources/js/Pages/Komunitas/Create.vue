<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object
})

const form = useForm({
    name: '',
    description: '',
    slug: '',
});

const submit = () => {
    form.post(route('komunitas.store'));
};

</script>

<template>
    <Head title="Create Comunity" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Comunity</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div class="shadow sm:rounded-md sm:border-gray-300 sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="name" value="Name" />

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

                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="description" value="Description" />

                                    <TextInput
                                        id="description"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.description"
                                        required
                                        autocomplete="description"
                                    />

                                    <InputError class="mt-2" :message="form.errors.description" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <InputLabel for="slug" value="Slug" />

                                    <TextInput
                                        id="slug"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.slug"
                                        required
                                        autocomplete="slug"
                                    />

                                    <InputError class="mt-2" :message="form.errors.slug" />
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-4 bg-gray-50 sm:p-6 border-t border-gray-300">
                            <div class="flex items-center justify-end">
                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Register
                                </PrimaryButton>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
