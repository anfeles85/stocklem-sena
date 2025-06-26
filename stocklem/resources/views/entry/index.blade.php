
@extends('templates.base')
@section('title', 'Entradas')
@section('header', 'Entradas')
@section('content')
    <div class="mb-3">
        <a href="{{ route('entry.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear entrada
        </a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>CÓDIGO SENA</th>
                        <th>FECHA</th>
                        <th>FECHA VENCIMIENTO</th>
                        <th>CANTIDAD</th>
                        <th>OBSERVACIONES</th>
                        <th>ARTÍCULO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $entry)
                        <tr class="text-center">
                            <td>{{ $entry->id }}</td>
                            <td>{{ $entry->sena_code }}</td>
                            <td>{{ $entry->date_entry }}</td>
                            <td>{{ $entry->expiration_date }}</td>
                            <td>{{ $entry->quantity }}</td>
                            <td>{{ $entry->observations }}</td>
                            <td>{{ $entry->article->name ?? 'Sin artículo' }}</td>
                            <td>
                                <a href="{{ route('entry.edit', $entry->id) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $entry->id }}" action="{{ route('entry.destroy', $entry->id) }}" 
                                     method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                        onclick="removeId({{ $entry->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($entries->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center text-muted">No hay entradas registradas.</td>
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