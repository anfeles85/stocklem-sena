@extends('templates.base')
@section('title', 'Crear unidad')
@section('header', 'Crear unidad')
@section('content')
    <div class="mb-3">
        <a href="{{ route('unit.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear unidad
        </a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <body>
                    @foreach($units as $unit)
                    <tr>
                        <td>{{ $unit['id'] }}</td>
                        <td>{{ $unit['name'] }}</td>
                        <td class="text-center">
                            <a href="{{ route('unit.edit',$unit['id']) }}" class="btn btn-warning btn-circle btn-sm" title="Editar"><i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('unit.destroy',$unit['id']) }}" class="btn btn-danger btn-circle btn-sm" class="Eliminar" onclick="return remove();"><i class="fa-solid fa-trash-can"></i>
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