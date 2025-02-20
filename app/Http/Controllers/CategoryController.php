<?php


namespace App\Http\Controllers;

use App\Services\AlephService;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    protected $alephService;

    public function __construct(AlephService $alephService)
    {
        $this->alephService = $alephService;
    }

    public function index()
    {
        // Obtener las categorías a través del servicio
        $categorias = $this->alephService->getCategories();

        // Verificamos si la respuesta tiene categorías
        if ($categorias && !isset($categorias->error)) {
            return view('categories.index', ['categorias' => $categorias]);
        }

        return view('categories.index', ['error' => 'No se pudieron obtener las categorías.']);
    }
}
