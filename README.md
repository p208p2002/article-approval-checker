# Article approval checker(AAC)
AAC is a vote system for evaluation a article is good or not; it's a simple vote system build up with AAC-server and AAC-client

[demo on github(only UI)](https://p208p2002.github.io/article-approval-checker/aac-client/build/)
#  AAC-server 
Develop by Laravel 5.2 (require PHP 5.5.9)

# AAC-client
Develop by React 15.6

# How to use
Although I want to set a server for free with it, but I don't have to much resource and for some security reason, so you need to set your own server for it.

## Deploy AAC-server
> PHP environment and Composer is require
```
$ composer install
$ cp .env.example .env
$ php artisan k:g
$ php artisan migrate
```
> You must set .env file with database info before `$ php artisan migrate`

## Use AAC-client
> Need install "npm" first
```
$ npm install
```
setting the **server url** at `aac-client/app/setting.js` 

then compile with webpack
```
$ webpack
```

compiled file will  at `/aac-client/build` and named "bundle.js"

simply import in your web site 

```
<script src="bundle.js"></script>
```

and add the html element to dispaly it

```
<div id="advancetool"></div>
```




