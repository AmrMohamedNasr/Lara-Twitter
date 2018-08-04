<template>
	<div class="media p-3">
        <img class="mr-3" />
        <div class="media-body">
            <div class="card card-default">
            	<div class="card-header">
					<div class="mt-3">
		                <div style='float:left;'>
		                	<a href="#">{{ post.user.name }}</a>
		                </div>
		                <div style='float:right'>
		                	 {{ post.createdDate }}
		             	</div>
		            </div>
		        </div>
		        <div class="card-body">
		            <p>{{ post.body }}</p>
		        </div>
        	</div>
        </div>
    </div>
</template>

<script>
	export default {
		props : ['post']
	}
</script>