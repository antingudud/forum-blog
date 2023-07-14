<script>
    import axios from 'axios';
    import { store } from '../stores/store';

export default {
        props: ['csrf'],
        data()
        {
            return {
                store,
                username: "",
                password: "",
                token: this.csrf
            }
        },
        methods: {
            async submitForm()
            {
                let username = this.username;
                let password = this.password;
                let token = this.token;
                if(password.length < 1 || username.length < 1)
                {
                    // OOOOWWAAAAA
                    alert("YOU DUMB ASS FUCK");
                    return;
                }

                await axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login', {
                        username: username,
                        password: password,
                        _token: token
                    }, {
                        headers: {
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + this.token
                        }
                    }).then((response) => {
                        console.log(response);
                        if(response.data.status === true)
                        {
                            localStorage.setItem('access_token', response.data.token);
                            localStorage.setItem('username', response.data.user.username);
                            localStorage.setItem('UID', response.data.user.UID);
                            this.store.username = response.data.user.username;
                            this.store.UID = response.data.user.UID;
                            this.store.access_token = response.data.token;
                            this.$router.replace('/');
                        }
                    }).catch((error) => {
                        console.warn("LOGIN ERR START");
                        console.log(error.toJSON());
                        console.error(error);
                        alert(error.response.data.message);
                        console.warn("LOGIN ERR END");
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
    <form action="" method="POST" class="flex flex-col" id="login-form">
        <input v-model="token" type="hidden" name="_token">

        <label for="username">Username</label>
        <input v-model="username" class="text-black placeholder-gray-500" placeholder="Insert username..." type="text" name="username" id="form-login-username">

        <label for="password">Password</label>
        <input v-model="password" class="text-black placeholder-gray-500" placeholder="Insert password..." type="password" name="password" id="form-login-password">

        <button @click.prevent="submitForm()" class="bg-green-300" type="submit" id="button-submit">Login</button>
    </form>
</template>
