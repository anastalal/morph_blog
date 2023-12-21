<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use App\Models\User;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use App\Filament\Resources\PostResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
// HasShieldPermissions
class PostResource extends Resource  
{
    public static function getEloquentQuery(): Builder
    {
        // $user = auth()->user();
        $id = auth()->user()->id;
        $user = User::find($id);
        $query = parent::getEloquentQuery();
        if ($user->can('view_any_post') && $user->roles->contains('name','panel_user')) {
            return $query->where('user_id',$user->id);
        }

        return $query;
    }
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $pluralModelLabel = 'المقالات';
    public static function getModelLabel(): string
    {
        return 'مقال';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TitleWithSlugInput::make(
                    urlPath: '/post/',
                    urlVisitLinkRoute: fn(?Model $record) => $record?->slog 
                    ? route('post.show', ['slug' => $record->slog])
                    : null,
                    fieldTitle: 'title', 
                    fieldSlug: 'slog', 
                    urlVisitLinkLabel: 'مشاهدة',
                    titleLabel: 'عنوان المقال',
                    titlePlaceholder: 'ادخل عنوان المقال',
                    slugLabel: 'رابط المقال:',
                )->label('رابط المقال'),
                Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')->label('اختر قسم')
                ->searchable()
                ->required()
                ->preload() 
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('الاسم')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('الاسم الفريد')
                            ->required()
                            ->rules(['alpha_dash'])
                            ->unique(ignoreRecord: true)
                            // ->unique(Category::class,'slug')
                            ,
                            Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                           
                    ]),
                Forms\Components\FileUpload::make('banner')
                ->image()
                ->directory('uploads')
                ->visibility('public')
                ->required()
                   ->label('صورة المقال'),
                TinyEditor::make('content')->label('محتوى المقال')
                    ->required()
                    ->columnSpanFull(),
                
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content')->limit(20)->markdown()->label('المقال'),
                Tables\Columns\TextColumn::make('category.name')->label('القسم')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')->label('عنوان المقال')
                    ->searchable(),
               
                Tables\Columns\ImageColumn::make('banner')->label('خلفية')
                ->visibility('public')
                    ,
                Tables\Columns\TextColumn::make('views')->label('المشاهدات')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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

    public static function getRelations(): array
    {
        return [
            //
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
}
