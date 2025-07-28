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
            if (!$row->is_active) {
                return ['class' => 'table-danger text-muted'];
            } elseif ($row->is_pending) {
                return ['class' => 'table-warning text-muted'];
            }

            return [];
        });
    }

    public function openModalEdit(int $id)
    {
        $this->dispatch('openModalUserEdit', $id);
    }

    public function alterarStatus(
        int $idUser,
        bool $status,
        string $campo = 'is_active'
    ): void
    {
        if ($user = User::find($idUser)) {
            $user->$campo = $status;
            $user->save();

            $this->dispatch('refreshUserTable');

            $msg = [
                'message' => $status ?
                    'Usuário reativado com sucesso!' :
                    'Usuário desativado com sucesso!'
            ];
            if ($campo == 'is_pending') {
                $msg = [
                    'message' => $status ?
                        'Usuário alterado para pendente!':
                        'Usuário liberado com sucesso!'
                ];
            }

            $this->dispatch(
            'showToast',
            $msg
            );
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Usuário', 'name')->sortable()->searchable(),
            Column::make('E-mail', 'email')->format(function($value, $row) {
                $info = '';
                if ($row->is_pending) {
                    $info = '&nbsp;&nbsp;<b>(e-mail pendente)</b>';
                }

                return $value.$info;
            })->html()->sortable()->searchable(),
            Column::make('Data criação', 'created_at')->sortable()->searchable(),
            Column::make('Admin', 'is_admin')->format(function($value) {
                $isAdmin = ($value) ? 'checked' : '';
                return '<input class="form-check-input" disabled '.$isAdmin.' type="checkbox" />';
            })->html(),
            Column::make('Ativo', 'is_active')->hideIf(true),
            Column::make('Pendente', 'is_pending')->hideIf(true),
            Column::make('Ações', 'id')->format(function($id, $row) {
                if ($row->is_active) {
                    $htmlButton = '
                        <a class="badge bg-success"
                        wire:click="openModalEdit('.$id.')"
                        style="cursor:pointer; text-decoration:none;">Editar</a>
                        <a class="badge bg-danger"
                        wire:click="alterarStatus('.$id.', false)"
                        style="cursor:pointer; text-decoration:none;">Desativar</a>';

                    if ($row->is_pending) {
                        $htmlButton .= '
                            <a class="badge bg-warning"
                            wire:click="alterarStatus('.$id.', false, \'is_pending\')"
                            style="cursor:pointer; text-decoration:none;">Aprovar</a>
                        ';
                    }
                } else {
                    $htmlButton = '
                        <a class="badge bg-secondary"
                        wire:click="alterarStatus('.$id.', true)"
                        style="cursor:pointer; text-decoration:none;">Reativar</a>
                    ';
                }

                return $htmlButton;

            })->html()
        ];
    }
}
