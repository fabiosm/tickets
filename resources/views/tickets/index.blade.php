<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                @foreach ($filasTickets as $tipo => $fila)
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small {{ $fila['color'] }} coloured-icon">
                            <i class="icon bi bi-list-task fs-1"></i>
                            <a href="{{ route('tickets.fila', ['tipo' => $tipo]) }}" class="info">
                                <p><b>{{ $fila['count'] }}</b></p>
                                <h4>{{ $tipo }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
