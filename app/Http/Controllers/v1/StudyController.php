<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\StudyResource;
use App\Repositories\v1\Study\StudyRepositoryInterface;
use App\Http\Requests\v1\StudyRequest;

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

    /**
     * Busca un estudio existente a través de su ID y devuelve una respuesta JSON.
     *
     * @param int $id El identificador del estudio que se va a obtener.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene el estudio obtenido.
     */
    public function show(int $id)
    {
        $study = $this->repository->find($id);

        return response()->json(new StudyResource($study));
    }

    /**
     * Almacena un nuevo estudio y devuelve una respuesta JSON.
     *
     * @param StudyRequest $request La solicitud de estudio validada.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene el estudio almacenado.
     */
    public function store(StudyRequest $request)
    {
        $study = $this->repository->store($request->validated());

        return response()->json([
            'study' => new StudyResource($study)
        ]);
    }

    /**
     * Actualiza un estudio existente y devuelve una respuesta JSON.
     *
     * @param StudyRequest $request La solicitud de estudio validada.
     * @param int $id El identificador del estudio que se va a actualizar.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON que contiene el estudio actualizado.
     */
    public function update(StudyRequest $request, int $id)
    {
        $study = $this->repository->update($id, $request->validated());

        return response()->json([
            'study' => new StudyResource($study)
        ]);
    }

    /**
     * Elimina un estudio y devuelve una respuesta JSON vacía.
     *
     * @param int $id El identificador del estudio que se va a eliminar.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON vacía.
     */
    public function destroy(int $id)
    {
        $this->repository->destroy($id);

        return response()->json();
    }
}
