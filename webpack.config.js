var path=require('path');

module.exports={
    entry: {
        App: "./app/js/app.js",
        //Lazy: "./app/js/modules/laziloading.js"
    },
    output: {
        path: path.resolve(__dirname, 'app/js'),
        filename: "[name].bundled.js"
    },
    module: {
        loaders: [
            {
                loader: 'babel-loader', 
                query:{
                    presets: ['es2015']
                },
                test: /\.js$/,
                exclude: /node_modules/
            }
        ]
    }
}

//   npm install webpack babel-core babel-loader babel-preset-es2015 --save-dev