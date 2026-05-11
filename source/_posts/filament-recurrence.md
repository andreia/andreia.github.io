---
extends: _layouts.post
section: content
title: Complete Recurrence With a Beautiful UI in Your Filament App in Less Than 10 Minutes
date: 2026-05-10
description: A Filament plugin that adds complete recurring patterns support to your app — beautiful UI components, RFC 5545-compliant rules, and Eloquent integration out of the box.
cover_image: /assets/img/recurrence/post-cover-filament-recurrence1.jpg
categories: [filament, laravel]
featured: true
excerpt: Add full-featured recurring patterns support to your Filament PHP apps.
comments: true
---

How many columns does it take to store a recurrence rule? If you're designing from scratch, probably more than you'd like. Frequency, interval, weekdays, month position, end date, count, timezone, it adds up fast. **Filament Recurrence** collapses all of it into one JSON field and wraps the whole thing in polished Filament components.

It builds on the battle-tested [simshaun/recurr](https://github.com/simshaun/recurr) library — a full RFC 5545 iCalendar engine — and packages it as native Filament components: a reactive form field, a table column, and an infolist entry. This lets you define events that repeat on specific patterns, like "every third Monday of the month" or "every two weeks on Friday".

**Want to see it in action?** [![Check out the demo video](https://andreia.github.io/assets/img/recurrence/demo_video.jpg)](https://www.youtube.com/watch?v=NOg2IYgJ1W4 "Check out the demo video")

## What You Get Out of the Box

**A reactive form field** with a live preview that updates as users configure their schedule — frequency, interval, weekdays, end conditions, timezone.

**A table column** that shows the recurrence summary and upcoming occurrences right in your resource listings.

**An infolist entry** that renders full recurrence details — including a next-occurrence list.

**A `RecurrenceData` DTO** — a PHP 8.3+ typed object with RRULE serialisation and human-readable output baked in.

**An Eloquent cast and trait** for automatic JSON↔DTO hydration and query scopes wired directly to your models.

**Per-record timezones** — timezone stored with each record, or globally using config.

## Installation in Three Steps

The package targets PHP 8.3+, Laravel 12+, and Filament 4 or 5.

    composer require andreia/filament-recurrence

Next, create a migration to add the recurrence column. You can choose any name for the column. Everything is stored as a JSON column on your own table, so there's nothing else to set up:  

```php
Schema::table('events', function (Blueprint $table) {
    $table->json('recurrence')->nullable()->after('title');
});
```

Then add one line to your Filament theme CSS:

```css
/* resources/css/filament/admin/theme.css */
@source '../../../../vendor/andreia/filament-recurrence';
```

Optionally publish the config to adjust defaults:

    php artisan vendor:publish --tag="filament-recurrence-config"

## Wiring Up Your Model

Two things go on the Eloquent model: a cast so the JSON column is automatically hydrated into a `RecurrenceData` object, and an optional trait that adds helper methods.

```php
use Andreia\FilamentRecurrence\Casts\RecurrenceCast;
use Andreia\FilamentRecurrence\Concerns\HasRecurrence;

class Event extends Model
{
    use HasRecurrence;

    protected $casts = [
        'recurrence' => RecurrenceCast::class,
    ];
}
```

The `HasRecurrence` trait unlocks a useful set of methods:

```php
// Human-readable description of the rule
$event->getRecurrenceData()->toHumanReadable();
// → "Every 2 weeks on Monday, Wednesday, Friday, 10 times"

// Next single occurrence
$event->getNextOccurrence(); // Carbon instance

// Batch of upcoming occurrences
$event->getUpcomingOccurrences(10);

// Boolean check
$event->occursOn(Carbon::today());

// Query scopes
Event::occursOn(Carbon::today())->get();
Event::occursBetween($start, $end)->get();
```

## The Three Components

Each Filament surface — forms, tables, infolists — has a matching component with sensible defaults and a fluent API for customisation.

### RecurrenceField — the reactive heart of the plugin

```php
use Andreia\FilamentRecurrence\Forms\Components\RecurrenceField;

RecurrenceField::make('recurrence')
    ->showStartDate()          // date/time picker for the first occurrence
    ->showEndOptions()         // never / until / count
    ->useDateTime()            // DateTimePicker instead of DatePicker
    ->showPreview(true)        // live preview: human label + upcoming dates
    ->previewOccurrencesLimit(5)
    ->showAdvancedOptions()    // BYDAY, BYMONTHDAY, BYSETPOS etc.
    ->showTimezone(true);      // per-record timezone dropdown
```

The form field is fully reactive — selecting "Monthly" surfaces month-day options; enabling "Repeat on" reveals the weekday grid. The live preview at the right updates as users change values, showing the human-readable rule and the next N occurrence dates.

![Form Field Year](/assets/img/recurrence/form-field.png)

![Form Field Week](/assets/img/recurrence/form-field1.png)

![Form Field Month](/assets/img/recurrence/form-field2.png)

![Form Field Preview](/assets/img/recurrence/form-field3.png)

### RecurrenceColumn — compact recurrence display in listings

```php
use Andreia\FilamentRecurrence\Tables\Columns\RecurrenceColumn;

RecurrenceColumn::make('recurrence')
    ->showNextOccurrences(limit: 3)  // show next 3 upcoming dates
    ->showRule();                     // append the raw RRULE string
```

![Table Column](/assets/img/recurrence/table-column.png)

### RecurrenceEntry — full detail on view pages

```php
use Andreia\FilamentRecurrence\Infolists\Components\RecurrenceEntry;

RecurrenceEntry::make('recurrence')
    ->showAllDetails()              // frequency, interval, start/end, days…
    ->showNextOccurrences(limit: 10)
    ->showRule();                   // RRULE for debugging or iCal export
```

![Infolist Entry](/assets/img/recurrence/infolist.png)

## Real-World Recurrence Patterns

The `RecurrenceData` DTO mirrors RRULE fields directly, which means you can express complex schedules without reaching for raw strings. A few patterns that come up constantly in production:

**Every weekday — the classic standup:**

```php
Event::create([
    'title'      => 'Daily Standup',
    'recurrence' => [
        'frequency'  => 'DAILY',
        'interval'   => 1,
        'start_date' => Carbon::now()->setTime(9, 0),
        'by_day'     => ['MO', 'TU', 'WE', 'TH', 'FR'],
        'count'      => 60,
    ],
]);
```

**Last Friday of every month — the all-hands:**

```php
[
    'frequency'  => 'MONTHLY',
    'interval'   => 1,
    'by_day'     => ['FR'],
    'by_set_pos' => -1, // negative = from the end
]
```

**Quarter-end reminders:**

```php
[
    'frequency'    => 'YEARLY',
    'interval'     => 1,
    'by_month'     => [3, 6, 9, 12], // March, June, Sep, Dec
    'by_month_day' => [31],
]
```

<div style="background:#fef9f0;border-left:4px solid #f0a030;border-radius:0 6px 6px 0;padding:1rem 1.25rem;margin:1.5rem 0;font-size:0.95rem;">
<strong>Tip:</strong> The DTO can also be constructed from an RRULE string if you're migrating existing data: <code>RecurrenceData::fromRule('FREQ=WEEKLY;BYDAY=MO,FR;INTERVAL=2')</code>. Going the other way — <code>$data->toRule()</code> — gives you an iCalendar-compatible string ready for export or third-party calendar sync.
</div>

## Calendar Integration and iCal Export

Because the underlying engine is fully RFC 5545-compliant, piping data to a calendar integration is straightforward. A minimal iCal export looks like this:

```php
public function exportToICalendar(Event $event): string
{
    $data = $event->getRecurrenceData();

    return implode("\n", [
        'BEGIN:VCALENDAR',
        'VERSION:2.0',
        'BEGIN:VEVENT',
        'SUMMARY:' . $event->title,
        'DTSTART:' . $data->startDate->format('Ymd\THis\Z'),
        'RRULE:'   . $data->toRule(),
        'END:VEVENT',
        'END:VCALENDAR',
    ]);
}
```

The same `getOccurrences()` method on the DTO makes it trivial to populate a FullCalendar or similar widget. Just iterate over occurrences within the visible range and emit the event objects your front-end expects.

## The Bottom Line

If your Filament app handles anything that repeats — meetings, tasks, billing cycles, reminders, maintenance windows — you shouldn't be building the recurrence layer yourself. The iCalendar spec is 140 pages long. `simshaun/recurr` already implements it. This plugin puts a polished Filament face on it.

Three components, one JSON column, one Composer command.

    composer require andreia/filament-recurrence

The source, readme, and a comprehensive examples are all on [GitHub](https://github.com/andreia/filament-recurrence). If you run into edge cases or want to contribute, PRs are welcome :)

---

*filament-recurrence is MIT-licensed and built on [simshaun/recurr](https://github.com/simshaun/recurr) and [Filament PHP](https://filamentphp.com). Timezone support via [TappNetwork/filament-timezone-field](https://github.com/TappNetwork/filament-timezone-field).*
