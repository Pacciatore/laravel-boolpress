<template>
    <nav class="navbar justify-content-evenly">

        <div v-for="link, index in navElements" :key="index" class="nav-link">
            <router-link :to="link.path">{{ link.label }}</router-link>
        </div>

    </nav>
</template>
<script>
export default {
    name: 'NavComponent',
    props: {
        navElements: Array
    }
}
</script>
<style lang="scss" scoped>
nav {
    height: 10%;
}
</style>
