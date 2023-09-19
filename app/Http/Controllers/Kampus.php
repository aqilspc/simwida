<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repo\Kampus\KampusRepository;

class Kampus extends Controller
{
    private KampusRepository $queryKampus;
    public function __construct(KampusRepository $queryKampus)
    {
        $this->middleware('auth');
        $this->queryKampus = $queryKampus;
    }

    public function index(Request $request)
    {
        $data = $this->queryKampus->getAll($request);
        return view('kampus.index',compact('data'));
    }

    public function create()
    {
        return view('kampus.create');
    }

    public function store(Request $request)
    {
        $this->queryKampus->store($request);
        return redirect('kampus')->with('success','Berhasil membuat data kampus');
    }

    public function edit($id)
    {
        $data = $this->queryKampus->getOne($id);
        return view('kampus.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $this->queryKampus->update($request,$id);
        return redirect('kampus')->with('success','Berhasil mengubah data kampus');
    }

    public function delete($id)
    {
        $this->queryKampus->delete($id);
        return redirect('kampus')->with('success','Berhasil menghapus data kampus');
    }
}