@extends('templates.base')
@section('title', 'Crear presentación')
@section('header', 'Crear presentación')
@section('content')
    <div class="mb-3">
        <a href="{{ route('presentation.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear presentación
        </a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPCION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <body>
                    @foreach ($presentations as $presentation)
                        <tr+>
                            <td>{{ $presentation['id'] }}</td>
                            <td>{{ $presentation['description'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('presentation.edit', $presentation['id']) }}"
                                    class="btn btn-warning btn-circle btn-sm" title="Editar"><i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('presentation.destroy', $presentation['id']) }}"
                                    class="btn btn-danger btn-circle btn-sm" class="Eliminar" onclick="return remove();"><i
                                        class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
