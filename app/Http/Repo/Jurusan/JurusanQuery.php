<?php
namespace App\Http\Repo\Jurusan;
use DB;
use Carbon\Carbon;
class JurusanQuery implements KampusRepository
{
    private $createdAt;
    public function __construct()
    {
        $this->createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    }
    public function getAll($request)
    {
        $get = DB::table('jurusan as jrs');
        $get->leftjoin('kampus as kmps','kmps.id','=','jrs.kampus_id');
        if($request->keyword != null)
        {
            $get->where('jrs.nama', 'like', '%' . $request->keyword . '%');
        }
        $get->select('jrs.*','kmps.nama as kampus');
        $data = $get->paginate(10);
        return $data;
    }

    public function getOne($id)
    {
        $data = DB::table('jurusan')->where('id',$id)->first();
        return $data;
    }

    public function getList($kampusId)
    {
        $data = DB::table('jurusan')->where('kampus_id',$kampusId)->select('id','nama')->get();
        return $data;
    }

    public function store($request)
    {
       DB::table('jurusan')->insert([
            'kampus_id'=> $request->kampus_id,
            'nama'=> $request->nama,
            'created_at'=> $this->createdAt
        ]);
    }

    public function update($request,$id)
    {
       DB::table('jurusan')->where('id',$id)->update([
            'kampus_id'=> $request->kampus_id,
            'nama'=> $request->nama,
            'updated_at'=> $this->createdAt
        ]);
    }

    public function delete($id)
    {
       DB::table('jurusan')->where('id',$id)->delete();
    }
}