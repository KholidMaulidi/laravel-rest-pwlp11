<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequests;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return MahasiswaResource::collection(Mahasiswa::all());
        return MahasiswaResource::collection(Mahasiswa::orderBy('nim', 'asc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequests $request)
    {
        // return response()->json('hello');
        return new MahasiswaResource(Mahasiswa::create(
            [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'no_handphone' => $request->no_handphone,
            ]
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource($mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'no_handphone' => $request->no_handphone,
            'kelas' => $request->kelas,
        ]);
        return new MahasiswaResource($mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
        $mahasiswa->delete();
        return response()->noContent();
    }
}
