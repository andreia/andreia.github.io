---
extends: _layouts.post
section: content
title: Quick reference on installing Composer packages from different sources
date: 2021-02-28
description: "A quick reference on how to configure composer.json to install a package from: local, GitHub repository, or Packagist."
categories: [composer]
featured: false
excerpt: "A quick reference on how to configure composer.json to install a package from: local directory, GitHub repository, or Packagist."
comments: true
---

A quick reference on how to configure `composer.json` to install a package from these sources: local directory, GitHub repository, or Packagist.

## Install a Local Package

Require a local package on your `composer.json` by adding on `repositories` key `"type": "path"` and providing the directory of your package in `url`:

```javascript
  "require": {
      ...
      "my/format-converter": "*"
  },

  "repositories": [
      ...
      {
          "type": "path",
          "url": "./packages/format-converter"
      }
  ],
```

## Install a Package Directly from GitHub Repository (or other VCS)

```javascript
  "require": {
      ...
      "my/package-name": "dev-main"
  },

  "repositories": [
    ...
    {
        "type": "vcs",
        "url": "https://github.com/my/package-name"
    }
  ],
```

## Install a Package from Packagist

[Packagist](https://packagist.org) is the default Composer package repository.

Install a package from Packagist using `composer require <package-name>` (it will update `composer.json`) or by adding it directly in the `require` key on `composer.json` and then running `composer update <package-name>`.

### Command Line

```bash
$ composer require aws/aws-sdk-php
```

### composer.json

```javascript
  "require": {
      ...
      "aws/aws-sdk-php": "^3.173"
  },
```
