<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Link;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\TableComponent;

class UsersTable extends TableComponent
{
    public function mount()
    {
        $this->perPage = config('custom.table_per_page');
    }

    public function query() : Builder
    {
        return User::where('id', '<>', auth()->user()->id)
                    ->with('roles')->withCount('permissions');
    }

    public function columns() : array
    {
        return [
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Actions', 'text-center')
                    ->view('livewire.users.actions'),
        ];
    }

    public function setTableHeadClass($attribute): ?string
    {
        return $attribute;
    }

    public function setTableDataClass($attribute, $value): ?string
    {
        return $attribute;
    }
}
