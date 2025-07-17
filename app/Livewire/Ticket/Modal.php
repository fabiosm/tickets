<?php

namespace App\Livewire\Ticket;

use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{
    public $showModal = false;

    #[On('openModal')]
    public function open(int $id)
    {
        $this->showModal = true;
    }
    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.ticket.modal');
    }
}
