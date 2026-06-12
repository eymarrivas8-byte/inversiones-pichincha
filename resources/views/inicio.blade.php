<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inversiones Pichincha</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            padding:40px;
        }

        .container{
            max-width:700px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:10px;
            margin-bottom:20px;
        }

        button{
            background:green;
            color:white;
            border:none;
            padding:12px;
            width:100%;
            cursor:pointer;
        }

        .resultado{
            margin-top:30px;
            background:#eee;
            padding:20px;
            border-radius:10px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Inversiones Pichincha</h1>

    <form action="/guardar" method="POST">
        @csrf

        <label>Cédula</label>
        <input type="text" name="cedula" required>

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Tipo de Producto</label>
        <select name="tipo_producto" required>
            <option value="">Seleccione</option>
            <option value="1">Vivienda</option>
            <option value="2">Estudios</option>
            <option value="3">Vehículo</option>
            <option value="4">Viaje</option>
        </select>

        <label>Valor del Crédito</label>
        <input type="number" name="valor_credito" required>

        <label>Cantidad de Cuotas</label>
        <input type="number" name="plazo" required>

        <button type="submit">
            Calcular Crédito
        </button>

    </form>

    @if(session('credito'))

    <div class="resultado">

        <h2>Resultado del Crédito</h2>

        <p><strong>Cédula:</strong>
            {{ session('credito')['cedula'] }}
        </p>

        <p><strong>Nombre:</strong>
            {{ session('credito')['nombre'] }}
        </p>

        <p><strong>Tipo Producto:</strong>
            {{ session('credito')['producto'] }}
        </p>

        <p><strong>Valor Crédito:</strong>
            ${{ number_format(session('credito')['valor_credito']) }}
        </p>

        <p><strong>Interés:</strong>
            ${{ number_format(session('credito')['interes']) }}
        </p>

        <p><strong>Total a pagar:</strong>
            ${{ number_format(session('credito')['total']) }}
        </p>

        <p><strong>Cuotas:</strong>
            {{ session('credito')['plazo'] }}
        </p>

        <p><strong>Valor por cuota:</strong>
            ${{ number_format(session('credito')['cuota']) }}
        </p>

    </div>

    @endif
<div class="resultado">

    <h2>Reporte Financiera</h2>

    <p><strong>Total Vivienda:</strong>
        {{ $vivienda }}
    </p>

    <p><strong>Total Estudios:</strong>
        {{ $estudios }}
    </p>

    <p><strong>Total Vehículo:</strong>
        {{ $vehiculo }}
    </p>

    <p><strong>Total Viaje:</strong>
        {{ $viaje }}
    </p>

    <p><strong>Total intereses:</strong>
        ${{ number_format($totalIntereses) }}
    </p>

    <p><strong>Total créditos aprobados:</strong>
        {{ $totalCreditos }}
    </p>

</div>
</div>

</body>
</html>