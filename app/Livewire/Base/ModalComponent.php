<?php

namespace App\Livewire\Base;

use Livewire\Component;

abstract class ModalComponent extends Component
{
    public bool $showModal = false;
    public function open(): void
    {
        $this->showModal = true;
    }

    public function close(): void
    {
        $this->reset();
        $this->showModal = false;
    }

    abstract public function render();
    abstract public function save();
}
