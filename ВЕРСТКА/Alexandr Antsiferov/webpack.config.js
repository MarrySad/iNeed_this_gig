const path = require('path');

module.exports = {
	entry: path.resolve(__dirname, './src/app.js'),
	output: {
		filename: 'main.js',
		path: path.resolve(__dirname, 'my_js')
	},
	mode: 'development',
	module: {
		rules: [
			{
				test: /\.jsx?$/,
				exclude: /node_modules/,
				use: "babel-loader"
			}
		]
	},
	devServer: {
		contentBase: path.resolve(__dirname, 'dist'),
		historyApiFallback: true
	}
}