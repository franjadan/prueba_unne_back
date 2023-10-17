<?php

namespace App\Repositories\v1\SubjectTeacher;

use App\Models\v1\SubjectTeacher;

class SubjectTeacherRepository implements SubjectTeacherRepositoryInterface
{
    /**
     * Obtiene y devuelve una lista de todos los registros de asignaturas asociadas a profesores.
     *
     * @return \Illuminate\Database\Eloquent\Collection Colección que contiene todos los registros de asignaturas asociadas a profesores en la base de datos.
     */
    public function index()
    {
        return SubjectTeacher::all();
    }

    /**
     * Obtiene y devuelve una lista de registros de asignaturas asociadas a profesores que corresponden a una asignatura específico.
     *
     * @param int $id El identificador de la asignatura.
     * @return \Illuminate\Database\Eloquent\Collection Colección que contiene registros de asignaturas asociadas a profesores asociados a la asignatura.
     */
    public function getBySubject(int $id)
    {
        return SubjectTeacher::where('subject_id', $id)->get();
    }

    /**
     * Obtiene y devuelve una lista de registros de asignaturas asociadas a profesores que corresponden a un profesor específico.
     *
     * @param int $id El identificador del profesor.
     * @return \Illuminate\Database\Eloquent\Collection Colección que contiene registros de asignaturas asociadas a profesores asociados al profesor.
     */
    public function getByTeacher(int $id)
    {
        return SubjectTeacher::where('teacher_id', $id)->get();
    }

}
