<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Credito;
use Illuminate\Support\Facades\Http;

class CreditoController extends Controller
{
   public function index()
{
    $vivienda = Credito::where('tipo_producto', 1)->count();

    $estudios = Credito::where('tipo_producto', 2)->count();

    $vehiculo = Credito::where('tipo_producto', 3)->count();

    $viaje = Credito::where('tipo_producto', 4)->count();

    $totalIntereses = Credito::sum('interes');

    $totalCreditos = Credito::count();

    return view('inicio', compact(
        'vivienda',
        'estudios',
        'vehiculo',
        'viaje',
        'totalIntereses',
        'totalCreditos'
    ));
}

    public function guardar(Request $request)
    {
        // API pública
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        // Guardar cliente
        $cliente = Cliente::create([
            'cedula' => $request->cedula,
            'nombre' => $request->nombre
        ]);

        // Calcular interés
        $interes = $request->valor_credito * 0.08 * $request->plazo;

        // Total a pagar
        $totalPagar = $request->valor_credito + $interes;

        // Valor cuota
        $valorCuota = $totalPagar / $request->plazo;

        // Nombre del producto
        $productos = [
            1 => 'Vivienda',
            2 => 'Estudios',
            3 => 'Vehículo',
            4 => 'Viaje'
        ];

        // Guardar crédito
        Credito::create([
            'cliente_id' => $cliente->id,
            'tipo_producto' => $request->tipo_producto,
            'valor_credito' => $request->valor_credito,
            'plazo' => $request->plazo,
            'interes' => $interes,
            'total_pagar' => $totalPagar,
            'valor_cuota' => $valorCuota
        ]);

        return redirect('/')->with('credito', [
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'producto' => $productos[$request->tipo_producto],
            'valor_credito' => $request->valor_credito,
            'interes' => $interes,
            'total' => $totalPagar,
            'plazo' => $request->plazo,
            'cuota' => $valorCuota
        ]);
    }
}