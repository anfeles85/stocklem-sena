@extends('templates.base')
@section('title', 'Presentaciones')
@section('header', 'Presentaciones')
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
                                <form action="{{ route('presentation.destroy', $presentation['id']) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Eliminar">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection