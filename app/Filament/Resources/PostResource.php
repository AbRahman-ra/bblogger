<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CommentsRelationManager;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn(Model|null $record) => $record !== null && $record->user_id !== auth()->id() && $record->user_id !== null)
                    ->autofocus(),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->disabled(fn(Model|null $record) => $record !== null && $record->user_id !== auth()->id() && $record->user_id !== null),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->disabled(fn(Model|null $record) => $record !== null && $record->user_id !== auth()->id() && $record->user_id !== null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Author')
                    ->default(
                        fn(Model $record) => User::where('user_id', $record->user_id)->first()->name
                    )
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('content')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->label(
                    fn(Model $record) => $record->user_id !== auth()->id() ? 'Comment' : 'Edit'
                ),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }



    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->where('user_id', auth()->id());
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return $record->user_id === auth()->id();
    // }
    public static function canDelete(Model $record): bool
    {
        return $record->user_id === auth()->id() || auth()->user()->role === 'admin';
    }

    // public static function canEdit(Model $record): bool
    // {
    //     return $record->user_id !== auth()->id();
    // }
    protected static function editMyselfOnly (Model|null $record) {
        return $record !== null && $record->user_id !== auth()->id() && $record->user_id !== null;
    }
}

