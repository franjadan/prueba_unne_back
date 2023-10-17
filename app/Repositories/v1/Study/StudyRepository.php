<?php

namespace App\Repositories\v1\Study;

use App\Models\v1\Study;

class StudyRepository implements StudyRepositoryInterface
{
    /**
     * Obtiene y devuelve una lista de todos los estudios.
     *
     * @return \Illuminate\Database\Eloquent\Collection Colección que contiene todos los estudios en la base de datos.
     */
    public function index()
    {
        return Study::all();
    }
}
