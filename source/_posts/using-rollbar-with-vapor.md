---
extends: _layouts.post
section: content
title: Using Rollbar with Vapor
date: 2021-01-25
description: Configure Rollbar with Vapor
cover_image: /assets/img/post-cover-dandelion.jpg
categories: [configuration, laravel]
featured: true
excerpt: How to get Rollbar working with Vapor
comments: true
---

As I couldn't find on docs, maybe this will help someone to save time :)

You'll only have to change a few configurations to get [Rollbar](https://rollbar.com) working with [Vapor](https://vapor.laravel.com/).

On your `.env.production` add this env var:

```php
LOG_CHANNEL=vapor
```

And in your Laravel `logging` config:

```php
// config/logging.php

return [
       'channels' => [
            'vapor' => [
                'driver'            => 'stack',
                'channels'          => ['rollbar', 'stderr'],
                'ignore_exceptions' => false,
            ],

            'rollbar' => [
                'driver'        => 'monolog',
                'handler'       => \Rollbar\Laravel\MonologHandler::class,
                'access_token'  => env('ROLLBAR_TOKEN'),
                'level'         => 'debug',
                'person_fn'     => 'Auth::user',
                'capture_email' => true,
            ],
        ],
];
```

> Found this similar solution on [Flare config](https://flareapp.io/docs/ignition-for-laravel/installation#using-flare-on-vapor) :)
