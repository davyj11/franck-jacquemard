const Encore = require('@symfony/webpack-encore');
const glob = require('glob-all');
const path = require('path');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore.addAliases({
    "@framework": path.resolve(__dirname, 'assets/framework'),
    "@components": path.resolve(__dirname, 'assets/components/'),
    "@utilities": path.resolve(__dirname, 'assets/framework/utilities'),
});

Encore.addEntry('tailwind', './assets/framework/index.js');

glob.sync(`./assets/layouts/**/index.js`).forEach((jsFile) => {
    let destFile = jsFile.replace("./assets/", "");
    destFile = destFile.replace(path.extname(destFile), "");
    Encore.addEntry(destFile, jsFile);
})

glob.sync(`./assets/components/**/index.js`).forEach((jsFile) => {
    let destFile = jsFile.replace("./assets/", "");
    destFile = destFile.replace(path.extname(destFile), "");
    Encore.addEntry(destFile, jsFile);
})

glob.sync(`./assets/templates/**/index.js`).forEach((jsFile) => {
    let destFile = jsFile.replace("./assets/", "");
    destFile = destFile.replace(path.extname(destFile), "");
    Encore.addEntry(destFile, jsFile);
})

//Encore.addEntry('tailwind', './assets/framework/tailwind.js');

Encore
    .setPublicPath("")
    .enableBuildNotifications()
    // directory where compiled assets will be stored
    .setOutputPath('build/')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    .setManifestKeyPrefix('build/')

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    .enableIntegrityHashes(Encore.isProduction())

    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })

    // enables PostCSS support
    .enablePostCssLoader((config) => {
        // config.postcssOptions = {
        //     skipDuplicates: false
        // }
    })

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[hash:8].[ext]'
    })

    .copyFiles({
        from: './assets/fonts/icomoon/fonts',
        to: 'fonts/[path][name].[ext]'
    })

// enables Sass/SCSS support
//.enableSassLoader()

// uncomment if you use TypeScript
//.enableTypeScriptLoader()

// uncomment if you use React
//.enableReactPreset()

// uncomment if you're having problems with a jQuery plugin
//.autoProvidejQuery()
;
module.exports = Encore.getWebpackConfig();
