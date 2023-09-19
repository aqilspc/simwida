<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repo\Prodi\ProdiRepository;
use App\Http\Repo\Prodi\JurusanRepository;

class Prodi extends Controller
{
    private ProdiRepository $queryProdi;
    private JurusanRepository $queryJurusan;
    public function __construct(ProdiRepository $queryProdi,JurusanRepository $queryJurusan)
    {
        $this->middleware('auth');
        $this->queryProdi = $queryProdi;
        $this->queryJurusan = $queryJurusan;
    }

    public function index(Request $request)
    {
        $data = $this->queryJurusan->getAll($request);
        return view('prodi.index',compact('data'));
    }

    public function create()
    {
        $jurusan = $this->queryProdi->getList();
        return view('prodi.create',compact('jurusan'));
    }

    public function store(Request $request)
    {
        $this->queryProdi->store($request);
        return redirect('prodi')->with('success','Berhasil membuat data prodi');
    }

    public function edit($id)
    {
        $data = $this->queryProdi->getOne($id);
        $jurusan = $this->queryJurusan->getList();
        return view('prodi.edit',compact('data','jurusan'));
    }

    public function update(Request $request,$id)
    {
        $this->queryProdi->update($request,$id);
        return redirect('prodi')->with('success','Berhasil mengubah data prodi');
    }

    public function delete($id)
    {
        $this->queryProdi->delete($id);
        return redirect('prodi')->with('success','Berhasil menghapus data prodi');
    }
}