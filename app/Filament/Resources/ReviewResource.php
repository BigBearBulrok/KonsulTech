<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction; // Import the DeleteAction class for mass delete

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->label('Image')
                    ->nullable()
                    ->directory('reviews/photos') // Store the file in the 'reviews/photos' directory
                    ->disk('public') // Store it in the public disk
                    ->image(), // Ensure the uploaded file is an image
                Textarea::make('text')
                    ->label('Review Text')
                    ->required(),
                Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '1 Star',
                        2 => '2 Stars',
                        3 => '3 Stars',
                        4 => '4 Stars',
                        5 => '5 Stars',
                    ])
                    ->required(),
            ]);
    }    

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('name')->label('Name')->sortable(),
            ImageColumn::make('image')
                ->label('Image')
                ->sortable()
                ->disk('public') // Ensure you're using the public disk
                ->url(fn($record) => asset('storage/' . $record->image)), // Ensure the image URL is correctly generated
            TextColumn::make('text')->label('Review Text')->limit(50),
            TextColumn::make('rating')->label('Rating')->sortable(),
            TextColumn::make('created_at')->label('Created At')->dateTime(),
        ])
        ->filters([
            //
        ])
        ->actions([
            // You can add individual actions like Edit or View here, if needed
        ])
        ->bulkActions([ // Enable bulk actions
            Tables\Actions\BulkAction::make('delete')
                ->label('Delete Selected')
                ->action(function ($records) {  // No need for an array type hint here, we'll use the collection
                    $records->each(function ($record) {
                        $record->delete(); // Delete each selected record
                    });
                })
                ->icon('heroicon-o-trash')
                ->color('danger'), // The color of the delete button will be red (danger)
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}