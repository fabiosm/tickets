<x-app-layout>
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <livewire:ticket.ticket-table theme="bootstrap-5">
            </div>
        </div>
    </div>
    <livewire:ticket.modal />

    <script>
        window.addEventListener('scriptModalTable', event => {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</x-app-layout>

