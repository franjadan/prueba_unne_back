<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\TeacherResource;
use App\Repositories\v1\Teacher\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    /**
     * Constructor de la clase.
     *
     * @param \StudyRepositoryInterface $repository Repositorio de profesores que se inyecta automáticamente.
     */
    public function __construct(public TeacherRepositoryInterface $repository){}

    /**
     * Devuelve una lista de profesores en formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene una colección de recursos de profesores.
     */
    public function index()
    {
        $teachers = $this->repository->index();

        return response()->json(TeacherResource::collection($teachers));
    }
}
