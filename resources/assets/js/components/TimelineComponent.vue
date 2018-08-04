<template>
    <div class="row justify-content-center">
        <div class="col-md-8 posts">
            <h1 v-if="!posts.length" style='text-align: center;'>No posts</h1>
            <div class="media" v-for="post in posts" :key="post.id">
                <img class="mr-3" />
                <div class="media-body">
                    <div class="mt-3">
                        <a href="#">{{ post.user.name }}</a> | {{ post.createdDate }}
                    </div>
                    <p>{{ post.body }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Event from '../event.js';

export default {
    data() {
        return {
            posts: [],
            post: {},
            offset: 0
        }
    },
    methods : {
        handleScroll () {
            if ($(window).scrollTop() == ($(document).height() - $(window).height())) {
                this.fetchPosts();
            }
        },
        fetchPosts() {
            axios.get('/posts', {params : { offset : this.offset }}).then((resp => {
                if (resp.data !== undefined && resp.data.length > 0) {
                    this.posts = this.posts.concat(resp.data);
                    this.offset++;
                }
            }));
        }
    },
    mounted() {
        this.fetchPosts();
        Event.$on('added_post', (post) => {
            this.posts.unshift(post);
        });
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>