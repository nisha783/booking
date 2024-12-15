import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [

                'resources/css/app.css',

                // auth  theme css file 

                'resources/assets/vendors/mdi/css/materialdesignicons.min.css',
                'resources/assets/vendors/css/vendor.bundle.base.css',
                'resources/assets/css/style.css',
                'resources/assets/images/favicon.png',
                // 'resources/',


                // auth theme js file 

                'resources/assets/vendors/js/vendor.bundle.base.js',
                'resources/assets/js/off-canvas.js',
                'resources/assets/js/hoverable-collapse.js',
                'resources/assets/js/misc.js',
                'resources/assets/js/settings.js',
                'resources/assets/js/todolist.js',




                'resources/js/app.js'


            ],

            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',  // Ensure this path is set correctly
    }
});
