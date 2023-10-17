<?php

namespace App\Repositories\v1\SubjectTeacher;

interface SubjectTeacherRepositoryInterface
{
    public function index();
    public function getBySubject(int $id);
    public function getByTeacher(int $id);

}
