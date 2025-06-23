@extends('templates.base')
@section('title', 'Proveedores')
@section('header', 'Proveedores')
@section('content')
    <div class="mb-3">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear proveedor
        </a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <body>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier['id'] }}</td>
                            <td>{{ $supplier['name'] }}</td>
                            <td>{{ $supplier['description'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('supplier.edit', $supplier['id']) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar"><i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('supplier.destroy', $supplier['id']) }}" method="POST" class="d-inline delete-form">
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
