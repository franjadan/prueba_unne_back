<?php

namespace App\Repositories\v1\Teacher;

use App\Models\v1\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{
    /**
     * Obtiene y devuelve una lista de todos los profesores.
     *
     * @return \Illuminate\Database\Eloquent\Collection Colección que contiene todos los profesores en la base de datos.
     */
    public function index()
    {
        return Teacher::all();
    }
}
