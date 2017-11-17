var path = require('path');
var webpack = require('webpack');

var config = {
    entry: [path.resolve(__dirname, 'app/main.jsx')],
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: 'bundle.js'
    },
    plugins: [
          new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            Tether: 'tether',
            Popper: ['popper.js', 'default'],
            // In case you imported plugins individually, you must also require them here:
            Util: "exports-loader?Util!bootstrap/js/dist/util",
            Dropdown: "exports-loader?Dropdown!bootstrap/js/dist/dropdown",
          })
      ],
    module: {
        loaders: [{
            test: /\.jsx?$/,
            loaders: ['babel-loader']
        },{
            test: /\.css$/,
            use: [ 'style-loader', 'css-loader' ]
        }]
    }
};

module.exports = config;