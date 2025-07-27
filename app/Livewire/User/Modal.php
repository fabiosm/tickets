<?php

namespace App\Livewire\User;

use App\Livewire\Base\ModalComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Modal extends ModalComponent
{
    public string $name;
    public string $email;
    public string $password;
    public string $passwordConfirmation;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:passwordConfirmation',
        'passwordConfirmation' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.user.modal');
    }

    public function save(): void
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();

        $this->dispatch(
            'showToast',
            ['message' => 'Usuário cadastrado com sucesso!']
        );
        $this->dispatch('refreshUserTable');
        $this->showModal = false;
    }
}
