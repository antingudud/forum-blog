<script>
import { RouterView } from 'vue-router';
import ArticleListComponentVue from './components/ArticleListComponent.vue';
import NavbarComponentVue from './components/NavbarComponent.vue';

export default {
    components: {ArticleListComponentVue, NavbarComponentVue}
}

</script>

<template>
    <NavbarComponentVue class=""></NavbarComponentVue>

    <div class="text-white flex-1 h-full flex flex-row p-4 items-center justify-center bg-zinc-800 mt-2 border-2 border-solid border-zinc-700" style="height: calc(100% - 8rem);">

        <div class="w-1/3 grow flex flex-col overflow-y-scroll overflow-x-scroll h-full max-h-full border-2 border-solid border-zinc-700 mr-3">
            <div class="mb-3 p-6 flex-1 bg-zinc-800">
                <ArticleListComponent></ArticleListComponent>
            </div>
        </div>
        
        <div class="w-2/3 grow flex flex-col overflow-y-scroll overflow-x-scroll h-full max-h-full border-2 border-solid border-zinc-700">
            <div class="mb-3 p-6 flex-1 bg-zinc-800">
                <Router-View></Router-View>
            </div>    
        </div>

    </div>
</template>