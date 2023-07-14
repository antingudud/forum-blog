<script>
import axios from 'axios';
import { store } from '../stores/store';

export default {
    name: "PostEditPage",
    data () {
        return {
            store,
            title: "",
            content: "",
            update_time: "",
            create_time: "",
            authorid: "",
            idpost: "",
        }
    },
    methods: {
        async handleEdit() {
            const targetUrl = "/api/post/" + this.$route.params.url + "/edit";
            await axios.put(targetUrl, {}, {
                headers: {
                    "Accept": "application/json",
                    "Authorization": "Bearer " + this.store.access_token
                },
                params: {
                    title: this.title,
                    content: this.content,
                    idpost: this.idpost
                }
            })
                .then(response => {
                console.log(response);
                this.$router.go(-1);
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
            });
        }
    },
    created() {
        this.getPost('/api/post/' + this.$route.params.url);
    }
};
</script>
<template>
    <div>
        <div>
            <button class="border-2 w-32 border-solid border-zinc-500 cursor-pointer bg-stone-700" @click="this.$router.replace( { path: '/articles/post/' + this.$route.params.url } )">Back</button>
        </div>
        
        <div class="text-sm text-zinc-400 font-bold">
            <p>Created: <span class="font-medium">{{ create_time }}</span></p>
            <p>Updated: <span class="font-medium">{{ update_time }}</span></p>
        </div>

        <div class="flex w-full">
            <form class="flex flex-col w-full" action="" method="get">
                <label for="form-input-title">Title</label>
                <input 
                    class="text-white bg-transparent w-full" 
                    type="text" 
                    name="title" 
                    id="form-input-title" 
                    v-model.lazy="title"
                >

                <label for="form-text-area-content">Post</label>
                <textarea 
                    class="text-black p-4 w-full" 
                    name="content" 
                    id="form-textarea-content" 
                    cols="30" 
                    rows="10"
                    v-model.lazy="content"
                >
                </textarea>

                <button @click.prevent="handleEdit" class="mt-4 border-2 w-32 bg-stone-700 border-solid border-zinc-500 cursor-pointer" type="submit">Submit edit</button>
            </form>
        </div>
    </div>
</template>