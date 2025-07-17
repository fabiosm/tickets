<div>
    @if ($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalhes do Ticket</h5>
                        <button type="button" class="btn-close" wire:click="close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Número:</strong> 1</p>
                        <p><strong>Responsável:</strong> Teste</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
