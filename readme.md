# Joorx CMS

[![release this repo](https://img.shields.io/github/release/hexageek1337/JoorxCMS.svg)]()
[![issues this repo](https://img.shields.io/github/issues/hexageek1337/JoorxCMS.svg)](https://github.com/hexageek1337/JoorxCMS/issues)
[![fork this repo](https://img.shields.io/github/forks/hexageek1337/JoorxCMS.svg)](https://github.com/hexageek1337/JoorxCMS/network)
[![star this repo](https://img.shields.io/github/stars/hexageek1337/JoorxCMS.svg)](https://github.com/hexageek1337/JoorxCMS/stargazers)
[![license this repo](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/hexageek1337/JoorxCMS/master/license.txt)
[![download this repo](https://img.shields.io/github/downloads/hexageek1337/JoorxCMS/total.svg)]()

Joorx CMS an innovation that can provide new solutions for its users, of course CMS is already integrated is safe, comfortable, and easy to use. This CMS is created based on the framework base of codeigniter version 3.1.5 , and of course Joorx CMS is built based on the standard rules of codeigniter.

# Installation
- Import file joorxcms.sql to your database name
- Open application/config/config.php with text editor and change base_url to url your site
- Open application/config/database.php with text editor and change config your database
- Open application/config/joorxcms.php with text editor and change setting seo your site
- Open application/config/disqus.php with text editor and change your shortname disqus
- Open application/config/recaptcha.php with text editor and setting your site key & secret key
- Open application/models/user_model.php with text editor and setting your smtp in function sendEmail
- Open robots.txt with text editor and setting robots for your sites

# :heavy_exclamation_mark: Important
- Change user login default for avoid piercing login page
<br />
  User :<br />
  [-] admin (password : adminjoorxcms123!)<br />
  [-] joorxcms (password : adminjoorxcms123!)<br />
  [-] member (password : memberjoorxcms123!)<br />

# Server Requirements
- MySQL Server
- PHP version 5.6 or newer is recommended. It should work on 5.3.7 as well, but we strongly advise you NOT to run such old versions of
  PHP, because of potential security and performance issues, as well as missing features.
