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

Installation and Usage
----------------------

First, upload **all** the files in the **webserver** directory to your **website root**, including the folder structure. I recommend you set up a VirtualHost subdomain if using Apache. For security, you may rename `gyazo.php`. Remember what you named it later.

**Change the `$password` variable in `gallery.php` to something else other than the default `password`.** This is used to login to the gallery.
Now, compile a custom version of Gyazo that uploads to your webserver. Submodules containing Gyazo source code for Windows, OSX, and linux can be found under the gyazo folder in this repository.

### Windows
Replace `gyazo.com` in [Line 794](https://github.com/gyazo/Gyazowin/blob/master/gyazowin/gyazowin.cpp#L794) of `gyazowin.cpp` with your (sub)domain name. Replace `/upload.cgi` in [Line 795](https://github.com/gyazo/Gyazowin/blob/master/gyazowin/gyazowin.cpp#L795) with `/gyazo.php`, or whatever you named it in the step beforehand.

Compile with Visual Studio 2008.

### Mac
Replace `gyazo.com` in [Line 50](https://github.com/gyazo/Gyazo/blob/master/Gyazo/script#L50) of `script` with your (sub)domain name. Replace `/upload.cgi` in [Line 51](https://github.com/gyazo/Gyazo/blob/master/Gyazo/script#L51) with `/gyazo.php`, or whatever you named it in the step beforehand.

Turn off code signing in Xcode if you do not have a certificate.

Compile with Xcode

### Linux 
Replace `gyazo.com` in [Line 37](https://github.com/gyazo/Gyazo-for-Linux/blob/master/gyazo#L37) of `gyazo` with your (sub)domain name. Replace `/upload.cgi` in [Line 38](https://github.com/gyazo/Gyazo-for-Linux/blob/master/gyazo#L38) with `/gyazo.php`, or whatever you named it in the step beforehand.

`ruby ./gyazo`

### Usage

To get the raw image, add `raw` as a GET parameter to the display page. Adding `w` or `h` as a GET parameter to the display page will scale accordingly, for example

`http://images.punyman.com/uploads/c55e9bc50bbc2eacf700.png?raw&w=240&h=240` will yield
![Imagerie demo](http://images.punyman.com/uploads/c55e9bc50bbc2eacf700.png?raw&w=240&h=240)

This also works without raw, for example see [here](http://images.punyman.com/uploads/c55e9bc50bbc2eacf700.png?w=240&h=240) for a demo.

Feel free to change the CSS to your liking.

`thumb.php` and `trash.php` should not be called directly.




