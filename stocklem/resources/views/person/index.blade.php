@extends('templates.base')
@section('title', 'Personas')
@section('header', 'Personas')
@section('content')
    @can('administrador')
    <div class="mb-3">
        <a href="{{ route('person.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear persona
        </a>

        <a href="{{ route('person.import.form') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Importar desde Excel
        </a>
    </div>
    @endcan

    <div class="card">
        <div class="table-responsive">
            <table id="table_active_inactive" data-status-column="4" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th>ESTADO</th>
                        @can('administrador')
                        <th>ACCIONES</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $person)
                        <tr class="text-center">
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->document }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->phone }}</td>
                            <td>
                                <span class="badge {{ $person->status == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $person->status }}
                                </span>
                            </td>

                            @can('administrador')
                            <td class="text-center">
                                <a href="{{ route('person.edit', $person->id) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                @if($person->status == 'ACTIVO')
                                <form id="form-toggle-{{ $person->id }}" action="{{ route('person.toggleStatus', $person->id) }}"
                                     method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-secondary btn-sm me-1" title="Inactivar">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </form>
                                @else
                                <form id="form-toggle-{{ $person->id }}" action="{{ route('person.toggleStatus', $person->id) }}"
                                     method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm me-1" title="Activar">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif

                                <form id="form-delete-{{ $person->id }}" action="{{ route('person.forceDelete', $person->id) }}"
                                     method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" title="Eliminar permanentemente" 
                                     onclick="removePermanently({{ $person->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endcan
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/table-filter-by-status.js') }}"></script>
@endpush