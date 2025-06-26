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
        <table id="table_data" class="table table-hover align-middle mb-0 text-center">
            <thead class="table-light">
                <tr class="text-center">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>TELÉFONO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr class="text-center">
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>
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
            </tbody>
        </table>
    </div>
</div>
@endsection