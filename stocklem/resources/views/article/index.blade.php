@extends('templates.base')
@section('title', 'Artículos')
@section('header', 'Artículos')
@section('content')
    <div class="mb-3">
        <a href="{{ route('article.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear artículo
        </a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRESENTACIÓN</th>
                        <th>CATEGORÍA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="text-center {{ $article->isBelowMinimum() ? 'table-danger' : '' }}">
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->quantity }}</td>
                            <td>{{ $article->presentation->description ?? 'Sin presentación' }}</td>
                            <td>{{ $article->category->name ?? 'Sin categoría' }}</td>
                            <td>
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm me-1"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $article->id }}"
                                    action="{{ route('article.destroy', $article->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                        onclick="removeId({{ $article->id }})">
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
