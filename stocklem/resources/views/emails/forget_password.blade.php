<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinicio de contraseña</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        
        <tr>
            <td style="background-color: #39a900; padding: 30px; text-align: center; color: white;">
                <h1 style="font-size: 24px; margin: 0; font-weight: 500;">Reinicio de Contraseña</h1>
                <p style="margin: 10px 0 0; font-size: 14px; opacity: 0.9;">Solicitud de restablecimiento de contraseña</p>
            </td>
        </tr>

        <tr>
            <td style="padding: 30px; line-height: 1.6;">
                <p style="font-size: 16px; margin-bottom: 20px;"><strong style="color: #39a900;">¡Hola!</strong></p>
                <p style="font-size: 15px; color: #444; margin-bottom: 20px;">
                    Hemos recibido una solicitud para restablecer la contraseña de tu cuenta. Si solicitaste este cambio, haz clic en el botón de abajo para continuar.
                </p>

                <div style="text-align: center; margin: 30px 0;">
                    <a href="{{ route('reset.password.get', $token) }}" 
                       style="background-color: #39a900; color: white; text-decoration: none; padding: 14px 24px; border-radius: 6px; font-size: 16px; font-weight: bold; display: inline-block;">
                        Restablecer contraseña
                    </a>
                </div>

                <div style="background-color: #f1f8e9; border: 1px solid #39a900; border-radius: 6px; padding: 15px; margin-top: 20px;">
                    <strong style="color: #2e5f3e; font-size: 15px;">⚠️ Aviso de seguridad:</strong>
                    <ul style="font-size: 14px; color: #2e5f3e; margin: 10px 0 0; padding-left: 20px;">
                        <li>Este enlace expira en 60 minutos.</li>
                        <li>Si no solicitaste este cambio, ignora este correo.</li>
                        <li>No compartas este enlace con nadie.</li>
                    </ul>
                </div>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px; text-align: center; background-color: #f8f9fa; border-top: 1px solid #eee; font-size: 13px; color: #666;">
                <p style="margin: 5px 0;">Este es un mensaje automático. Por favor, no respondas.</p>
                <p style="margin: 5px 0;">Si necesitas ayuda, contacta a nuestro <a href="mailto:support@stocklem.com" style="color: #39a900; text-decoration: none;">soporte técnico</a>.</p>
                <p style="margin: 10px 0 0; font-weight: bold; color: #39a900;">Sistema STOCKLEM</p>
            </td>
        </tr>
    </table>
</body>
</html>