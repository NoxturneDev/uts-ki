<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JamPelajaranResource\Pages;
use App\Filament\Admin\Resources\JamPelajaranResource\RelationManagers;
use App\Models\JamPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JamPelajaranResource extends Resource
{
    protected static ?string $model = JamPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('day_value')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jam_ke')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('startTime')
                    ->required(),
                Forms\Components\TextInput::make('finishTime')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('day_value')
                    ->label('Hari')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            1 => 'Senin',
                            2 => 'Selasa',
                            3 => 'Rabu',
                            4 => 'Kamis',
                            5 => 'Jumat',
                            6 => 'Sabtu',
                            7 => 'Minggu',
                            default => 'Tidak diketahui',
                        };
                    }),
                Tables\Columns\TextColumn::make('jam_ke')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('startTime'),
                Tables\Columns\TextColumn::make('finishTime'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJamPelajarans::route('/'),
            'create' => Pages\CreateJamPelajaran::route('/create'),
            'edit' => Pages\EditJamPelajaran::route('/{record}/edit'),
        ];
    }
}
