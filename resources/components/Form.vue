<template>
	<div>
		<h2>Form</h2>
		<input type="text" v-model="link">
		<button @click="generate">Generate link</button>
		<div>
			Your link is: 
			<span>{{ short }}</span>
		</div>
		
		<h3>
			Links
		</h3>
		<table>
			<tr>
				<th>Link</th>
				<th>Shortlink</th>
			</tr>
			<shortlink 
				v-for="link in links"
				:link="link.url"
				:short="link.short">
			</shortlink>
		</table>
	</div>
</template>
<script>
	import axios from 'axios';

	export default {
		data: function() {
			return {
				link: '',
				short: '',
				links: []
			}
		},
		methods: {
			getAllLinks: function() {
				axios.get('/api/shortlink')
					.then((response) => {
						this.links = response.data;
					}).catch((error) => {
						console.log('Couldnt load links');
					})
			},
			generate: function() {
				axios.post('/api/shortlink', {
					'url': this.link
				}).then((response) => {
					this.short = `${window.location.href}${response.data.short}`;
					this.link = '';
					this.getAllLinks();
				}).catch((error) => {
					console.log('Error generating short link: ', error);
				});
			}
		},
		created: function () {
			console.log('Here');
			this.getAllLinks();
		}
	}
</script>
<style scoped>
	* {
		font-family: 'Lato', sans-serif;
	}
</style>