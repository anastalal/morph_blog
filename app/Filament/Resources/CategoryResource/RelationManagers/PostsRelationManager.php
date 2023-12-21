<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('content')->limit(20)->markdown()->label('المقال'),
                Tables\Columns\TextColumn::make('title')->label('عنوان المقال')
                    ->searchable(),
              
                Tables\Columns\ImageColumn::make('banner')->label('خلفية')
                ->visibility('public')
                    ,
                Tables\Columns\TextColumn::make('views')->label('المشاهدات')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('view')
                ->label('مشاهدة')
                ->icon('heroicon-o-eye')
                ->url(fn (Post $record): string => route('post.show',['slug' => $record->slog]))
                ->openUrlInNewTab(true),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
