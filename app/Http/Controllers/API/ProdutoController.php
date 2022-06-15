<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProdutoController extends Controller
{
    protected $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index()
    {
        $produtos = $this->produto->get();

        return Response::json($produtos);
    }

    public function show($id)
    {
        $produto = $this->produto->find($id);

        return Response::json($produto);
    }

    public function store(ProdutoRequest $request)
    {
        DB::beginTransaction();
        try {
            $return = $this->produto->create($request->validated());
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return Response::json($return = false);
        }
        
        return Response::json($return);
    }

    public function update(ProdutoRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $return = $this->produto->find($id)->update($request->validated());
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return Response::json($return = false);
        }
        
        return Response::json($return);
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $return = $this->produto->find($id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return Response::json($return = false);
        }

        return Response::json($return);
    }
}
