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
        $this->setTrAttributes(function($row) {
            if ($row->is_active == 0) {
                return [
                    'class' => 'table-danger text-muted',
                ];
            }
            return [];
        });
    }

    public function openModalEdit(int $id)
    {
        $this->dispatch('openModalUserEdit', $id);
    }

    public function alterarStatus(int $idUser, bool $status): void
    {
        if ($user = User::find($idUser)) {
            $user->is_active = $status;
            $user->save();

            $this->dispatch('refreshUserTable');

            $this->dispatch(
                'showToast',
                [
                    'message' => $status ?
                        'Usuário reativado com sucesso!' :
                        'Usuário desativado com sucesso!'
                    ]
            );
        }
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
            Column::make('Ativo', 'is_active')->hideIf(true),
            Column::make('Ações', 'id')->format(function($id, $row) {
                if ($row->is_active == 1) {
                    return '
                        <a class="badge bg-success"
                        wire:click="openModalEdit('.$id.')"
                        style="cursor:pointer; text-decoration:none;">Editar</a>
                        <a class="badge bg-danger"
                        wire:click="alterarStatus('.$id.', false)"
                        style="cursor:pointer; text-decoration:none;">Desativar</a>';
                } else {
                    return '
                        <a class="badge bg-secondary"
                        wire:click="alterarStatus('.$id.', true)"
                        style="cursor:pointer; text-decoration:none;">Reativar</a>
                    ';
                }

            })->html()
        ];
    }
}
