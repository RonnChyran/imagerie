Imagerie
========

Imagerie is a small lightweight PHP package intended to provide a free alternative to Gyazo Ninja.

Features
--------
- HTML5 compliant<sup>1</sup>
- CSS3 Shadows 
- A password protected gallery that allows you to manage pictures
- **Database-less**
- For use with custom Gyazo builds
- Clean minimalistic design
- Facebook OpenGraph tags

<sup>1</sup><sub>OpenGraph tags on the image display page (`display.php`) are not recognized as standards by W3C and therefore render the webpage invalid with that one error</sub>

Requirements
------------
- A up to date HTML5 and CSS3 compliant browser (IE 8 and above, as well as Chrome, Firefox and Safari should be fine)
- Apache or another webserver<sup>2</sup>
- A custom build of Gyazo that uploads to said webserver
- PHP
- PHP-GD for OpenGraph and resizing
<sup>2</sup><sub>There are `.htaccess` files that are required for the script to work properly. There is an nginx version of the main rewrite `.htaccess` supplied, but it was created from an online converter. It may require edits. For all other webservers, you will have to create your own rewrite rules</sub>

Script Contents
---------------
- `index.php` simply points to the gallery web page
- `gallery.php` is the gallery web page where you can manage your images
- `display.php` displays a single image like how Gyazo normally shows images
- `thumb.php` generates thumbnails and resizes images. It is a copy of the [TimThumb](https://code.google.com/p/timthumb/) script.
- `gyazo.php` is a script Gyazo calls to upload images. The package is configured to use the `./uploads/` directory to store uploaded images. This can be changed by replacing all instances of `uploads/` in the script with your directory name.
- `trash.php` is called when a image is to be deleted. It moves the image into the `./dump/` directory, where it will be unable to be accessed, and can be removed or restored manually.


