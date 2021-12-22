<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\Posts\StorePostRequest;
use App\Http\Requests\Api\Posts\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Post::all();

        $data = DB::table('posts')->paginate(12);

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        // $validation = \Validator::make($request->all(), [

        //         'title' => 'required|unique:posts|min:3',
        //         'content' => 'required',
        // ]);

        // if($validation->fails()){

        //     return response()->json([$validation->errors()], 422);

        // }

        $data = $request->all();

        Post::create($data);

        return response()->json(['msg' => 'Dados cadastrados com sucesso!', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data = Post::findOrFail($id);

        return response()->json(['msg' => 'Exibindo postagem' . " $data->title", 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $dataRequest = $request->all();

        $data = Post::findOrFail($id);

        $data->update($dataRequest);

        return response()->json(['msg' => 'Dados atualizados com sucesso!', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);

        $data->delete();

        return response()->json(['msg' => 'Dados excluídos com sucesso!', 'data' => $data]);
    }
}
