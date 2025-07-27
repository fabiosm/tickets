<?php

namespace App\Livewire\User;

use App\Livewire\Base\ModalComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class ModalEdit extends ModalComponent
{
    public bool $changePassword = false;

    public int $idUser;
    public string $name;
    public string $email;
    public bool $isAdmin;
    public string $password;
    public string $passwordConfirmation;
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->idUser,
            'password' => $this->changePassword ? 'required|min:6|same:passwordConfirmation' : 'nullable',
            'passwordConfirmation' => $this->changePassword ? 'required|min:6' : 'nullable',
        ];
    }

    public function render()
    {
        return view('livewire.user.modal-edit');
    }

    #[On('openModalUserEdit')]
    public function open(?int $idUser = null): void
    {
        $user = User::find($idUser);
        if (!empty($user)) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->isAdmin = $user->is_admin;
            $this->idUser = $idUser;

            $this->showModal = true;
        }
    }

    public function save(): void
    {
        $this->validate();

        $user = User::find($this->idUser);
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->changePassword) {
            $user->password = Hash::make($this->password);
        }

        $user->is_admin = $this->isAdmin;
        $user->save();

        $this->reset();

        $this->dispatch(
            'showToast',
            ['message' => 'Usuário editado com sucesso!']
        );

        $this->dispatch('refreshUserTable');
        $this->showModal = false;
    }
}
