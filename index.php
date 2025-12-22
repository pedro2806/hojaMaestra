<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Gestión Documental</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">    

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #666; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; border: none; border-radius: 4px; color: white; font-size: 16px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: red; font-size: 14px; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Control Documental</h2>
    
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="usuario">Usuario o Correo Electrónico</label>
            <input type="text" name="usuario" id="usuario" placeholder="nombre.usuario@empresa.com" required>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="••••••••" required>
        </div>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
    
    <p style="text-align: center; font-size: 12px; color: #999; margin-top: 20px;">
        Acceso restringido a personal autorizado.
    </p>
</div>

</body>
</html>