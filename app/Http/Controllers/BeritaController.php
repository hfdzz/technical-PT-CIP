<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Berita::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'isi' => 'required|string',
            'artis_id' => 'required|integer',
            'kategori_berita_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $berita = Berita::create(
            [
                ...$request->all(),
                'penulis_id' => auth('api')->id(),
            ]
        );

        return response()->json($berita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        // with redis
        // return $berita;
        return Redis::get('berita:' . $berita->id) ?? $berita;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'string|nullable',
            'isi' => 'string|nullable',
            'artis_id' => 'integer|nullable',
            'kategori_berita_id' => 'integer|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $berita->update([
            ...$request->all(),
            'penulis_id' => auth('api')->id(),
        ]);

        return response()->json($berita, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if (!$berita) {
            return response()->json(null, 404);
        }

        $berita->delete();

        return response()->json(null, 204);
    }
}
