<?php

namespace App\Livewire\Ticket;

use App\Livewire\Base\ModalComponent;
use Livewire\Attributes\On;

class Modal extends ModalComponent
{
    #[On('openModal')]
    public function open(): void
    {
        $this->showModal = true;
        $this->dispatch('show-bs-modal');
    }
    public function close(): void
    {
        $this->showModal = false;
        $this->dispatch('hide-bs-modal');
    }

    public function render()
    {
        $this->dispatch('scriptModalTicket');
        return view('livewire.ticket.modal');
    }

    public function save(): void
    {
        // Implementar
    }
}
