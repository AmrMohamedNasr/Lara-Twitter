<template>
    <div class="row justify-content-center">
        <div class="col-md-8 posts">
            <h1 v-if="!posts.length" style='text-align: center;'>No posts</h1>
            <post-component v-for="post in posts" v-bind:post="post" v-bind:key="post.id"></post-component>
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
            time_limit: 0
        }
    },
    methods : {
        handleScroll () {
            if ($(window).scrollTop() == ($(document).height() - $(window).height())) {
                this.fetchPosts();
            }
        },
        fetchPosts() {
            axios.get('/posts', {params : { time_limit : this.time_limit }}).then((resp => {
                if (resp.data !== undefined && resp.data.length > 0) {
                    this.posts = this.posts.concat(resp.data);
                    this.time_limit = this.posts[this.posts.length - 1].created_at;
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