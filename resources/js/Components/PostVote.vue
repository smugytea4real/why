<template>
    <div class="flex flex-col h-full w-12 p-2 bg-gray-200 text-center rounded-1-lg">
    <UpVoteLink :slug="post.slug" :class="{'text-blue-600': post.postVotes[0] && post.postVotes[0].vote === 1,
        }"
    />
    <div class="p-2 my-2 font bold" 
    :class="{
    'bg - blue - 600': post.postVotes[0] && post.postVotes[0].vote ==1,
    'bg - red - 600': post.postVotes[0] && post.postVotes[0].vote == -1,
    }">{{ post.votes }}</div>
   <DownVoteLink :slug="post.slug" :class="{
    'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1,
   }"/>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import UpvoteLink from './UpVoteLink.vue';
import DownVoteLink from './DownVoteLink.vue';

defineProps({
    post: Object,
});
</script>

<style>
</style>