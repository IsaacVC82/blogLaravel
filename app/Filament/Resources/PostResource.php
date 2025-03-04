<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre del autor')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug (único)')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('content')
                    ->label('Contenido')
                    ->required(),

                // Campo para la imagen
                FileUpload::make('image')
                    ->label('Imagen')
                    ->image() // Esto asegura que el campo se maneje como una imagen
                    ->disk('public') // Asegura que se guarde en el disco 'public'
                    ->directory('images') // La carpeta donde se almacenarán las imágenes
                    ->required()
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título'),
                Tables\Columns\TextColumn::make('content')
                    ->label('Contenido')
                    ->limit(50),

                // Columna para mostrar la imagen
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->disk('public')  // Especifica el disco de almacenamiento, aquí se usa 'public' que corresponde a 'storage/app/public'
                    ->size(70) // Ajusta el tamaño de la imagen si es necesario
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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

