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

    public function columns(): array
    {
        return [
            Column::make('Usuário', 'name')->sortable()->searchable(),
            Column::make('E-mail', 'email')->sortable()->searchable(),
            Column::make('Data criação', 'created_at')->sortable()->searchable(),
            Column::make('Ações', 'id')->format(function($value) {
                return '<a
                    data-bs-toggle="tooltip"
                    title="Mensagem do tooltip"
                    class="badge bg-success"
                    wire:click="abreModal"
                    style="cursor:pointer; text-decoration: none;">Editar</a>
                    <a
                    data-bs-toggle="tooltip"
                    title="Mensagem do tooltip"
                    class="badge bg-danger"
                    wire:click="abreModal"
                    style="cursor:pointer; text-decoration: none;">Desativar</a>';
            })->html()
        ];
    }
}
