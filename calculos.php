<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Control de Documentos - Módulo Matemático</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .card-calc { transition: transform 0.2s; border-left: 5px solid #4e73df; }
        .card-calc:hover { transform: scale(1.02); }
        .resultado-display { 
            font-size: 1.5rem; 
            font-weight: bold; 
            color: #4e73df;
            background: #f8f9fc;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">
        <?php include 'menu.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'encabezado.php'; ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Módulo de Series y Sumatorias</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 card-calc" style="border-left-color: #36b9cc;">
                                <div class="card-body">
                                    <h6 class="text-xs font-weight-bold text-info text-uppercase mb-1">Suma Lineal (Σ n)</h6>
                                    <p class="small text-muted">1 + 2 + 3 + ... + n</p>
                                    <input type="number" id="inputLineal" class="form-control mb-2" placeholder="Valor de n">
                                    <button onclick="ejecutarCalculo('Lineal')" class="btn btn-info btn-sm btn-block">Calcular</button>
                                    <div class="resultado-display mt-3" id="resLineal">0</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 card-calc" style="border-left-color: #4e73df;">
                                <div class="card-body">
                                    <h6 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suma Cuadrática (Σ n²)</h6>
                                    <p class="small text-muted">1² + 2² + 3² + ... + n²</p>
                                    <input type="number" id="inputCuad" class="form-control mb-2" placeholder="Valor de n">
                                    <button onclick="ejecutarCalculo('Cuad')" class="btn btn-primary btn-sm btn-block">Calcular</button>
                                    <div class="resultado-display mt-3" id="resCuad" style="color: #4e73df;">0</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 card-calc" style="border-left-color: #1cc88a;">
                                <div class="card-body">
                                    <h6 class="text-xs font-weight-bold text-success text-uppercase mb-1">Suma Cúbica (Σ n³)</h6>
                                    <p class="small text-muted">1³ + 2³ + 3³ + ... + n³</p>
                                    <input type="number" id="inputCub" class="form-control mb-2" placeholder="Valor de n">
                                    <button onclick="ejecutarCalculo('Cub')" class="btn btn-success btn-sm btn-block">Calcular</button>
                                    <div class="resultado-display mt-3" id="resCub" style="color: #1cc88a;">0</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Suma de Parámetros Dinámicos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                                        </div>
                                        <input type="text" id="inputVarios" class="form-control" placeholder="Ingrese números separados por comas (Ej: 10, 50, 22.5, 8)">
                                        <div class="input-group-append">
                                            <button onclick="ejecutarSumaN()" class="btn btn-dark" type="button">Sumar Todo</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-dark text-center">
                                        Total acumulado: <span id="resN" class="h4 ml-2">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pedro Martinez <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="js/calculos.js"></script>

    <script>
        // Controlador unificado para las 3 series
        function ejecutarCalculo(tipo) {
            const n = $(`#input${tipo}`).val();
            
            if (n === "" || n < 0) {
                Swal.fire('Atención', 'Ingresa un número entero positivo', 'warning');
                return;
            }

            let resultado = 0;
            if (tipo === 'Lineal') resultado = calcularSumaLineal(n);
            if (tipo === 'Cuad')   resultado = calcularSumaCuadratica(n);
            if (tipo === 'Cub')    resultado = calcularSumaCubica(n);

            $(`#res${tipo}`).text(formatearNumero(resultado));
        }

        // Controlador para la suma de lista
        function ejecutarSumaN() {
            const texto = $('#inputVarios').val();
            if (!texto.trim()) return;

            const lista = texto.split(',').map(n => parseFloat(n.trim())).filter(n => !isNaN(n));
            const resultado = sumarVarios(...lista);
            
            $('#resN').text(formatearNumero(resultado));
        }
    </script>
</body>
</html>