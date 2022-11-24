<template>
    <div>

        <div class="post-list-page" v-if="posts.length > 0">

            <div class="post" v-for="post in posts" :key="post.id">
                <span class="post-title" @click="showPost(post.slug)">{{ post.title }}</span>
            </div>

            <div class="page-navigation my-2">

                <button :class="{ disable: !paginatedPosts.prev_page_url }"
                    @click="go(paginatedPosts.first_page_url, 1)">First Page</button>

                <button :class="{ disable: !paginatedPosts.prev_page_url }"
                    @click="go(paginatedPosts.prev_page_url, currentPage - 1)">&lt;&lt;</button>

                <span>{{ currentPage }}/{{ totalPages }}</span>

                <button :class="{ disable: !paginatedPosts.next_page_url }"
                    @click="go(paginatedPosts.next_page_url, currentPage + 1)">>></button>

                <button :class="{ disable: !paginatedPosts.next_page_url }"
                    @click="go(paginatedPosts.last_page_url, totalPages)">Last Page</button>

            </div>

        </div>

        <!-- Error message: 'Nessun post da visualizzare :(' -->
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
        showPost(slug) {
            this.$emit('clickedPost', slug);
        },
        go(url, pageNumber) {
            console.log('go to url:', url);
            if (url) {
                this.$router.push({ path: '/posts', query: { page: pageNumber } })
                this.$emit('requestPage', url)
            }
        }
    },
}

</script>

<style scoped lang="scss">
.post-list-page {
    .post {
        .post-title {
            &:hover {
                cursor: pointer;
            }
        }
    }

    .page-navigation {
        button.disable {
            opacity: 0.5;
            pointer-events: none;
        }
    }
}
</style>
