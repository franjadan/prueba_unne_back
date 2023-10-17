<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\SubjectResource;
use App\Repositories\v1\Subject\SubjectRepositoryInterface;

class SubjectController extends Controller
{
    /**
     * Constructor de la clase.
     *
     * @param \StudyRepositoryInterface $repository Repositorio de asignaturas que se inyecta automáticamente.
     */
    public function __construct(public SubjectRepositoryInterface $repository){}

    /**
     * Devuelve una lista de asignaturas en formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene una colección de recursos de asignaturas.
    */
    public function index()
    {
        $subjects = $this->repository->index();

        return response()->json(SubjectResource::collection($subjects));

    }

    /**
     * Obtiene y devuelve las materias asociadas a un asignaturas específico en formato JSON.
     *
     * @param int $id El identificador del asignaturas del cual se desean obtener las materias.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene una colección de recursos de materias.
     */
    public function getByStudy(int $id){

        $subjects = $this->repository->getByStudy($id);

        return response()->json(SubjectResource::collection($subjects));
    }
}
