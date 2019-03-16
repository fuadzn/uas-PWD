<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NasabahController extends Controller 
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'no_rekening' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|max:13',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $result = \App\Nasabah::create($request->all());
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data gagal ditambahkan',
                'result' => null
            ];
        }
    }

    public function read(Request $request)
    {
        $result = \App\Nasabah::all();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'no_rekening' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|max:13',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $nasabah = \App\Nasabah::find($id);
        if (empty($nasabah)) {
            return [
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }

        $result = $nasabah->update($request->all());
        if($result) {
            return [
                'status' => 'success',
                'message' => 'Data berhasil diubah',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data gagal diubah',
                'result' => null
            ];
        }
    }

    public function delete(Request $request, $id)
    {
        $nasabah = \App\Nasabah::find($id);
        if (empty($nasabah)) {
            return [
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }

        $result = $nasabah->delete($id);
        if($result) {
            return [
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data gagal dihapus',
                'result' => null
            ];
        }
    }

    public function detail ($id) {
        $nasabah = \App\Nasabah::find($id);

        if (empty($nasabah)) {
            return [
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }

        return [
            'status' => 'success',
            'result' => $nasabah
        ];
    }
}