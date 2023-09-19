<?php
namespace App\Http\Repo\Jadwal;
use DB;
use Carbon\Carbon;
class JadwalQuery implements KampusRepository
{
    private $createdAt;
    public function __construct()
    {
        $this->createdAt = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
    }
    public function getAll($request)
    {
        $get = DB::table('jadwal as jwdl');
        $data = $get->paginate(10);
        return $data;
    }

    public function getDetail($id)
    {
        $get = DB::table('jadwal as jwdl');
        $get->leftjoin('jadwal_item as jiwd','jiwd.jadwal_id','=','jwdl.id');
        $get->leftjoin('prodi as pd','pd.id','=','jiwd.prodi_id');
        $get->leftjoin('jurusan as jrs','jrs.id','=','pd.jurusan_id');
        $get->leftjoin('kampus as kmps','kmps.id','=','jrs.kampus_id');
        $get->where('jwdl.id',$id);
        $get->select('jwdl.*','pd.nama as prodi','jrs.nama as jurusan','kmps.nama as kampus','jiwd.kuota')
        $data = $get->first();
        return $data;
    }

    public function store($request)
    {
       DB::table('jadwal')->insert([
            'prodi_id'=> $request->prodi_id,
            'gelombang'=> $request->gelombang,
            'sesi'=> $request->sesi,
            'nama'=> $request->jenis,
            'tanggal'=> $request->tanggal,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'kuota'=> $request->kuota,
            'created_at'=> $this->createdAt
        ]);
    }

    public function update($request,$id)
    {
       DB::table('jadwal')->where('id',$id)->update([
            'prodi_id'=> $request->prodi_id,
            'gelombang'=> $request->gelombang,
            'sesi'=> $request->sesi,
            'nama'=> $request->jenis,
            'tanggal'=> $request->tanggal,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'kuota'=> $request->kuota,
            'updated_at'=> $this->createdAt
        ]);
    }

    public function delete($id)
    {
       DB::table('jadwal')->where('id',$id)->delete();
    }

    public function setKuota($request)
    {
        foreach ($request->prodi_id as $key => $value) 
        {
            DB::table('jadwal_item')->insert([
                'jadwal_id'=>$request->jadwal_id,
                'prodi_id'=>$request->prodi_id[$key],
                'kuota'=>$request->kuota[$key],
                'created_at'=>$this->createdAt
                'updated_at'=>$this->createdAt
            ]);
        }
    }
}