<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreComentRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Coment;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Coment::all();

        $data = DB::table('coments')->paginate(12);

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentRequest $request)
    {
        $coment = $request->all();

        Coment::create($coment);

        return response()->json(['msg' => 'Comentário cadastrado com sucesso!', 'data' => $coment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comentRequest = $request->all();

        $coment = Coment::findOrFail($id);

        $coment->update($comentRequest);

        return response()->json(['msg' => 'Comentário atualizado com sucesso!', 'data' => $coment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coment = Coment::find($id);

        $coment->delete();

        return response()->json(['msg' => 'Comentário excluído com sucesso!', 'data' => $coment]);
    }
}
