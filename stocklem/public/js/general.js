$(document).ready(function () {
    const dataTableOptions = {
        pageLength: 10,
        lengthChange: false,
        language: {
            paginate: {
                previous: "Anterior",
                next: "Siguiente"
            },
            search: "Buscar:",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "",
            emptyTable: "No existen registros"
        }
    };

    $('#table_data').DataTable(dataTableOptions);
});

window.addEventListener('DOMContentLoaded', function () {
    // Doughnut Chart: Stock Levels
    const stockCtx = document.getElementById('stockChart');
    if (stockCtx) {
        new Chart(stockCtx, {
            type: 'doughnut',
            data: {
                labels: ['Stock suficiente', 'Próximo a agotarse', 'Reabastecer'],
                datasets: [{
                    data: window.stockLevelsData,
                    backgroundColor: ['rgba(40,167,69,0.7)', 'rgba(255,193,7,0.7)', 'rgba(220,53,69,0.7)'],
                    borderColor: ['rgba(40,167,69,1)', 'rgba(255,193,7,1)', 'rgba(220,53,69,1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    }

    // Bar Chart: Monthly Movements
    const moveCtx = document.getElementById('monthMovement');
    if (moveCtx) {
        new Chart(moveCtx, {
            type: 'bar',
            data: {
                labels: [
                    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [
                    {
                        label: 'Entradas',
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        data: window.entriesPerMonth
                    },
                    {
                        label: 'Salidas',
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        data: window.issuesPerMonth
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });
    }
});
