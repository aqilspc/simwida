<?php
namespace App\Http\Repo\Jurusan;
interface JurusanRepository
{
    public function store($request);
    public function getAll($keyword);
    public function getList($kampusId);
    public function getOne($id);
    public function delete($id);
    public function update($request, $id);
}