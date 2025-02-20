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
        $categorias = $this->alephService->getCategories();

        if ($categorias && !isset($categorias->error)) {
            return view('categories.index', ['categorias' => $categorias]);
        }

        return view('categories.index', ['error' => 'No se pudieron obtener las categorías.']);
    }

    public function showCmdbRecords($id)
    {
        $cmdb = $this->alephService->getCmdbRecords($id);
        return view('categories.cmdb_records', compact('cmdb'));
    }

}
