/**
 * ARCHIVO DE LÓGICA MATEMÁTICA - Pedro Martinez
 * Este archivo contiene las funciones core para las operaciones del sistema.
 */

// 1. SUMA DE N PARÁMETROS (Usa el operador rest para recibir n cantidad de argumentos)
const sumarVarios = (...numeros) => {
    return numeros.reduce((acumulado, actual) => acumulado + actual, 0);
};

// 2. SUMA CUADRÁTICA (Suma de los cuadrados de 1 hasta n)
const calcularSumaCuadratica = (n) => {
    const num = parseInt(n);
    if (isNaN(num) || num < 0) return 0;
    // Fórmula: n(n+1)(2n+1) / 6
    return (num * (num + 1) * (2 * num + 1)) / 6;
};

// 3. SUMA LINEAL (Suma de Gauss: 1 + 2 + ... + n)
const calcularSumaLineal = (n) => {
    const num = parseInt(n);
    if (isNaN(num) || num < 0) return 0;
    return (num * (num + 1)) / 2;
};

// 4. SUMA CÚBICA (Suma de cubos: 1³ + 2³ + ... + n³)
const calcularSumaCubica = (n) => {
    const num = parseInt(n);
    if (isNaN(num) || num < 0) return 0;
    const base = (num * (num + 1)) / 2;
    return Math.pow(base, 2);
};

// 5. PROMEDIO DE N PARÁMETROS
const calcularPromedio = (...numeros) => {
    if (numeros.length === 0) return 0;
    const suma = sumarVarios(...numeros);
    return (suma / numeros.length).toFixed(2);
};

/**
 * FUNCIONES DE APOYO PARA LA INTERFAZ (UI)
 */

// Función para formatear números con comas (Ej: 1,500.50)
const formatearNumero = (valor) => {
    return new Intl.NumberFormat('en-US').format(valor);
};

// Función para limpiar cualquier input y su contenedor de resultado
const limpiarOperacion = (idInput, idResultado) => {
    $(`#${idInput}`).val('');
    $(`#${idResultado}`).text('0');
};