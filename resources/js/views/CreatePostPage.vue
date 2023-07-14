<script>
    import axios from 'axios';
    import { store } from '../stores/store';

export default {
        props: ['csrf'],
        data()
        {
            return {
                store,
                title: "",
                content: "",
            }
        },
        methods: {
            sendPost()
            {
                let title = this.title;
                let content = this.content;

                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/post/', {
                        title: title,
                        content: content,
                    }, {
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + this.store.access_token
                        }
                    }).then(response => {
                        console.log(response);
                        store.list_refresh_switch = true;
                        this.$router.replace('/articles/post/'+response.data.post.url);
                        alert(response.data.message);
                    }).catch(error => {
                        console.error(error.response.data);
                        alert("Failed!\n" + error.response.data.message)
                    });
                })
            }
        },
        created() {
        },
        mounted() {
        }
    }
</script>
<template>
    <div>
    <div>
        <h3 class="text-4xl font-bold">
            Amingus
        </h3>
    </div>
    <div>
        <form class="flex flex-col" action="/api/posts/" method="post">
            <label for="title">Title</label>
            <input v-model="title" placeholder="Title" class="p-2 w-2/3 text-black " type="text" name="title" id="form-article-title">
            <label for="content">Message</label>
            <textarea v-model="content" class="p-2 w-2/3 text-black" name="content" id="form-article-content" cols="40" rows="10"></textarea>

            <button @click.prevent="sendPost()" class="w-1/6 border-2 border-green-900 border-solid bg-green-800">Post.</button>
        </form>
    </div>
    </div>
</template>
