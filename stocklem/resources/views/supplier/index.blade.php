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
        <table id="table_data" class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>TELÉFONO</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm me-1"
                            title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form id="form-delete-{{ $supplier->id }}"
                            action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                onclick="removeId({{ $supplier->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($suppliers->isEmpty())
                <tr>
                    <td colspan="4" class="text-center text-muted">No hay proveedores registrados.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection