---
extends: _layouts.post
section: content
title: "7 Ways to Speed Up Filament Forms and Schemas"
date: 2026-09-12
description: "Practical techniques for improving the performance of Filament forms and schemas — from debouncing to deferred schema loading"
cover_image: /assets/img/post-cover-filament-forms-schemas-performance.jpg
categories: [filament, laravel, performance]
featured: true
excerpt: "Livewire re-renders are what make Filament forms feel dynamic - and what can make them feel sluggish. Here are 7 built-in techniques, from debounced fields to deferred schema loading, for keeping large forms fast."
comments: true
---

Filament forms are built on Livewire, which means every reactive interaction - a `live()` field changing, a repeater item expanding - can trigger a network round-trip and a full re-render of the component. That's great for developer experience  (you get reactivity without writing JavaScript) but it comes at a cost to the user: on large, deeply nested forms it can start to feel sluggish.

The good news: Filament ships with several tools to control *when* and *how much* gets rendered. 

Here are seven of them:

## 1. Defer the loading of expensive parts of a schema

If a `Repeater` or `Builder` renders items with heavy fields (rich editors, file uploads, nested repeaters), all of that gets built and sent to the browser on page load — even for items the user never opens. `deferLoading()` fixes this: pass a `Schema` object to `schema()` instead of a plain array, and each item's content is only rendered when it's expanded and enters the viewport.

**Real-world case:** a `product_variants` repeater on a product edit page, where each variant has an image, a rich description, and pricing fields.

```php
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

Repeater::make('variants')
    ->relationship()
    ->schema(
        Schema::make()
            ->components([
                TextInput::make('sku')->required(),
                TextInput::make('price')->numeric()->prefix('$'),
                FileUpload::make('image')->image(),
                RichEditor::make('description'),
            ])
            ->deferLoading(),
    )
    ->collapsed()
    ->itemLabel(fn (array $state): ?string => $state['sku'] ?? 'New variant')
```

With 20+ variants, this alone can cut initial page weight dramatically, since only the header/label of each collapsed item is rendered up front.

`deferLoading()` isn't limited to Repeater and Builder items, either. It's a general `Schema` method, so you can use it on the child schema of *any* component: a `Section`, a `Tabs` panel, a `Wizard` step, or a custom component. The main difference is that Repeater and Builder item schemas automatically get a unique key from their item's state path, while any other deferred schema needs one assigned explicitly with `key()`:

```php
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

Section::make('Customer details')
    ->key('customerDetails')
    ->schema(
        Schema::make()
            ->components([
                TextInput::make('name'),
                TextInput::make('email')->email(),
            ])
            ->deferLoading(),
    )
```

This is worth reaching for anywhere a schema renders expensive fields up front but the user might not scroll to or open it right away: a rarely-used advanced settings section, a secondary tab, a later step in a wizard.

Check out [the docs](https://filamentphp.com/docs/5.x/schemas/overview#deferring-the-loading-of-a-child-schema) for more details.

## 2. Debounce fields that trigger a request on every keystroke

Any `live()` field sends a request the moment its value changes. For text inputs, that means one request per keystroke — brutal for something like a live SKU or slug check. `live(debounce:)` waits for a pause in typing before firing.

**Real-world case:** checking whether a SKU is already taken as the user types.

```php
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use App\Models\Product;

TextInput::make('sku')
    ->required()
    ->unique(ignoreRecord: true) // enforced server-side on submit
    ->live(debounce: 600) // wait 600ms after the user stops typing
    ->afterStateUpdated(function (?string $state, Set $set) {
        $exists = Product::query()->where('sku', $state)->exists();

        $set('sku_taken', $exists);
    })
    ->helperText(fn (Get $get): ?string => $get('sku_taken') ? 'This SKU is already in use.' : null)
```

The `unique(ignoreRecord: true)` rule is what actually stops a duplicate SKU from being saved, it's checked on submit regardless of anything else. The `live(debounce:)` + `afterStateUpdated()` pair on top of that is a UX nicety: it warns the user *before* they submit, instead of letting them fill out the rest of the form and only finding out at the end. Skip either half and you either lose real validation or lose the early feedback.

## 3. Only react when the user leaves the field

If you don't need instant feedback, `live(onBlur: true)` is cheaper than debouncing. It fires once, when the field loses focus, instead of on a timer.

**Real-world case:** auto-generating a slug from a title, without sending a request on every keystroke as the title is typed.

```php
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Set;

TextInput::make('title')
    ->required()
    ->live(onBlur: true)
    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))

TextInput::make('slug')
    ->required()
    ->unique(ignoreRecord: true)
```

## 4. Re-render only the components that actually depend on the change

By default, any `live()` update re-renders the *entire* schema, even if only one other field's label or value actually depends on it. `partiallyRenderComponentsAfterStateUpdated()` narrows that down to just the fields you name.

**Real-world case:** an order form where picking a product should update only the displayed unit price, not the whole schema.

```php
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use App\Models\Product;

Select::make('product_id')
    ->options(Product::query()->pluck('name', 'id'))
    ->live()
    ->partiallyRenderComponentsAfterStateUpdated(['unit_price'])
    ->afterStateUpdated(function (Set $set, ?string $state) {
        $set('unit_price', Product::find($state)?->price);
    })

TextInput::make('unit_price')
    ->label('Unit price')
    ->numeric()
    ->prefix('$')
    ->disabled()
    ->dehydrated()
```

If only the *current* field's own content depends on its new value (e.g. a live preview below the field itself), use `partiallyRenderAfterStateUpdated()` instead — it re-renders just that one component.

## 5. Skip re-rendering entirely when you don't need it

Sometimes you want `afterStateUpdated()` to fire (to log something, dispatch an event, sync a session value) but you don't need the UI to change at all. `skipRenderAfterStateUpdated()` runs your logic without triggering a re-render.

**Real-world case:** tracking which step of a multi-select filter a user is on, for analytics, without ever needing the form itself to visually update.

```php
use Filament\Forms\Components\CheckboxList;

CheckboxList::make('interests')
    ->options([
        'web' => 'Web development',
        'mobile' => 'Mobile development',
        'design' => 'Design',
    ])
    ->live()
    ->skipRenderAfterStateUpdated()
    ->afterStateUpdated(function (array $state) {
        activity()->log('Updated interests filter: ' . implode(', ', $state));
    })
```

## 6. Go fully client-side for simple show/hide logic and dynamic text

`hidden()` / `visible()` combined with `live()` need a server round-trip to re-evaluate. If the condition is simple (comparing another field's value), you can skip the network entirely with JavaScript-based alternatives.

**Dynamic labels/content with `JsContent`** — methods that render HTML, like `label()` and `belowContent()` (which itself can accept a plain string or a `Text::make()` component), can also accept a `JsContent::make()` object instead. It's evaluated in the browser using `$get()`/`$state`, so the content updates instantly with no request.

**Real-world case:** greeting the user by name in a field label as soon as they type it, with no request.

```php
use Filament\Forms\Components\TextInput;
use Filament\Schemas\JsContent;

TextInput::make('name')

TextInput::make('greetingResponse')
    ->label(JsContent::make(<<<'JS'
        $get('name') ? `Hello, ${$get('name')}!` : 'Hello, there!'
        JS))
```

> ⚠️ The string passed to `JsContent` is evaluated in the browser, so never concatenate raw user input into it as that would open the door to XSS.

**`hiddenJs()` / `visibleJs()`** — same idea, for showing/hiding a field.

**Real-world case:** showing company billing fields only when "this is a business purchase" is checked, instantly, with no request.

```php
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;

Checkbox::make('is_company')

TextInput::make('company_name')
    ->visibleJs(<<<'JS'
        $get('is_company') === true
        JS)
    ->required()

TextInput::make('vat_number')
    ->visibleJs(<<<'JS'
        $get('is_company') === true
        JS)
```

Note that `is_company` doesn't even need `live()` here. `$get()` inside the JS expression reads the client-side state directly.

You can go further with `afterStateUpdatedJs()`, which lets you set *other* fields' values via JS (`$set()`) the moment a field changes. Again, no server round-trip.

**Real-world case:** keeping a "full name" preview in sync as the user types their first and last name.

```php
use Filament\Forms\Components\TextInput;

TextInput::make('first_name')
    ->afterStateUpdatedJs(<<<'JS'
        $set('full_name_preview', $state + ' ' + $get('last_name'))
        JS)

TextInput::make('last_name')
    ->afterStateUpdatedJs(<<<'JS'
        $set('full_name_preview', $get('first_name') + ' ' + $state)
        JS)

TextInput::make('full_name_preview')
    ->label('Preview')
    ->disabled()
    ->dehydrated(false)
```

## 7. Lazy-load heavy embedded Livewire components

If you're embedding a full Livewire component inside a form (a map picker, a chart, a third-party widget), `lazy()` defers its initial render until after the rest of the page has loaded.

```php
use Filament\Forms\Components\Livewire;
use App\Livewire\DeliveryZoneMap;

Livewire::make(DeliveryZoneMap::class)
    ->lazy()
```

---

**Takeaway:** most of these techniques boil down to the same question: *does this interaction actually need a full server round-trip and a full re-render?* Reach for `deferLoading()` and `lazy()` for structural, expensive components; reach for debouncing, partial rendering, and JS-only reactivity for everyday field interactions.

Thanks for reading and see you next time!
