<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Modal extends Component
{
    public bool $showModal = false;
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

    public function open()
    {
        $this->showModal = true;
    }
    public function close()
    {
        $this->showModal = false;
    }

    public function save()
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
