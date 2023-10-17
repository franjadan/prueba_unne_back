<?php

namespace App\Repositories\v1\Subject;

interface SubjectRepositoryInterface
{
    public function index();
    public function getByStudy(int $id);
}
