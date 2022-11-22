<template>
    <div>

        <div v-if="posts.length > 0">

            <div v-for="post in posts" :key="post.id">
                <span @click="showPost(post.id)">{{ post.title }}</span>
            </div>

            <div class="page-navigation my-2">

                <button :class="{ disable: !paginatedPosts.prev_page_url }"
                    @click="go(paginatedPosts.first_page_url)">First Page</button>

                <button :class="{ disable: !paginatedPosts.prev_page_url }"
                    @click="go(paginatedPosts.prev_page_url)">&lt;&lt;</button>

                <span>{{ currentPage }}/{{ totalPages }}</span>

                <button :class="{ disable: !paginatedPosts.next_page_url }"
                    @click="go(paginatedPosts.next_page_url)">>></button>

                <button :class="{ disable: !paginatedPosts.next_page_url }"
                    @click="go(paginatedPosts.last_page_url)">Last Page</button>

            </div>

        </div>

        <div v-else>
            Nessun post da visualizzare :(
        </div>



    </div>
</template>

<script>
export default {
    name: 'PostListPaginatedComponent',
    computed: {
        posts() {
            return this.paginatedPosts.data;
        },
        currentPage() {
            return this.paginatedPosts.current_page;
        },
        totalPages() {
            return this.paginatedPosts.last_page;
        }
    },
    props: {
        paginatedPosts: Object
    },
    methods: {
        showPost(id) {
            this.$emit('clickedPost', id);
        },
        go(url) {
            this.$emit('requestPage', url);
        }
    },
}

</script>

<style scoped lang="scss">
button.disable {
    opacity: 0.5;
    pointer-events: none;
}
</style>
