<?php

namespace App\Repositories\v1\Study;

interface StudyRepositoryInterface
{
    public function index();
    public function find(int $id);
    public function store(array  $data);
    public function update(int $id, array $data);
    public function destroy(int $id);
}
