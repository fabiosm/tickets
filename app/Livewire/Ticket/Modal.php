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
        $this->dispatch('show-bs-modal');
    }
    public function close()
    {
        $this->showModal = false;
        $this->dispatch('hide-bs-modal');
    }

    public function render()
    {
        $this->dispatch('scriptModalTicket');
        return view('livewire.ticket.modal');
    }
}
