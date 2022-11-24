import Vue from "vue";
import VueRouter from "vue-router";

import HomePage from './pages/HomePage.vue';
import AboutPage from './pages/AboutPage.vue';
import ContactsPage from './pages/ContactsPage.vue';

import PostsIndex from './pages/PostsIndex.vue';
import PostShow from './pages/PostShow.vue';

import NotFound from './pages/NotFound.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        { path: '/', name: 'home', component: PostsIndex /*HomePage : al momento voglio vedere i post anche in home*/ },
        {
            path: "/posts",
            name: "posts-index",
            component: PostsIndex,
        },
        {
            path: "/posts/:slug",
            name: "posts-show",
            component: PostShow,
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsPage
        },

        {
            path: '/*',
            name: 'notFound',
            component: NotFound
        }
    ]
})

export default router;
