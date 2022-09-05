
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');
let fs  = require('fs');

mix.setPublicPath('../../public').mergeManifest();

// mix.js(__dirname + '/Resources/assets/js/app.js', 'js/popup.js')
//     .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/popup.css');

// mix.js(__dirname + '/Resources/assets/admin/js/*', 'js/')
//     .css( __dirname + '/Resources/assets/admin/css/*', 'css/');

// var path = __dirname + "/resources/assets/admin/css";

// fs.readdir(path, function(err, items) {
//     console.log(items);
 
//     for (var i=0; i<items.length; i++) {
//         mix.css(items[i], 'css/');
//     }

// });

var path = __dirname + "/Resources/assets/admin/css";

// fs.readdir(path, function(err, items) {
//     //console.log(items);
 
//     for (var i=0; i<items.length; i++) {
//         console.log(path+'/'+items[i])
//         mix.css(__dirname + '/Resources/assets/admin/css/'+items[i], 'css/'+ items[i]);
//     }

// });
mix.css(__dirname + '/Resources/assets/css/mdb/mdb.min.css', 'css/mdb/mdb.min.css');

mix.css(__dirname + '/Resources/assets/admin/css/font-awesome/css/font-awesome.min.css', 'admin/css/font-awesome/css/font-awesome.min.css');
mix.css(__dirname + '/Resources/assets/admin/css/Ionicons/css/ionicons.min.css', 'admin/css/Ionicons/css/ionicons.min.css');
mix.css(__dirname + '/Resources/assets/admin/css/datatables.net-bs/css/dataTables.bootstrap4.css', 'admin/css/datatables.net-bs/css/dataTables.bootstrap4.css');
mix.css(__dirname + '/Resources/assets/admin/css/fontawesome-free/css/all.min.css', 'admin/css/fontawesome-free/css/all.min.css');
mix.css(__dirname + '/Resources/assets/admin/css/dist/css/adminlte.min.css', 'admin/css/dist/css/adminlte.min.css');
mix.css(__dirname + '/Resources/assets/admin/css/custom.css', 'admin/css/custom.css');
mix.css(__dirname + '/Resources/assets/admin/css/navbar.css', 'admin/css/navbar.css');
mix.css(__dirname + '/Resources/assets/admin/css/register.css', 'admin/css/register.css');

mix.js(__dirname + '/Resources/assets/admin/js/jquery/jquery.min.js', 'admin/js/jquery/jquery.min.js');
mix.js(__dirname + '/Resources/assets/admin/js/bootstrap/js/bootstrap.bundle.min.js', 'admin/js/bootstrap/js/bootstrap.bundle.min.js');
mix.js(__dirname + '/Resources/assets/admin/js/dist/js/adminlte.min.js', 'admin/js/dist/js/adminlte.min.js');
mix.js(__dirname + '/Resources/assets/admin/js/custom.js', 'admin/js/custom.js');
mix.js(__dirname + '/Resources/assets/admin/js/customUserRole.js', 'admin/js/customUserRole.js');
mix.js(__dirname + '/Resources/assets/admin/js/register.js', 'admin/js/register.js');

mix.js(__dirname + '/Resources/assets/js/popupShow.js', 'js/popupShow.js');

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/popup.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/popup.css');
