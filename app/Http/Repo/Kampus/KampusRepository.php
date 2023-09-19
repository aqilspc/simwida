<?php
namespace App\Http\Repo\Kampus;
interface KampusRepository
{
    public function store($request);
    public function getAll($keyword);
    public function getList();
    public function getOne($id);
    public function delete($id);
    public function update($request, $id);
}