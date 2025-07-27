<?php

namespace App\Livewire\User;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    protected $listeners = ['refreshUserTable' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function openModalEdit(int $id)
    {
        $this->dispatch('openModalUserEdit', $id);
    }

    public function columns(): array
    {
        return [
            Column::make('Usuário', 'name')->sortable()->searchable(),
            Column::make('E-mail', 'email')->sortable()->searchable(),
            Column::make('Data criação', 'created_at')->sortable()->searchable(),
            Column::make('Admin', 'is_admin')->format(function($value) {
                $isAdmin = ($value) ? 'checked' : '';
                return '<input class="form-check-input" disabled '.$isAdmin.' type="checkbox" />';
            })->html(),
            Column::make('Ações', 'id')->format(function($id) {
                return '<a
                    class="badge bg-success"
                    wire:click="openModalEdit('.$id.')"
                    style="cursor:pointer; text-decoration:none;">Editar</a>
                    <a
                    class="badge bg-danger"
                    wire:click="abreModal"
                    style="cursor:pointer; text-decoration: none;">Desativar</a>';
            })->html()
        ];
    }
}
