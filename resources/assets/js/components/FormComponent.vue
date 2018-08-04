<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Share your thoughts</div>

                <div class="card-body">
                    <form @submit.prevent="saveTweet">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea 
                                        class="form-control" 
                                        rows="2" cols="8" 
                                        maxlength="130"
                                        v-model="body"
                                        required>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary">
                                        Share
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>   
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
                body : '',
                postData : {}
            }
        },
        methods: {
            saveTweet() {
                axios.post('/posts', {
                    body: this.body
                }).then(res => {
                    this.postData = res.data;
                    Event.$emit('added_post', this.postData);
                    console.log(res.data);
                }).catch(e => {
                    console.log(e);
                });
                this.body = '';
            }
        }
    }
</script>
