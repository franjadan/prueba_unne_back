<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\SubjectTeacherResource;
use App\Repositories\v1\SubjectTeacher\SubjectTeacherRepositoryInterface;

class SubjectTeacherController extends Controller
{
    /**
     * Constructor de la clase.
     *
     * @param \StudyRepositoryInterface $repository Repositorio de asignaturas asociadas a profesores que se inyecta automáticamente.
     */
    public function __construct(public SubjectTeacherRepositoryInterface $repository){}

    /**
     * Devuelve una lista de asignaturas asociadas a profesores en formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene una colección de recursos de asignaturas asociadas a profesores.
     */
    public function index()
    {
        $subjectTeachers = $this->repository->index();

        return response()->json(SubjectTeacherResource::collection($subjectTeachers));
    }
}
