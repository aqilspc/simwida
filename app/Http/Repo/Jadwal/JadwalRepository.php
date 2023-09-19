<?php
namespace App\Http\Repo\Jadwal;
interface JadwalRepository
{
    public function store($request);
    public function getAll($keyword);
    public function getDetail($id);
    public function delete($id);
    public function update($request, $id);
}