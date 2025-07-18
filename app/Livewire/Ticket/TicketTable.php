<?php

namespace App\Livewire\Ticket;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TicketTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->dispatch('scriptModalTable');
        $this->setPrimaryKey('id');
    }

    public function abreModal()
    {
        $this->dispatch('openModal', true);
    }

    public function columns(): array
    {
        return [
            Column::make('Número', 'id')->sortable()->searchable()
                ->format(function($value) {
                    return '<a
                        data-bs-toggle="tooltip"
                        title="Mensagem do tooltip"
                        class="badge bg-success"
                        wire:click="abreModal"
                        style="cursor:pointer; text-decoration: none;">' . $value . '</a>';
                })
                ->html(),
            Column::make('Responsável', 'name')->sortable()->searchable(),
            Column::make('Tipo', 'email')->sortable()->searchable(),
            Column::make('Solicitação', 'password')->sortable()->searchable(),
            Column::make('Solicitante', 'name')->sortable()->searchable(),
            Column::make('Data Abertura', 'created_at')->sortable()->searchable()
        ];
    }
}
