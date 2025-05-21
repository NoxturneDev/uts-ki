<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JadwalResource\Pages;
use App\Filament\Admin\Resources\JadwalResource\RelationManagers;
use App\Models\Jadwal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jam_pelajaran_id')
                    ->label('Jam Pelajaran')
                    ->relationship('jamPelajaran', 'jam_ke')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('mata_pelajaran_id')
                    ->label('Mata Pelajaran')
                    ->relationship('mataPelajaran', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('parallel_id')
                    ->label('Paralel Kelas')
                    ->relationship('parallel', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->label('Guru')
                    ->relationship('teacher', 'name')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Guru')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mataPelajaran.name')
                    ->label('Mata Pelajaran')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jamPelajaran.jam_ke')
                    ->label('Jam Pelajaran Ke')
                    ->sortable(),
                Tables\Columns\TextColumn::make('parallel.name')
                    ->label('Parallel Kelas')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jamPelajaran.day_value')
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
                Tables\Columns\TextColumn::make('jamPelajaran.startTime')
                    ->label('Mulai')
                    ->time()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jamPelajaran.finishTime')
                    ->label('Selesai')
                    ->time()
                    ->sortable(),
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return Auth::user()?->hasRole(['super-admin', 'admin', 'teacher']);
    // }

    // public static function canView(Model $record): bool
    // {
    //     return Auth::user()?->hasRole(['super-admin', 'admin', 'teacher']);
    // }
}
