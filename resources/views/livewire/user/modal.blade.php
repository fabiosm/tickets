<div>
    <button wire:click="open" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModal">
        Novo Usuário
    </button>

    <!-- Modal -->
    @if($showModal)
        <dialog
            wire:ignore.self
            class="modal fade show d-block"
            id="userCreateModal"
            tabindex="-1"
            style="background-color: rgba(0,0,0,0.5);"
            aria-modal="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form wire:submit.prevent="save">
                        <div class="modal-header">
                            <h5 class="modal-title">Cadastrar Usuário</h5>
                            <button type="button" class="btn-close" wire:click="close" aria-label="Fechar"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" wire:model.defer="name" id="name" class="form-control">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" wire:model.defer="password" id="password" class="form-control">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="passwordConfirmation" class="form-label">Confirme a senha</label>
                                <input type="password" wire:model.defer="passwordConfirmation" id="passwordConfirmation" class="form-control">
                                @error('passwordConfirmation') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="close">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
    @endif
</div>

