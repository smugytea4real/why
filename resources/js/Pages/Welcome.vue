<script setup>
import Guestlayout from '@/Layouts/GuestLayout.vue';
import PostCard from '@/Components/PostCard.vue';
import Pagination from '@/Components/Pagination.vue';
import CommunityList from '@/Components/CommunityList.vue';

defineProps({
    Communities: Object,
    posts: Object,
})

</script>
<template>
    <Guestlayout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <PostCard v-for="post in posts.data" :key="post.id" :post="post" :community="post.community_slug" />
                <div class="mt-4 p-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>
            <div class="w-4/12 p-4">
                <CommunityList :communities="communities.data" >
                    <template #title>Top Communities</template></CommunityList>
            </div>
        </section>
    </Guestlayout>
</template>