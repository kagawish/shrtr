const path = require('path');
// const VueLoaderPlugin = require('vue-loader');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
	mode: "development",
	entry: ["./resources/entry.js"],
	output: {
		path: path.resolve(__dirname, 'public/js'),
		filename: 'bundle.js'
	},
	module: {
		rules: [{
			test: /\.js$/,
			use: 'babel-loader'
		}, {
			test: /\.vue$/,
			use: 'vue-loader'
		}, {
			test: /\.css$/i,
			use: ['style-loader', 'css-loader'],
		}, {
			test: /\.sass$/,
			use: [
				'vue-style-loader',
				'css-loader', {
					loader: 'sass-loader',
					options: {
						sassOptions: {
							indentedSyntax: true
						}
					}
				}
			]
		}]
	},
	plugins: [
        new VueLoaderPlugin(),
    ],
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    }
};