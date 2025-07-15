<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Responsável</th>
                                    <th>Tipo</th>
                                    <th>Solicitação</th>
                                    <th>Solicitante</th>
                                    <th>Data Abertura</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="" data-bs-toggle="tooltip" title="Mensagem do tooltip">
                                            1
                                        </a>
                                    </td>
                                    <td>John Doe</td>
                                    <td>Tipo A</td>
                                    <td>Solicitação 1</td>
                                    <td>Solicitante 1</td>
                                    <td data-order="2023-01-01">01/01/2023</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="" data-bs-toggle="tooltip" title="Mensagem do tooltip">
                                            2
                                        </a>
                                    </td>
                                    <td>Jane Smith</td>
                                    <td>Tipo B</td>
                                    <td>Solicitação 2</td>
                                    <td>Solicitante 2</td>
                                    <td data-order="2023-01-02">02/01/2023</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="" data-bs-toggle="tooltip" title="Mensagem do tooltip">
                                            3
                                        </a>
                                    </td>
                                    <td>Bob Johnson</td>
                                    <td>Tipo C</td>
                                    <td>Solicitação 3</td>
                                    <td>Solicitante 3</td>
                                    <td data-order="2023-01-03">03/01/2023</td>
                                </tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@scripts
    <script>
        $('#sampleTable').DataTable();

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endscripts
