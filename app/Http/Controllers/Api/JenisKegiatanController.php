<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\JenisKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisKegiatanController extends ApiController
{
    public function index()
    {
        $data = JenisKegiatan::all();

        return $this->sendResponse("Daftar jenis kegiatan", $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|min:1|max:50|unique:jenis_kegiatans,nama',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            foreach ($errors as $field => $messages) {
                $errors[$field] = $messages[0];
            }
            return $this->sendError("Validate error", $errors);
        }

        $inp = $request->only('nama', 'deskripsi');
        $jenisKegiatan = JenisKegiatan::create($inp);

        return $this->sendCreatedResponse("Jenis kegiatan berhasil dibuat", $jenisKegiatan);
    }

    public function show(string $id)
    {
        $jenisKegiatan = JenisKegiatan::find($id);

        if (!$jenisKegiatan) {
            return $this->sendError("Jenis kegiatan tidak ditemukan", null, 404);
        }

        return $this->sendResponse("Detail jenis kegiatan", $jenisKegiatan);
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required|min:1|max:50|unique:jenis_kegiatans,nama,' . $id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            foreach ($errors as $field => $messages) {
                $errors[$field] = $messages[0];
            }
            return $this->sendError("Validate error", $errors);
        }

        $jenisKegiatan = JenisKegiatan::find($id);

        if (!$jenisKegiatan) {
            return $this->sendError("Jenis kegiatan tidak ditemukan", null, 404);
        }

        $inp = $request->only('nama', 'deskripsi');
        $jenisKegiatan->update($inp);

        return $this->sendResponse("Jenis kegiatan berhasil diupdate", $jenisKegiatan);
    }

    public function destroy(string $id)
    {
        $jenisKegiatan = JenisKegiatan::find($id);

        if (!$jenisKegiatan) {
            return $this->sendError("Jenis kegiatan tidak ditemukan", null, 404);
        }

        $jenisKegiatan->delete();

        return $this->sendResponse("Jenis kegiatan berhasil dihapus");
    }
}
