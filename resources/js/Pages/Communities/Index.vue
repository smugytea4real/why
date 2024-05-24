<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Pagination from '@/Components/Pagination.vue';

defineProps({
  communities: {
    type: Object,
  }
});

</script>

<template>
  <Head title="All Communities" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">All Communities</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8">
          <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Communities</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the communities in your account including their name and slug.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <Link :href="route('communities.create')">
          <button type="button" class="inline-flex items-center justify-center rounded-md px-4 py-2 bg-red-600 border border-transparent text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Add Community</button>
        </Link>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Slug</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="communities in communities.data" :key="communities.id">
                  <td class="text-center whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ communities.name }}</td>
                  <td class="text-center whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ communities.slug }}</td>
                  <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                    <Link :href="route('communities.edit', communities.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</Link>
                    <Link :href="route('communities.destroy', communities.id)" class="text-red-600 hover:text-red-900" method="delete" as="button" type="button">Delete</Link>
                  </td>
                </tr>

                <!-- More people... -->
              </tbody>
            </table>
            <div class="m-2 p-2">
             <Pagination :links="communities.links" /> 
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      </div>
    </div>
  </AuthenticatedLayout>
</template>

