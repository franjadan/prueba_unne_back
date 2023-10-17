<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\StudyResource;
use App\Repositories\v1\Study\StudyRepositoryInterface;

class StudyController extends Controller
{
    /**
     * Constructor de la clase.
     *
     * @param \StudyRepositoryInterface $repository Repositorio de estudios que se inyecta automáticamente.
     */
    public function __construct(public StudyRepositoryInterface $repository){}

    /**
     * Devuelve una lista de estudios en formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene una colección de recursos de estudio.
     */
    public function index()
    {
        $studies = $this->repository->index();

        return response()->json(StudyResource::collection($studies));

    }
}
