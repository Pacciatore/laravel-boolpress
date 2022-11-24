<template>
    <main class="pt-5 pb-2">
        <div class="container text-white">

            <div v-if="loading">...CARICAMENTO...</div>

            <div v-else-if="errorMessage.length > 0">
                {{ errorMessage }}
            </div>

            <PostListPaginatedComponent v-else :paginatedPosts="postPageResult" @clickedPost="showPost"
                @requestPage="loadPage" />

        </div>
    </main>
</template>
<script>
import PostListPaginatedComponent from '../components/PostListPaginatedComponent.vue';

export default {
    name: 'PostsIndex',
    data() {
        return {
            postPageResult: undefined,
            errorMessage: '',
            loading: true
        }
    },
    mounted() {
        const page = this.$route.query.page ? this.$route.query.page : 1;
        this.loadPage('/api/posts?page=' + page); // this.$route.query.page || 1);
    },
    methods: {
        loadPage(url) {
            axios.get(url).then(({ data }) => {
                if (data.success) {
                    this.postPageResult = data.results;
                } else {
                    this.errorMessage = data.error;
                    this.$router.push({ name: 'notFound' });
                }
                this.loading = false;
            }).catch(e => {
                console.log(e);
            });
        },
        showPost(slug) {
            // console.log('hai cliccato il post con slug:', slug);
            this.$router.push('/posts/' + slug)
        }

    },
    components: {
        PostListPaginatedComponent
    }
}
</script>
<style lang="scss" scoped>
main {
    background-color: #948e8e9a;
}
</style>
