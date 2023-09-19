<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repo\Kampus\KampusRepository;
use App\Http\Repo\Kampus\JurusanRepository;

class Jurusan extends Controller
{
    private KampusRepository $queryKampus;
    private JurusanRepository $queryJurusan;
    public function __construct(KampusRepository $queryKampus,JurusanRepository $queryJurusan)
    {
        $this->middleware('auth');
        $this->queryKampus = $queryKampus;
        $this->queryJurusan = $queryJurusan;
    }

    public function index(Request $request)
    {
        $data = $this->queryJurusan->getAll($request);
        return view('jurusan.index',compact('data'));
    }

    public function create()
    {
        $kampus = $this->queryKampus->getList();
        return view('jurusan.create',compact('kampus'));
    }

    public function store(Request $request)
    {
        $this->queryJurusan->store($request);
        return redirect('jurusan')->with('success','Berhasil membuat data jurusan');
    }

    public function edit($id)
    {
        $data = $this->queryJurusan->getOne($id);
        $kampus = $this->queryKampus->getList();
        return view('jurusan.edit',compact('data','kampus'));
    }

    public function update(Request $request,$id)
    {
        $this->queryJurusan->update($request,$id);
        return redirect('jurusan')->with('success','Berhasil mengubah data jurusan');
    }

    public function delete($id)
    {
        $this->queryJurusan->delete($id);
        return redirect('jurusan')->with('success','Berhasil menghapus data jurusan');
    }
}