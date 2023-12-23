<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Mechanisms\HandleComponents\ComponentContext;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('comment_id')
            ->columns([
                TextColumn::make('name')
                ->label('Author')
                ->default(fn(Model $record) => User::where('user_id', $record->user_id)->first()->name)
                ->searchable(),
            TextColumn::make('content')
                ->searchable(),
            TextColumn::make('created_at')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->mutateFormDataUsing(
                    function (array $data): array
                    {
                        $data['user_id'] = auth()->id();

                        return $data;
                    }
                ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

}
