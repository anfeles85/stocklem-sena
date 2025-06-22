@extends('templates.base')
@section('title', 'Categorias')
@section('header', 'Categorias')
@section('content')
    <div class="mb-3">
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear Categoria
        </a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>

                <body>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td>{{ $category['description'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('category.edit', $category['id']) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar"><i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('category.destroy', $category['id']) }}"
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
