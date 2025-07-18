<!-- Modal Bootstrap -->
<div wire:ignore.self class="modal fade" id="ticketModal" tabindex="-1" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticketModalLabel">Modal com Livewire + Bootstrap 5</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Fechar"
                    wire:click="close">
                </button>
            </div>
            <div class="modal-body">
                Conteúdo do modal aqui...
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="close" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('scriptModalTicket', event => {
        const modal = new bootstrap.Modal(document.getElementById('ticketModal'));

        window.addEventListener('show-bs-modal', () => {
            modal.show();
        });

        window.addEventListener('hide-bs-modal', () => {
            modal.hide();
        });
    });
</script>
