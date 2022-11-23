<template>
    <div>

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

</style>
