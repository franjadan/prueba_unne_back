<?php

namespace App\Repositories\v1\Subject;

use App\Models\v1\Subject;

class SubjectRepository implements SubjectRepositoryInterface
{
    /**
     * Obtiene y devuelve una lista de todos las asignaturas.
     *
     * @return \Illuminate\Database\Eloquent\Collection Colección que contiene todos las asignaturas en la base de datos.
     */
    public function index()
    {
        return Subject::all();
    }

    public function getByStudy(int $id)
    {
        return Subject::where('study_id', $id)->get();
    }
}
