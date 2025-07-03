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
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr  class="text-center">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('category.edit', $category->id) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar"><i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}"
                                     method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" title="Eliminar" 
                                        onclick="removeId({{ $category->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
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

