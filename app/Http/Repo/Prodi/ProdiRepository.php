<?php
namespace App\Http\Repo\Prodi;
interface ProdiRepository
{
    public function store($request);
    public function getAll($keyword);
    public function getList($jurusanId);
    public function getOne($id);
    public function delete($id);
    public function update($request, $id);
}