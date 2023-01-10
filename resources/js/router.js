import Vue from "vue";
import VueRouter from "vue-router";


Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import(/* webpackChunkName: "homePage" */ './pages/HomePage.vue')
        },
        {
            path: "/posts",
            name: "posts-index",
            component: () => import(/* webpackChunkName: "index" */ './pages/PostsIndex.vue')
        },
        {
            path: "/posts/:slug",
            name: "posts-show",
            component: () => import(/* webpackChunkName: "postShow" */ './pages/PostShow.vue'),
        },
        {
            path: '/about',
            name: 'about',
            component: () => import(/* webpackChunkName: "about" */ './pages/AboutPage.vue')
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: () => import(/* webpackChunkName: "contacts" */ './pages/ContactsPage.vue')
        },

        {
            path: '/404',
            alias: '*',
            name: 'notFound',
            component: () => import(/* webpackChunkName: "notFound" */ './pages/NotFound.vue')
        }
    ]
})

export default router;
