<template>
    <main class="pt-5 pb-2 h-100">
        <div class="container text-white">

            <div v-if="loading">...CARICAMENTO...</div>

            <div v-else-if="errorMessage.length > 0">
                {{ errorMessage }}
            </div>

            <!-- <PostListComponent v-else-if="!detail" :posts="posts" @clickedPost="showPost" /> -->

            <PostListPaginatedComponent v-else-if="!detail" :paginatedPosts="posts" @clickedPost="showPost"
                @requestPage="loadPage" />

            <div v-else>
                <PostComponent :post="detail" />
                <button @click="showList">BACK</button>
            </div>


        </div>
    </main>
</template>

<script>
import PostComponent from './PostComponent.vue';
import PostListComponent from './PostListComponent.vue';
import PostListPaginatedComponent from './PostListPaginatedComponent.vue';

export default {
    name: 'PostsComponent',
    components: {
        PostComponent,
        PostListComponent,
        PostListPaginatedComponent
    },
    data() {
        return {
            posts: undefined,
            detail: undefined,
            errorMessage: '',
            loading: true
        }
    },
    mounted() {
        console.log('PostComponent exists');

        this.loadPage('/api/posts');
    },
    methods: {

        showPost(id) {
            console.log(id);
            this.loading = true;
            axios.get('api/posts/' + id)
                .then(response => {
                    console.log(response)
                    this.detail = response.data.success ? response.data.results : undefined;
                    this.loading = false;
                })
                .catch(e => {
                    console.log('errore: ', e);
                    this.loading = false;
                })
        },
        showList() {
            this.detail = undefined;
        },
        loadPage(url) {
            axios.get(url).then(({ data }) => {
                if (data.success) {
                    this.posts = data.results;
                } else {
                    this.errorMessage = data.error;
                }
                this.loading = false;
            });
        }

    }
}

</script>

<style scoped lang="scss">
main {
    background-color: #948e8e9a;
}
</style>
