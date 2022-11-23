<template>
    <div id="app">

        <NavComponent :navElements="nav" />

        <router-view></router-view>
    </div>
</template>

<script>
import NavComponent from '../components/NavComponent.vue';


export default {
    name: "App",
    components: { NavComponent },
    data() {
        return {
            nav: [
                {
                    path: '/',
                    label: 'Home'
                },
                {
                    path: '/posts',
                    label: 'Blog'
                },
                {
                    path: '/about',
                    label: 'About'
                },
                {
                    path: '/contacts',
                    label: 'Contacts'
                },
            ]
        }
    }
}
</script>

<style scoped lang="scss">
#app {
    height: 100vh;

    :nth-child(2) {
        height: 90%;
    }
}
</style>
