<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form>
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">
                                        Abrir em nome de terceiros
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 col-4">
                                <div class="form-group">
                                    <label class="form-label" for="solicitante">
                                        Usuário Solicitante:
                                    </label>
                                    <select class="form-control" id="solicitante">
                                        <option value="">Selecione</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-4">
                                <div class="form-group">
                                    <label class="form-label" for="setor">
                                        Setor responsável:
                                    </label>
                                    <select class="form-control" id="setor">
                                        <option value="">Selecione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-4">
                                <div class="form-group">
                                    <label class="form-label" for="tipo">
                                        Tipo de solicitação:
                                    </label>
                                    <select class="form-control" id="tipo">
                                        <option value="">Selecione</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger text-center">
                                    <i class="bi bi-exclamation-circle"></i>
                                    &nbsp;&nbsp;
                                    Informações da tipo de solicitação
                                </div>
                            </div>
						</div>

                        <!-- IMPLEMENTAR CAMPOS PERSONALIZADOS AQUI -->

                        <div class="mb-3">
                            <label class="form-label">Anexar arquivo</label>
                            <input class="form-control" type="file">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Solicitação</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-check-circle-fill me-2"></i>Abrir
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
