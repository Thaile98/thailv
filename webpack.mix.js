let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js');
// mix.sass('resources/assets/sass/main_page/search_job/main_search_job.scss', 'public/css')
//    .sass('resources/assets/sass/main_page/search_job/main_search_job_mobile.scss', 'public/css')
//    .sass('resources/assets/sass/main_page/search_job/full_search_job.scss', 'public/css');
mix.sass('resources/assets/sass/main_page/home_page/main_home.scss', 'public/css')
	.sass('resources/assets/sass/main_page/home_page/main_home_mobile.scss', 'public/css')
	.sass('resources/assets/sass/main_page/home_page/full_home.scss', 'public/css');
// mix.sass('resources/assets/sass/main_page/job_detail/main_job_detail.scss', 'public/css')
// 	.sass('resources/assets/sass/main_page/job_detail/full_job_detail.scss', 'public/css')
// 	.sass('resources/assets/sass/main_page/job_detail/main_job_detail_mobile.scss', 'public/css');
// mix.sass('resources/assets/sass/main_page/posts/main_posts.scss', 'public/css')
// 	.sass('resources/assets/sass/main_page/posts/main_posts_mobile.scss', 'public/css')
// 	.sass('resources/assets/sass/main_page/posts/full_posts.scss', 'public/css');
// mix.sass('resources/assets/sass/main_page/post_detail/main_post_detail.scss', 'public/css')
// 	.sass('resources/assets/sass/main_page/post_detail/main_post_detail_mobile.scss', 'public/css')
// 	.sass('resources/assets/sass/main_page/post_detail/full_post_detail.scss', 'public/css');
