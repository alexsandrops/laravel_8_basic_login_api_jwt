<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CategoriaController extends Controller
{
    protected $categoria;

    public function __construct(categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index()
    {
        $return = $this->categoria->get();
        
        return Response::json($return);
    }

    public function store(CategoriaRequest $request)
    {
        DB::beginTransaction();
        try {
            $return = $this->categoria->create($request->validated());
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::json($return = false);
        }

        return Response::json($return);
    }

    public function show($id)
    {
        $return = $this->categoria->find($id);

        return Response::json($return);
    }

    public function update(CategoriaRequest $request, $id)
    {
        DB::beginTransaction();;
        try {
            $return = $this->categoria->find($id)->update($request->validated());
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
            $return = $this->categoria->find($id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return Response::json($return = false);
        }

        return Response::json($return);
    }
}
