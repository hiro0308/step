<template>
	<div class="p-user__fav"
		:class="{'active':this.isLikedBy}"
		@click="clickLike"
	>
		お気に入り
	</div>
</template>


<script>
	export default {
		props: {
			initialIsLikedBy: {
				default: false,
			},
			authorized: {
				default: false,
			},
			endpoint: {
				type: String,
			},
		},
		data() {
			return {
				isLikedBy: this.initialIsLikedBy,
			}
		},
		methods: {
			clickLike() {
				if(!this.authorized) {
					alert('「いいね」はログイン中のユーザーのみ使用できます')
					return
				}
				
				this.isLikedBy ? this.unlike() : this.like()
			},
			async like() {
				const response = await axios.put(this.endpoint)
				
				this.isLikedBy = true
			},
			async unlike() {
				const response = await axios.delete(this.endpoint)
				
				this.isLikedBy = false
			},
		},
	}
</script>