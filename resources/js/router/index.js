// import { createRouter, createWebHistory } from 'vue-router';
import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '../views/HomePage.vue';
import LoginPage from '../views/LoginPage.vue';
import PostPage from '../views/PostPage.vue';
import CreatePostPage from '../views/CreatePostPage.vue';
import EditPostPage from '../views/EditPostPage.vue';
import Team404 from '../views/Team404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage
    },
    {
        path: '/404',
        name: '404',
        component: Team404
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage
    },
    {
        path: '/dummypost',
        name: 'dummypost',
        component: PostPage
    },
    {
        path: '/articles/post/:url',
        name: 'thread',
        component: PostPage
    },
    {
        path: '/articles/post/:url/edit',
        name: 'editpost',
        component: EditPostPage,
        props: true
    },
    {
        path: '/articles/post/new',
        name: 'createpost',
        component: CreatePostPage
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

router.beforeEach(async (to , from) => {
    if( (!localStorage.access_token && to.name === 'createpost') || (!localStorage.access_token && to.name === 'editpost') )
    {
        return { name: 'login' };
    }
    else if( localStorage.access_token && to.name === 'login' )
    {
        return { name: 'home' };
    }
});

export default router;