<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'kode_produk' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);
        $newData = new Produk($validateData);
        if ($newData->save()) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'data' => $newData,
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => false,
            ], 400);
        }
    }

    public function list()
    {
        $listData = Produk::all();
        if ($listData != null) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'data' => $listData,
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => 'No data yet',
            ], 400);
        }
    }

    public function show($id)
    {
        $showData = Produk::all()->find($id);
        if ($showData != null) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'data' => $showData,
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => false,
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kode_produk' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);
        $updateData = Produk::findOrFail($id);
        $check = $updateData->update([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
        ]);
        if ($check) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'data' => $updateData,
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => false,
            ], 400);
        }
    }

    public function delete($id)
    {
        $deleteData = Produk::all()->find($id);
        if ($deleteData->delete()) {
            return response()->json([
                'code' => 200,
                'status' => true,
                'data' => true,
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => 'Error occured',
                'data' => false,
            ], 400);
        }
    }
}