<?php
namespace App\Http\Repo\Kampus;
use DB;
use Carbon\Carbon;
class KampusQuery implements KampusRepository
{
    private $createdAt;
    public function __construct()
    {
        $this->createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    }
    public function getAll($request)
    {
        $get = DB::table('kampus');
        if($request->keyword != null)
        {
            $get->where('nama', 'like', '%' . $request->keyword . '%');
        }
        $data = $get->paginate(10);
        return $data;
    }

    public function getOne($id)
    {
        $data = DB::table('kampus')->where('id',$id)->first();
        return $data;
    }

    public function getList()
    {
        $data = DB::table('kampus')->select('id','nama')->get();
        return $data;
    }

    public function store($request)
    {
       DB::table('kampus')->insert([
            'nama'=> $request->nama,
            'created_at'=> $this->createdAt
        ]);
    }

    public function update($request,$id)
    {
       DB::table('kampus')->where('id',$id)->update([
            'nama'=> $request->nama,
            'updated_at'=> $this->createdAt
        ]);
    }

    public function delete($id)
    {
       DB::table('kampus')->where('id',$id)->delete();
    }
}