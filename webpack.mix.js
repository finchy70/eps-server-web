const mix = require('laravel-mix');

mix.webpackConfig({
    stats: {
        children: true
    }
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css',
        [
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
    // .browserSync({
    //     browser: 'google chrome',
    //     proxy: 'inspect.test',
    //     host: "inspect.test",
    //     open: 'false',
    //     port: 3000,
    //     notify: false,
    //     watch: true,
    // });
