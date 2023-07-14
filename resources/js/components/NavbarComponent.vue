<script>
import { RouterLink } from 'vue-router';
import axios from 'axios';
import { store } from '../stores/store';

export default {
    name: "Navbar",
    methods: {
        async handleLogout() {
            await axios.get('/api/logout', {
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + this.store.access_token
                }
            }).then((response) => {
                console.log(response);
                localStorage.clear();
                this.store.username = "";
                this.store.UID = "";
                this.store.access_token = false;
            }).
            catch((err) => {
                if(err.response.status === 401)
                {
                    console.warn("LOGOUT UNAUTHORIZED CLEANUP START");
                    localStorage.clear();
                    this.store.username = "";
                    this.store.UID = "";
                    this.store.access_token = false;
                    console.warn("LOGOUT UNAUTHORIZED CLEANUP END");
                }
                console.warn("LOGOUT ERR START");
                console.error(err.toJSON());
                console.warn("LOGOUT ERR END");
                alert(err.response.data.message);
            });
        }
    },
    data() {
        return {
            store
        };
    },
    components: { RouterLink }
}
</script>
<template>

<nav class="text-white shrink-0 top-0 z-50 flex flex-col items-center justify-center h-32 max-h-24 w-full p-3 bg-zinc-800 border-2 border-solid border-zinc-700">
        <div class="pl-2 pr-2 flex-1 flex bg-neutral-700 justify-between items-center max-h-full w-full mr-8 ml-8 mb-2">
            <h2 class="flex-grow">
                Home
            </h2>
            <ul class="flex list-none flex-grow justify-end mr-3 m-0">
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500">
                        <RouterLink class="hover:text-red-300" to="/">Home</RouterLink>
                    </button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="#">Blog</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="#">Gallery</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="#">Explore</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="#">About Me</a></button>
                </li>
                <li class="mr-1">
                    <button v-if="!store.access_token" class="border-2 w-32 border-solid border-zinc-500">
                        <RouterLink to="/login" class="hover:text-red-300">Log in</RouterLink>
                    </button>

                    <button v-if="store.access_token" class="border-2 w-32 border-solid border-zinc-500">
                        <a @click.prevent="handleLogout" class="hover:text-red-300" href="#">Log Out</a>
                    </button>
                </li>
            </ul>
            <ul class="flex list-none m-0 w-1/12 justify-end">
                <li class="mr-6">
                        <a v-if="store.access_token" class="text-white hover:text-red-300" href="#">{{ store.username }}</a>
                        <a v-else class="text-white hover:text-red-300" href="#">Guest</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center pl-2 pr-2 flex-1 bg-neutral-700 max-h-full w-full">
            <img class="border-2 border-solid border-zinc-600 mr-3 w-10 h-10" src="../../../public/images/avatar.png" width="40px" height="40px" alt="">
            <ul>
                <li>
                    Recent article: <a class="text-white hover:text-gray visited:text-purple-500 visited:decoration-solid" href="#">README.md</a>
                </li>
            </ul>
        </div>
    </nav>
</template>