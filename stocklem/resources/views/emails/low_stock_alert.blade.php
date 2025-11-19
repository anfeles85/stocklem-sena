<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #39a900 0%, #2e7d00 100%); padding: 30px 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0 0 10px 0; font-size: 32px; font-weight: bold; letter-spacing: 1px;">
                                STOCKLEM
                            </h1>
                            <p style="color: #e8f5e9; margin: 0 0 15px 0; font-size: 14px;">
                                Sistema de Inventario - SENA
                            </p>
                            <div style="background: #ffffff; color: #39a900; display: inline-block; padding: 12px 24px; border-radius: 25px; font-weight: bold; font-size: 16px;">
                                Alerta de Stock Crítico
                            </div>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px 20px;">
                            
                            <p style="font-size: 16px; color: #333; margin: 0 0 25px 0;">
                                Hola <strong style="color: #39a900;">{{ $adminName }}</strong>,
                            </p>

                            <div style="background-color: #f1f8e9; border-left: 4px solid #39a900; padding: 15px; border-radius: 4px; margin-bottom: 25px; text-align: center;">
                                <p style="font-size: 16px; color: #2e5f3e; margin: 0;">
                                    Se detectaron <strong style="color: #39a900;">{{ $articles->count() }}</strong> artículo(s) con stock crítico
                                </p>
                            </div>

                            <!-- Table -->
                            <table width="100%" cellpadding="12" cellspacing="0" style="border-collapse: collapse; margin-bottom: 25px;">
                                <thead>
                                    <tr style="background-color: #39a900;">
                                        <th style="padding: 12px; text-align: left; color: white; border: 1px solid #ddd;">Artículo</th>
                                        <th style="padding: 12px; text-align: center; color: white; border: 1px solid #ddd;">Actual</th>
                                        <th style="padding: 12px; text-align: center; color: white; border: 1px solid #ddd;">Mínimo</th>
                                        <th style="padding: 12px; text-align: center; color: white; border: 1px solid #ddd;">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                    <tr style="background-color: {{ $loop->even ? '#f9f9f9' : '#ffffff' }};">
                                        <td style="padding: 12px; border: 1px solid #ddd;"><strong>{{ $article->name }}</strong></td>
                                        <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">{{ $article->quantity }}</td>
                                        <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">{{ $article->min_quantity }}</td>
                                        <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">
                                            <span style="background: {{ $article->quantity == 0 ? '#d32f2f' : '#ff8f00' }}; color: white; padding: 5px 12px; border-radius: 12px; font-size: 11px; font-weight: bold; display: inline-block;">
                                                {{ $article->quantity == 0 ? 'SIN STOCK' : 'CRÍTICO' }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Button -->
                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ url('/article') }}" style="background-color: #39a900; color: white; padding: 14px 28px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                                    Gestionar Inventario
                                </a>
                            </div>

                            <!-- Alert Box -->
                            <div style="padding: 15px; background-color: #fff3cd; border-left: 4px solid #ff8f00; border-radius: 4px; margin: 20px 0;">
                                <p style="margin: 0; color: #856404; font-size: 14px;">
                                    <strong>Importante:</strong> Reabastecer estos artículos para evitar interrupciones operativas.
                                </p>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="text-align: center; padding: 20px; background-color: #f4f4f4; border-top: 1px solid #ddd;">
                            <p style="margin: 0 0 5px 0; color: #666; font-size: 12px;">© {{ date('Y') }} STOCKLEM - SENA</p>
                            <p style="margin: 0; color: #999; font-size: 12px;">Sistema de Gestión de Inventario</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
