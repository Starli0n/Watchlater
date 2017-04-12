# Watchlater

[![Heroku App](https://heroku-badge.herokuapp.com/?app=watchlaterapp)](https://watchlaterapp.herokuapp.com)
[![Codeship Status](https://codeship.com/projects/d5547de0-01ad-0135-39d5-52a787a130cb/status?branch=master)](https://codeship.com/projects/212902)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/706088f6-fa1f-49bd-8e60-7fabbe19b5a8/mini.png)](https://insight.sensiolabs.com/projects/706088f6-fa1f-49bd-8e60-7fabbe19b5a8)
[![Coverage Status](https://coveralls.io/repos/github/Starli0n/Watchlater/badge.svg?branch=master)](https://coveralls.io/github/Starli0n/Watchlater?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/58ee49de0f9f35004e5c4b7a/badge.svg?style=flat)](https://www.versioneye.com/user/projects/58ee49de0f9f35004e5c4b7a)
[![Heroku Log](https://img.shields.io/badge/heroku-log-blue.svg)](https://dashboard.heroku.com/apps/watchlaterapp)

Watchlater App using a REST Api.

* `[GET] /hello/{name}` return `Hello <name>` message

## How to install

Start with the next chapiter if it is your first intall and if node.js is not installed.

```
> git clone https://github.com/Starli0n/Watchlater watchlater
> cd watchlater
> composer install
> npm install
> bower install
> gulp :publish
> gulp :deploy
> gulp :test
> gulp :doc
```

For PHP Tools for Visual Studio

`Watchlater.phpproj > Properties > Application > Start action`

* `Specific page` `public/index.html`
* `Specific page` `publish/index.html`
* `Specific page` `watchlater/public/index.html`


## First Install of the toolchain

* Install Node.js
````
> npm install -g npm
> npm install -g bower
> npm install -g gulp-cli
````

On Windows `npm` should be found here:
`C:\Users\Starli0n\AppData\Roaming\npm`


## Settings Proxy

**For npm**

````
> npm config set analytics false
> npm config set proxy http://user:pass@proxy.com:port
> npm config set https-proxy http://user:pass@proxy.com:port
````

In your `Home` directory, on Windows it is `C:\Users\Starli0n`, you should have


`.npmrc`
````
analytics=false
proxy=http://user:pass@proxy.com:port
https-proxy=http://user:pass@proxy.com:port

````

**For bower**

Set the file manually at the same location

`.bowerrc`
````
{
    "analytics": false,
    "proxy": "http://user:pass@proxy.com:port",
    "https-proxy": "http://user:pass@proxy.com:port"
}
````


---

<a href="https://jquery.com"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9e/JQuery_logo.svg/220px-JQuery_logo.svg.png" width="100"></a>
<a href="https://nodejs.org"><img src="https://nodejs.org/static/images/logos/nodejs-new-pantone-black.png" width="100"></a>
<a href="https://www.npmjs.com"><img src="https://raw.githubusercontent.com/npm/logos/master/%22npm%22%20lockup/npm-logo-simplifed-with-white-space.png" width="100"></a>
<a href="https://bower.io"><img src="https://bower.io/img/bower-logo.svg" width="100"></a>
<a href="http://gulpjs.com"><img src="https://pbs.twimg.com/profile_images/417078109075034112/iruTC031_400x400.png" width="100"></a>

---

<a href="http://www.slimframework.com"><img src="https://d21ii91i3y6o6h.cloudfront.net/gallery_images/from_proof/11889/small/1461439198/slim-framework-sticker.png" width="100"></a>
<a href="https://getcomposer.org"><img src="https://getcomposer.org/img/logo-composer-transparent2.png" width="100"></a>

---

Powered by [Slim Framework 3 Skeleton Application](https://github.com/slimphp/Slim-Skeleton)
