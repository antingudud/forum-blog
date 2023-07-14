<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';
import { store } from '../stores/store';

export default {
    name: "ArticleList",
    data() {
        return {
            store,
            articles: "",
            links: "",
            meta: "",
        };
    },
    methods: {
        async getPosts(url) {
            if (url === undefined) {
                url = "/api/posts";
            }
            else if (url === null) {
                return;
            }
            await axios.get(url)
                .then((succ) => {
                let data = succ.data.data;
                data.forEach(dat => {
                    dat.create_time = this.formatDate(dat.create_time);
                });
                this.articles = data;
                this.links = succ.data.links;
                this.meta = succ.data.meta;
                console.log(succ.data);
            })
                .catch(function (err) { console.log(err); });
        },
        formatDate(date) {
            const newDate = new Date(date);
            const formatter = Intl.DateTimeFormat("en-US", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit"
            });
            return `${formatter.format(newDate)}`;
        }
    },
    watch: {
        store: {
            handler(newS, oldS)
            {
                const refresh_switch = newS.list_refresh_switch;
                if(refresh_switch)
                {
                    this.getPosts();
                    this.store.list_refresh_switch = false;
                }
            },
            deep: true
        }
    },
    created() {
        this.getPosts();
        console.log(this.token);
    },
    mounted() {
        console.log("Article list mounted.");
    },
    components: { RouterLink },
}
</script>
<template>
<section>
    <div v-if="store.access_token">
    <RouterLink to="/articles/post/new"><button class="bg-stone-700 border-2 border-solid border-zinc-500">New post</button></RouterLink>
    </div>

    <nav>
        <ul class="list-disc ml-3" v-if="articles">
                <li v-for="article in articles">
                    <p>{{ article.create_time }} {{ article.username }}: <RouterLink  :to="{ name: 'thread', params: { url: article.url } }" class="text-green-500 hover:text-green-400 visited:text-stone-400 visited:decoration-solid">{{ article.title }}</RouterLink></p>
                </li>
        </ul>
    </nav>

    <nav class="row row-col">
        <ul v-if="links" class="flex flex-row">
            <li class="mr-2 text-yellow-600 hover:text-yellow-400">
                <a @click.prevent="getPosts(links.first)" :href="links.first">1</a>
            </li>
            <li class="mr-2 text-yellow-600 hover:text-yellow-400">
                <a :class="[links.prev ? null: 'text-stone-500']" @click.prevent="getPosts(links.prev)" :href="links.prev">Prev</a>
            </li>
            <li class="mr-2 text-stone-500">
                <p>{{ meta.current_page }}</p>
            </li>
            <li class="mr-2 text-yellow-600 hover:text-yellow-400">
                <a :class="[links.next ? null: 'text-stone-500']" @click.prevent="getPosts(links.next)" :href="links.next">Next</a>
            </li>
            <li class="mr-2 text-yellow-600 hover:text-yellow-400">
                <a @click.prevent="getPosts(links.last)" :href="links.last">{{meta.last_page}}</a>
            </li>
        </ul>
    </nav>

</section>
</template>
