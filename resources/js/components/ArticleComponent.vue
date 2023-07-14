<template>
    <section>
        <div>
            <h1 class="text-4xl font-bold">{{ article.name }}</h1>
        </div>
        <div class="p-3 w-full max-h-72 min-h-[20rem]">
            {{ article.content }}
        </div>
    </section>
</template>
<script>
    export default {
        data() 
        {
            return {
                article: {
                    name: 'susiamogus',
                    content: 'leged of sus'
                }
            }
        },
        mounted() {
            console.log('mounted');
        }
    }
</script>