---
extends: _layouts.post
section: content
title: Stop Wrestling with Business Hours. There's a Better Way.
date: 2026-02-15
description: Business hours seem simple until you need split shifts, timezone support, and holiday exceptions. Discover how Filament Business Hours streamlines everything from basic opening hours to complex scheduling scenarios with a beautiful interface and clean powerful query methods you'll love.
cover_image: /assets/img/post-cover-filament-business-hours.jpg
categories: [filament, laravel]
featured: true
excerpt: Business hours seem simple until you need split shifts, timezone support, and holiday exceptions. Discover how Filament Business Hours streamlines everything from basic opening hours to complex scheduling scenarios with a beautiful interface and clean powerful query methods you'll love.
comments: true
---

If you've ever built a store locator, a restaurant site, or a booking system, you know that "Business Hours" are a secret nightmare.

At first glance, it seems simple. But as the project grows, so do the requirements. Split shifts (opening for lunch, closing, then reopening for dinner). Timezones. That one random Tuesday the shop is closed for a local holiday. You soon find yourself needing to handle special holiday hours, recurring exceptions, and the inevitable "but what about daylight saving time?"

Then the requirements start rolling in: "Oh, and we close early on Tuesdays.", "We need to block out Christmas week.", "What about our summer hours?", "Can we handle different time zones?".

What started as a simple text field turns into a tangled mess of conditionals, edge cases, and timezone headaches. You've built this same wheel a dozen times, and each time it's slightly different, slightly broken.

## Here's What You Actually Need

Most business start with a simple requirement: "Display when we're open." However, as a project scales, you quickly run into technical bottlenecks:

**Structural Constraints:** Hardcoding hours into a model makes it nearly impossible to query "Open Now" status across different timezones.

**Complexity of Exceptions:** Handling a one-off holiday closure shouldn't require a developer to manually toggle a boolean in the database.

**User Experience:** Tables full of text-based hours are difficult for admins to scan and manage.

When building applications for physical locations or service availability, like restaurants, medical clinics, hotels, booking systems, managing operating hours is a core requirement. Generic text fields or basic time pickers aren't enough when you need to answer: "Is this place open right now?"

Business hours aren't simple. They're deceptively complex.

You need multiple time slots per day (because that lunch break closure matters). You need exceptions for holidays. You need recurring patterns for annual events. You need timezone awareness. And you need it all wrapped in a UI that people will actually love using.

That's where **Filament Business Hours** comes in: a plugin built to streamline everything from simple opening hours to complex scheduling scenarios.

## It Just Works the Way You'd Expect

Picture this: Your client opens the form. They see a clean interface with toggles for each day of the week. Click. Monday is open. Add a time slot: 9:00 AM to 5:00 PM. Need a lunch break? Add another slot: 9:00 AM to 12:00 PM, then 1:00 PM to 5:00 PM.

Done.

![Screenshot: Clean business hours interface with day toggles and time slots](/assets/img/business-hours/business_hours_form_field1.png)

Special hours for Black Friday? Click "Set up exceptions," pick the date, adjust the hours. Annual Christmas closure? Set it to recur every year. The whole thing takes seconds.

**Want to see it in action?**  [![Check out the demo video](/assets/img/business-hours/youtube_cover.jpg)](https://www.youtube.com/watch?v=5gXI0v3BwAU "Check out the demo video")

## Behind the Scenes

While you could build a series of repeaters and time pickers yourself, this plugin handles the heavy lifting of data structure and validation. It doesn't just store "9 to 5", it stores a flexible, queryable schedule that knows exactly when a business is open or closed at any given second.

Under the hood, Filament Business Hours leverages the superpowers of [Spatie's Opening Hours](https://github.com/spatie/opening-hours) package. That means you get a battle-tested foundation for all the hard stuff: timezone calculations, exception handling, and elegant queries.

Want to check if a business is open right now? One line:

```php
$business->isOpen();
```

Need to know when they'll open next? Just call:

```php
$nextOpen = $business->nextOpen();
```

The complexity is hidden. The code is clean and readable.

## Built for Real Projects

Thoughtfully crafted to include everything you'd expect with a pleasant and intuitive UI:

**The form field** gives your users an intuitive interface with visual feedback. Open days are highlighted. Closed days are grayed out. Time zones are searchable. It just works beautifully.

```php
use Andreia\FilamentBusinessHours\Forms\Components\BusinessHoursField;

BusinessHoursField::make('businessHours')
    ->allowExceptions()
```

![Screenshot: Business Hours form field with exception management](/assets/img/business-hours/business_hours_form_field_exceptions.png)

**The table column** shows business hours at a glance with interactive circles and tooltips. Admin users can see the full week's schedule without clicking through to the detail view.

```php
use Andreia\FilamentBusinessHours\Tables\Columns\BusinessHoursColumn;

BusinessHoursColumn::make('businessHours')
```

![Screenshot: Table view showing business hours circles with time slot tooltip](/assets/img/business-hours/business_hours_table_column1.png)
![Screenshot: Table view showing business hours circles with closed tooltip](/assets/img/business-hours/business_hours_table_column2.png)

**The infolist entry** displays formatted hours with timezone information and exceptions, perfect for detailed views.

```php
use Andreia\FilamentBusinessHours\Infolists\Components\BusinessHoursEntry;

BusinessHoursEntry::make('businessHours')
```

![Screenshot: Infolist entry showing formatted business hours](/assets/img/business-hours/business_hours_infolist.png)

**Exception management** handles the messy reality of business operations: holidays, seasonal hours, one-off closures, and recurring annual events.

![Screenshot: Exception modal showing date picker and recurring options](/assets/img/business-hours/business_hours_form_field_exceptions_modal.png)

Multiple time slots per day? Check. Timezone support with a searchable dropdown? Check. Date ranges for exceptions? Check. Recurring annual events? Check. Built-in caching for performance? Check.

It even includes a `HasBusinessHours` trait that adds the relationship and all the helper methods to any model. Attach it to a User, a Store, a Restaurant, a Clinic, or whatever needs business hours.

## Get Started in Minutes

Installing is straightforward. Add the package through Composer, run the migrations, and you're ready to go. The [documentation](https://github.com/andreia/filament-business-hours-docs) is clear and complete. The licensing is fair and flexible.

Single project? There's a license for that. Building a SaaS with unlimited domains? There's a license for that too.

The best part? You get a full year of updates and support. After that year, if you choose not to renew, you keep using the version you have. No forced upgrades. No recurring payments unless you want the latest features.

**Let's make business hours effortless:**

[Get Filament Business Hours →](https://checkout.anystack.sh/filament-business-hours)

Watch the [feature video](https://www.youtube.com/watch?v=5gXI0v3BwAU) to see it in action, or check out the [full documentation](https://github.com/andreia/filament-business-hours-docs) on GitHub.

Questions? Reach out at andreiabohner@gmail.com. I'd love to hear from you.

## What's Your Experience?

Have you built business hours functionality before? What challenges did you run into? 

Or maybe you've already tried Filament Business Hours and have feedback to share? I'd genuinely love to hear about your experiences, whether it's war stories from custom implementations or insights from using this plugin in production.

Drop a comment below or ping me at andreiabohner@gmail.com. Your real-world scenarios help make this plugin better for everyone.

---

*Filament Business Hours requires PHP 8.2+ and Filament 3+. Built on Spatie's Opening Hours, Filament Timezone Field, and Filament Table Repeater (for Filament v3, for v4 and v5 it uses the native table repeater).*
