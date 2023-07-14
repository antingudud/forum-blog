<script>
import axios from 'axios';
import PostComponent from '../components/PostComponent.vue';
import { store } from '../stores/store';
import CommentComponent from '../components/CommentComponent.vue';

export default {
    components: {PostComponent, CommentComponent},
    data() {
        return {
            store,
            title: "",
            content: "",
            create_time: "",
            update_time: "",
            authorID: "",
            idpost: "",
            showContent: false
        }
    },
    methods: {
        async handleDelete() {
            await axios.delete("/api/post/" + this.$route.params.url + "/delete", {
                headers: {
                    "Accept": "application/json",
                    "Authorization": "Bearer " + this.store.access_token
                },
                params: {
                    id: this.idpost,
                    confirmation: true
                }
            })
                .then(response => {
                console.log(response);
                this.$router.replace('/');
                store.list_refresh_switch = true;
            })
                .catch(error => {
                console.error(error);
                alert(error.response.data.message);
            });
        },
        async getPost(url)
        {
            await axios.get(url)
            .then((response) => {
                const post = response.data.post;
                this.title = post.title;
                this.content = post.content;
                this.create_time = post.create_time;
                this.update_time = post.update_time;
                this.authorID = post.authorID;
                this.idpost = post.idpost;
            })
            .catch(error => {
                if(error.response.status === 404)
                {
                    this.$router.replace({ name: '404' });
                }
            });
        }
    },
    beforeRouteUpdate(to, from)  {
        this.getPost('/api/post/'+to.params.url);
        this.showContent = false;
    },
    mounted() {
        this.getPost('/api/post/'+this.$route.params.url);
    },
    computed: {
        commentStatus()
        {
            return this.showContent ? "Comments" : "Show comments";
        }
    }
}
</script>

<template>
        <PostComponent
        :title="title"
        :content="content"
        :create_time="create_time"
        :update_time="update_time"
        :authorID="authorID"
        :idpost="idpost"
        ></PostComponent>

        <div v-if="store.access_token && (store.UID == authorID)">
            <RouterLink
            :to="{
                name: 'editpost',
                params: {
                    url: this.$route.params.url,
                }
                }">
                Edit
            </RouterLink>
            <button @click.prevent="handleDelete()" type="submit" class="bg-red-400 border-2 border-solid border-stone-500">
                Delete
            </button>
        </div>

        <button @click="showContent = true">{{ commentStatus }}</button>
        <CommentComponent v-if="showContent"></CommentComponent>
</template>