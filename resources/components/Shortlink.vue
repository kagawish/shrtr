<template>
	<tr>
		<td>{{ link }}</td>
		<td>
			<a :href="shortLink" target="_blank">{{ shortLink }}</a>
		</td>
	</tr>
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
<style scoped>
	a {
		text-decoration: none;
	}
	td {
		padding: 5px 10px;
		padding-left: 0;
		font-family: 'Lato', sans-serif;
	}
</style>