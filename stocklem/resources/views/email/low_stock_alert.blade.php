<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de Stock Mínimo - SENA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f0f4f7 0%, #d6eaf8 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #39a900 0%, #2d7d00 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 500;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            color: #2d3748;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .alert-summary {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border-left: 4px solid #ffc107;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .alert-summary p {
            color: #856404;
            font-size: 16px;
            line-height: 1.6;
            margin: 0;
        }

        .table-container {
            margin: 30px 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .data-table thead {
            background: linear-gradient(135deg, #39a900 0%, #2d7d00 100%);
            color: white;
        }

        .data-table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table td {
            padding: 16px 15px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            color: #4a5568;
        }

        .data-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        .status-critical {
            background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .status-warning {
            background: linear-gradient(135deg, #dd6b20 0%, #c05621 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #39a900 50%, transparent 100%);
            margin: 35px 0;
            border-radius: 1px;
        }

        .action-section {
            text-align: center;
            margin: 35px 0;
        }

        .action-text {
            color: #4a5568;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #39a900 0%, #2d7d00 100%);
            color: white !important;
            padding: 16px 35px;
            border-radius: 30px;
            text-decoration: none !important;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 8px 25px rgba(57, 169, 0, 0.35);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(57, 169, 0, 0.5);
            color: white !important;
            text-decoration: none !important;
        }

        .cta-button:visited,
        .cta-button:active,
        .cta-button:focus {
            color: white !important;
            text-decoration: none !important;
        }

        .footer-note {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.6;
            font-style: italic;
            text-align: center;
            margin-top: 30px;
        }

        .footer {
            background: linear-gradient(135deg, #39a900 0%, #2d7d00 100%);
            padding: 25px;
            text-align: center;
            color: white;
        }

        .footer p {
            font-size: 13px;
            margin: 0;
            line-height: 1.5;
            opacity: 0.9;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .content {
                padding: 25px 20px;
            }
            
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                width: 100%;
            }
            
            .data-table {
                width: 100%;
                min-width: unset;
            }
            
            .data-table th,
            .data-table td {
                padding: 8px 4px;
                font-size: 11px;
                text-align: center;
            }
            
            .data-table th:first-child,
            .data-table td:first-child {
                text-align: left;
                min-width: 120px;
            }
            
            .data-table th:nth-child(2),
            .data-table td:nth-child(2),
            .data-table th:nth-child(3),
            .data-table td:nth-child(3) {
                min-width: 60px;
            }
            
            .data-table th:last-child,
            .data-table td:last-child {
                min-width: 80px;
            }
            
            .status-critical,
            .status-warning {
                font-size: 9px;
                padding: 3px 6px;
                white-space: nowrap;
            }
            
            .cta-button {
                width: 100%;
                max-width: 280px;
            }
            
            .footer {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .email-container {
                border-radius: 8px;
            }
            
            .header {
                padding: 25px 15px;
            }
            
            .header h1 {
                font-size: 22px;
            }
            
            .content {
                padding: 20px 15px;
            }
            
            .data-table th,
            .data-table td {
                padding: 6px 3px;
                font-size: 10px;
            }
            
            .data-table th:first-child,
            .data-table td:first-child {
                min-width: 100px;
                font-size: 9px;
            }
            
            .data-table th:nth-child(2),
            .data-table td:nth-child(2),
            .data-table th:nth-child(3),
            .data-table td:nth-child(3) {
                min-width: 45px;
            }
            
            .data-table th:last-child,
            .data-table td:last-child {
                min-width: 70px;
            }
            
            .status-critical,
            .status-warning {
                font-size: 8px;
                padding: 2px 4px;
            }
            
            .cta-button {
                width: 100%;
                max-width: 300px;
                padding: 14px 25px;
                font-size: 15px;
            }
        }

        @media (max-width: 360px) {
            .header h1 {
                font-size: 20px;
            }
            
            .content {
                padding: 15px 10px;
            }
            
            .data-table th,
            .data-table td {
                padding: 5px 2px;
                font-size: 9px;
            }
            
            .data-table th:first-child,
            .data-table td:first-child {
                min-width: 90px;
                font-size: 8px;
            }
            
            .data-table th:nth-child(2),
            .data-table td:nth-child(2),
            .data-table th:nth-child(3),
            .data-table td:nth-child(3) {
                min-width: 35px;
            }
            
            .data-table th:last-child,
            .data-table td:last-child {
                min-width: 60px;
            }
            
            .status-critical,
            .status-warning {
                font-size: 7px;
                padding: 2px 3px;
            }
            
            .cta-button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">

        <div class="header">
            <h1>ALERTA DE STOCK MÍNIMO</h1>
            <p>Sistema de Inventario SENA</p>
        </div>

        <div class="content">
            <p class="greeting">Hola {{ $adminName }},</p>

            <div class="alert-summary">
                <p>Se han detectado <strong>{{ $articles->count() }} artículo(s)</strong> con nivel de stock igual o por debajo del mínimo establecido.</p>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Artículo</th>
                            <th>Stock Actual</th>
                            <th>Stock Mínimo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td><strong>{{ $article->name }}</strong></td>
                                <td style="color: #e53e3e; font-weight: bold;">{{ $article->quantity }}</td>
                                <td>{{ $article->min_quantity }}</td>
                                <td>
                                    <span class="{{ $article->quantity == 0 ? 'status-critical' : 'status-warning' }}">
                                        {{ $article->quantity == 0 ? 'Sin Stock' : 'Crítico' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>

            <div class="action-section">
                <p class="action-text">
                    Por favor, gestione el reabastecimiento lo antes posible para evitar faltantes operativos.
                </p>
                
                <a href="{{ url('/article/index') }}" class="cta-button">Ir al Inventario</a>
            </div>

            <p class="footer-note">
                Este correo fue generado automáticamente por el sistema de alertas del SENA. No requiere respuesta.
            </p>
        </div>

        <div class="footer">
            <p>
                Sistema de Inventario SENA<br>
                Servicio Nacional de Aprendizaje
            </p>
        </div>
    </div>
</body>
</html>