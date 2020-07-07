<template>
	<div>
		{{ link }} : <a :href="shortLink">{{ shortLink }}</a>
	</div>
</template>
<script>
	export default {
		data: function() {
			return {}
		},
		props: [
			'link', 'short'
		],
		computed: {
			shortLink: function() {
				return `${window.location.href}${this.short}`;
			}
		}
	}
</script>
<style>
</style>