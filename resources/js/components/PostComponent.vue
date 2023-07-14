<script>
import { RouterLink } from 'vue-router';
export default {
    name: "PostComponent",
    props: ["title", "content", "update_time", "create_time", "authorID"],
    methods: {
    },
    data() {
        return {};
    },
    components: { RouterLink }
}
</script>
<template>

    <!-- Post -->
    <article class="p-3 w-full max-h-72 min-h-[20rem]">

        <h1 class="text-4xl font-bold">{{ title }}</h1>

        <p class="text-sm text-zinc-400 font-bold">Created: <span class="font-medium">{{ create_time }}</span></p>
        <p class="text-sm text-zinc-400 font-bold">Updated: <span class="font-medium">{{ update_time }}</span></p>

        <p>
            {{ content }}
        </p>

    </article>

</template>