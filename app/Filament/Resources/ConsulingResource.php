<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsulingResource\Pages;
use App\Filament\Resources\ConsulingResource\RelationManagers;
use App\Models\Consuling;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConsulingResource extends Resource
{
    protected static ?string $model = Consuling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher', 'nama')
                    ->required()
                    ->label('Teacher'),
                Forms\Components\Select::make('student_id')
                    ->relationship('student', 'nama')
                    ->required()
                    ->label('Student'),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\DateTimePicker::make('schedule')
                    ->label('Schedule')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.nama')->label('Teacher')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('student.nama')->label('Student')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Description')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('schedule')->label('Schedule')->dateTime()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->label('Status'),
                Tables\Filters\Filter::make('created_at')
                    ->label('Created At')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('From'),
                        Forms\Components\DatePicker::make('created_until')->label('Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListConsulings::route('/'),
            'create' => Pages\CreateConsuling::route('/create'),
            'edit' => Pages\EditConsuling::route('/{record}/edit'),
        ];
    }
}
