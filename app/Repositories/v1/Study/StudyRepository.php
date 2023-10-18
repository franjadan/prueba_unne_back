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

    /**
     * Encuentra un estudio por su ID y lo devuelve.
     *
     * @param int $id El identificador del estudio a buscar.
     *
     * @return Study El estudio encontrado.
     */
    public function find(int $id)
    {
        return Study::findOrFail($id);
    }

    /**
     * Almacena un nuevo estudio con los datos proporcionados y lo devuelve.
     *
     * @param array $data Los datos del estudio a almacenar.
     *
     * @return Study El estudio almacenado.
     */
    public function store(array $data)
    {
        $study = Study::create($data);
        return $study;
    }

    /**
     * Actualiza un estudio existente con los datos proporcionados y lo devuelve.
     *
     * @param int $id El identificador del estudio a actualizar.
     * @param array $data Los datos del estudio a actualizar.
     *
     * @return Study El estudio actualizado.
     */
    public function update(int $id, array $data)
    {
        $study = $this->find($id);

        $study->update($data);

        return $study;
    }

    /**
     * Elimina un estudio por su ID.
     *
     * @param int $id El identificador del estudio a eliminar.
     */
    public function destroy(int $id)
    {
        $study = $this->find($id);
        $study->delete();
    }
}
