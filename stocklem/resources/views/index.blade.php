@extends('templates.base')
@section('title', 'Inicio')
@section('header', 'Inicio')
@section('content')

<div class="row mb-4">
    <div class="col-lg-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <div class="mb-2">
                    <i class="fa fa-pills fa-2x text-sena"></i>
                </div>
                <h5 class="card-title">Medicamentos</h5>
                <h2 class="fw-bold">630</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <div class="mb-2">
                    <i class="fa fa-boxes fa-2x text-sena"></i>
                </div>
                <h5 class="card-title">Insumos</h5>
                <h2 class="fw-bold">380</h2>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <div class="mb-2">
                    <i class="fa fa-truck fa-2x text-sena"></i>
                </div>
                <h5 class="card-title">Proveedores</h5>
                <h2 class="fw-bold">250</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4 mt-5 text-center">
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Nivel de insumos</h6>
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Insumo</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Guantes</td>
                            <td>1,200</td>
                            <td><span class="badge bg-success">Activo</span></td>
                        </tr>
                        <tr>
                            <td>Jeringas</td>
                            <td>800</td>
                            <td><span class="badge bg-warning text-dark">Por vencer</span></td>
                        </tr>
                        <tr>
                            <td>Alcohol</td>
                            <td>500</td>
                            <td><span class="badge bg-success">Activo</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Stock de medicamentos</h6>
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Medicamento</th>
                            <th>Cantidad</th>
                            <th>Estado de stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Paracetamol</td>
                            <td>2,000</td>
                            <td><span class="badge bg-success">Stock suficiente</span></td>
                        </tr>
                        <tr>
                            <td>Ibuprofeno</td>
                            <td>350</td>
                            <td><span class="badge bg-warning text-dark">Próximo a agotarse</span></td>
                        </tr>
                        <tr>
                            <td>Amoxicilina</td>
                            <td>80</td>
                            <td><span class="badge bg-danger">Reabastecer</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4  text-center">
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Inventarios</h6>
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tipo</th>
                            <th>Porcentaje</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Medicamentos activos</td>
                            <td>27.5%</td>
                            <td>4.5M</td>
                        </tr>
                        <tr>
                            <td>Medicamentos inactivos</td>
                            <td>11.2%</td>
                            <td>2.3M</td>
                        </tr>
                        <tr>
                            <td>Insumos de baja</td>
                            <td>9.4%</td>
                            <td>2M</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Top 5 proveedores</h6>
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Proveedor</th>
                            <th>Ventas</th>
                            <th>Crecimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Proveedor A</td>
                            <td>$800K</td>
                            <td><span class="badge bg-success">+7%</span></td>
                        </tr>
                        <tr>
                            <td>Proveedor B</td>
                            <td>$645K</td>
                            <td><span class="badge bg-success">+2.5%</span></td>
                        </tr>
                        <tr>
                            <td>Proveedor C</td>
                            <td>$590K</td>
                            <td><span class="badge bg-danger">-6.5%</span></td>
                        </tr>
                        <tr>
                            <td>Proveedor D</td>
                            <td>$342K</td>
                            <td><span class="badge bg-success">+1.7%</span></td>
                        </tr>
                        <tr>
                            <td>Proveedor E</td>
                            <td>$300K</td>
                            <td><span class="badge bg-warning text-dark">0%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection