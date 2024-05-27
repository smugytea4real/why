<script setup>
import Guestlayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';
import PostCard from '@/Components/PostCard.vue';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    community: Object,
    posts: Object,
})

</script>
<template>
    <Guestlayout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <h1>{{ post.title }}</h1>
                Post Details
                <div class="mt-4 p-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>
            <div class="w-4/12 p-4">
                <div class="m-2 p-2 bg-slate-500 text-white">
                    <h2>Latests Communities</h2>
                </div>
            </div>
        </section>
    </Guestlayout>
</template>