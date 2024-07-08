---
extends: _layouts.post
section: content
title: "Filament Tip: Reusing the Resource's Form, Table, and Infolist in Relation Managers"
date: 2024-07-07
description: Reusing Filament resource's code in relation managers
categories: [filament]
featured: false
excerpt: Streamlining your Filament code by reusing the resource's form, table, and infolist in your relation managers
comments: true
---

If your relation manager matches the form, table, and infolist of the resource, you can reuse the code you wrote for your resource in your relation manager. This will save you time and effort while keeping your application consistent and error-free.

Let's check out an example of how to implement it.

Here's a simplified version of a Filament address resource that we are going to reuse the code:

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationGroup = 'User';

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('street'),
                Infolists\Components\TextEntry::make('zip'),
                Infolists\Components\TextEntry::make('city'),
                Infolists\Components\TextEntry::make('state'),
                Infolists\Components\TextEntry::make('country.name'),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('street'),
                Forms\Components\TextInput::make('zip'),
                Forms\Components\TextInput::make('city'),
                Forms\Components\TextInput::make('state'),
                Forms\Components\Select::make('country')
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('street'),
                Tables\Columns\TextColumn::make('zip'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('country.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
	            Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
```

Once the resource has been created and is all set, we can now tell Filament to reuse our form, table, and infolist code in our `AddressesRelationManager`.

This is done via calling the respective form (`AddressResource::form`), table (`AddressResource::table`), and infolist (`AddressResource::infolist`) methods that were defined on `AddressResource`:

```php
<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\AddressResource;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    public function form(Form $form): Form
    {
        return AddressResource::form($form);
    }

    public function table(Table $table): Table
    {
        return AddressResource::table($table);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return AddressResource::infolist($infolist);
    }
}
```

We did it! That's all we need.

Depending on your use case, you can decide to reuse just one of the methods (e.g. just the form) or all of them like in the code above.

## Extra tip! Adding an action to the relation manager without overwriting the resource's original actions

Let's say you want to add a new table action just to the relation manager while keeping the resource's original table actions. You can achieve this by calling `$table->getActions()` to retrieve the resource's actions, and adding the extra actions (e.g. `DetachAction`) in your `actions` method (we can also apply the same for bulk actions):

```php
class AddressesRelationManager extends RelationManager
{
    // ...

    public function table(Table $table): Table
    {
        return AddressResource::table($table)
            ->headerActions([
                Tables\Actions\AttachAction::make(),
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ...$table->getActions(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                ...$table->getBulkActions(),
                Tables\Actions\DetachBulkAction::make(),
            ]);
     }
}
```

You can check out more about Filament's relation manager and its capabilities by [visiting the Filament PHP documentation](https://filamentphp.com/docs/3.x/panels/resources/relation-managers#creating-a-relation-manager). 

Thanks for reading and see you next time! :)
