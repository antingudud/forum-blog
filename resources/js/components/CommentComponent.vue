<script>
import { store } from '../stores/store';
import axios from 'axios';

export default {
    name: "Comment",
    data() {
        return {
            store,
            commentText: "",
            comments: {}
        };
    },
    methods: {
        async getComments(url)
        {
            await axios.get(url)
            .then((response) => {
                const comments = response.data.comments;
                this.comments = comments;
                console.log(comments);
            })
            .catch((err) => {
                console.error(err);
            });
        },
        async handleDelete(data)
        {
            const target = data.to;
            const id = data.id;
            const getCommentsUrl = data.getUrl

            await axios.delete(target, {
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer ' + this.store.access_token
                },
                params: {
                    id: id
                }
            })
            .then((response) => {
                console.log(response);
                this.getComments(getCommentsUrl);
                alert(response.data.message);
            })
            .catch((error) => {
                console.error(error);
                alert(error.response.data.message);
            });
        },

        /**
         * 
         * @param {String} data.to url to send the data to
         * @param {String} data.content comment message
         * @param {String} data.getUrl url to get comments
         */
        async handleComment(data)
        {
            const target = data.to;
            const content = data.content;
            const getCommentsUrl = data.getUrl;

            await axios.post('/api/post/'+target+'/comment/add',
            {
                content: content
            },
            {
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer ' + this.store.access_token
                }
            })
            .then((response) => {
                console.log(response);
                this.getComments(getCommentsUrl);
            })
            .catch((error) => {
                console.error(error);
                alert(error.response.data.message);
            });
        }
    },
    created() {
        this.getComments('/api/post/' + this.$route.params.url + '/comments');
    }
};
</script>
<template>
<div class="flex flex-col">
    <div v-if="this.store.access_token" class="flex flex-col m-4">
        <p class="text-white">Leave a comment</p>
        <textarea v-model.lazy="commentText" class="text-black p-3 mt-4" name="commentText" id="inputCommentField" rows="5"></textarea>
        <button class="w-24 mt-4 bg-stone-700 border-2 border-solid border-zinc-500" @click.prevent="handleComment({to: this.$route.params.url, content: commentText, getUrl: '/api/post/' + this.$route.params.url + '/comments'})">Submit</button>
    </div>
    <div v-if="comments" v-for="comment in comments" :id="comment.idcomment" class="border-solid border-2 border-zinc-700 p-2 mt-2 flex flex-row w-full">
        <div class="w-2/3">
            <p class="text-lg font-semibold">{{ comment.authorID }}</p>
            <p class="text-sm text-zinc-400 font-bold">{{ comment.create_time }}</p>
            <p>{{ comment.text }}</p>
        </div>
        <div v-if="comment.authorID == store.UID" class="w-1/3">
            <button @click.prevent="handleDelete({to: '/api/post/'+this.$route.params.url+'/comment', id: comment.idcomment, getUrl: '/api/post/' + this.$route.params.url + '/comments'})" class="w-24 mt-4 bg-red-500 border-2 border-solid border-zinc-500" >Delete</button>
        </div>
    </div>
</div>
</template>