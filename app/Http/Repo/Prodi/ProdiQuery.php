<?php
namespace App\Http\Repo\Prodi;
use DB;
use Carbon\Carbon;
class ProdiQuery implements KampusRepository
{
    private $createdAt;
    public function __construct()
    {
        $this->createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    }
    public function getAll($request)
    {
        $get = DB::table('prodi as pd');
        $get->leftjoin('jurusan as jrs','jrs.id','=','pd.jurusan_id');
        if($request->keyword != null)
        {
            $get->where('pd.nama', 'like', '%' . $request->keyword . '%');
        }
        $get->select('pd.*','jrs.nama as jurusan');
        $data = $get->paginate(10);
        return $data;
    }

    public function getOne($id)
    {
        $data = DB::table('prodi')->where('id',$id)->first();
        return $data;
    }

    public function getList($jurusanId)
    {
        $data = DB::table('prodi')->where('jurusan_id',$jurusanId)->select('id','nama','jenjang')->get();
        return $data;
    }

    public function store($request)
    {
       DB::table('prodi')->insert([
            'jurusan_id'=> $request->jurusan_id,
            'jenjang'=> $request->jenjang,
            'nama'=> $request->nama,
            'created_at'=> $this->createdAt
        ]);
    }

    public function update($request,$id)
    {
       DB::table('prodi')->where('id',$id)->update([
            'jurusan_id'=> $request->jurusan_id,
            'jenjang'=> $request->jenjang,
            'nama'=> $request->nama,
            'updated_at'=> $this->createdAt
        ]);
    }

    public function delete($id)
    {
       DB::table('prodi')->where('id',$id)->delete();
    }
}