---
extends: _layouts.post
section: content
title: Arctic Nord Theme for Filament PHP
date: 2025-02-09
description: Introducing the Arctic Nord Theme for Filament PHP.
cover_image: /assets/img/post-cover-filament-nord-theme.jpg
categories: [filament, laravel]
featured: true
excerpt: Add a bluetiful clean and elegant touch of arctic colors to your Filament PHP apps.
comments: true
---

The Filament PHP ecosystem just got a fresh new look! I'm excited to introduce the [Nord Theme for Filament PHP](https://github.com/andreia/filament-nord-theme). This beautifully designed theme features both light and dark modes and is inspired by the popular [Nord color palette](https://www.nordtheme.com/docs/colors-and-palettes).
If you're looking for a clean, stylish, and visually soothing user interface for your Filament applications, this theme is your perfect match! ❄️ ⛄


## Why the Nord Theme?

[Nord](https://www.nordtheme.com/) is a beloved color palette derived from the icy blues, snowy tones of the Arctic and the mesmerizing hues of the Aurora Borealis. Designed for optimal readability and minimal eye strain, it blends Nordic aesthetics with cool, calming, and balanced dimmed pastel tones making it a ideal choice for a modern and elegant UI.

[![Nord theme palettes](/assets/img/nord-theme/nord_palettes.jpg)](https://www.nordtheme.com/docs/colors-and-palettes)

This is the Filament Nord theme custom gray palette used to match the Nord's Polar Night and Snow Storm colors:

[![Custom Filament gray palette](/assets/img/nord-theme/custom-gray-palette.png)](/assets/img/nord-theme/custom-gray-palette.png)

## Features of the Filament Nord Theme

🌙 Light and Dark Modes – Seamlessly switch between light and dark themes.

🎨 Consistent Nord Palette – Every UI element is carefully styled to match the Nord theme.

⚡ Easy Installation – Quickly set up the theme in your Filament project.


## Installation

Getting started with the Filament Nord Theme is simple. You can install it via Composer:

```bash
composer require andreia/filament-nord-theme
```

To install the theme's required JS libraries (the forms, typography TailwindCSS plugins, and also postcss and autoprefixer) and create the postcss.config.js file if it not exists yet, run:

```bash
php artisan filament-nord-theme:install
```

Add a new item to the input array of your `vite.config.js` file:

```php
'vendor/andreia/filament-nord-theme/resources/css/theme.css'
```

Compile the assets with:

```bash
npm run build
```

Register the plugin on your panel (e.g. `/app/Providers/Filament/AdminPanelProvider.php`):

```php
use Andreia\FilamentNordTheme\FilamentNordThemePlugin;

$panel
  ->plugin(FilamentNordThemePlugin::make())
```

You are all set!

## Theme Preview

Here's a preview of what the [Filament demo project](https://github.com/filamentphp/demo) looks like with the Nord Theme applied:

[![Filament Nord Theme preview](/assets/img/nord-theme/filament_nord_theme.jpg)](https://www.youtube.com/watch?v=8rdonWoUb5s "Click to watch the theme preview")

## Screenshots

Every detail is carefully thought out to create a eye-comfortable, and clean feeling.

![Rounded corners dashboard widgets dark](/assets/img/nord-theme/rounded-dark.png)

![Rounded corners dashboard widgets light](/assets/img/nord-theme/rounded-light.png)

![Rounded corners buttons light](/assets/img/nord-theme/rounded-light1.png)

![Rounded corners button and widgets light](/assets/img/nord-theme/rounded-light2.png)

### Dashboard

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Dashboard Light</th>
      <th scope="col" width="1000px">Dashboard Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/dashboard_light.png" width="100%" alt="Dashboard Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/dashboard_dark.png" width="100%" alt="Dashboard Dark">
      </td>
    </tr>
  </tbody>
</table>

### User Menu

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">User Menu Light</th>
      <th scope="col" width="1000px">User Menu Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/user_menu_light.png" width="100%" alt="User Menu Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/user_menu_dark.png" width="100%" alt="User Menu Dark">
      </td>
    </tr>
  </tbody>
</table>

### Product

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Create Product Light</th>
      <th scope="col" width="1000px">Create Product Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/product_create_light.png" width="100%" alt="Create Product Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/product_create_dark.png" width="100%" alt="Create Product Dark">
      </td>
    </tr>
  </tbody>
</table>

### Order

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Order List Light</th>
      <th scope="col" width="1000px">Order List Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/orders_light.png" width="100%" alt="Order List Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/orders_dark.png" width="100%" alt="Order List Dark">
      </td>
    </tr>
  </tbody>
</table>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="1000px">Create Order Light</th>
      <th scope="col" width="1000px">Create Order Dark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/order_create_light.png" width="100%" alt="Create Order Light">
      </td>
      <td>
        <img src="https://raw.githubusercontent.com/andreia/filament-nord-theme/main/docs/order_create_dark.png" width="100%" alt="Create Order Dark">
      </td>
    </tr>
  </tbody>
</table>

## Conclusion

The Nord Theme for Filament PHP brings a sleek, modern look to your Filament app with a focus on a clean design and aesthetics. It provides both a dark a light mode and it can be easily applied to your existing app.

Give it a try and let me know your thoughts! You can find the project on [GitHub: Filament Nord Theme](https://github.com/andreia/filament-nord-theme).

Happy theming! 💛 ✨
