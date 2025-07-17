<x-app-layout>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <livewire:ticket.ticket-table theme="bootstrap-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:ticket.modal />
</x-app-layout>
@scripts
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endscripts
