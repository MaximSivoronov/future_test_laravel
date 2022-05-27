<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notebook\CreateRequest;
use App\Http\Requests\Notebook\UpdateRequest;
use App\Models\Notebook;

class NotebookController extends Controller
{
    public function getNotebooks()
    {
        $data = Notebook::all();
        return response()->json($data, 200);
    }

    public function storeNotebook(CreateRequest $request)
    {
        $data = $request->validated();
        $newNotebook = Notebook::create($data);
        return response()->json($newNotebook, 201);
    }

    public function getNotebook(Notebook $notebook)
    {
        return response()->json($notebook, 200);
    }

    public function updateNotebook(Notebook $notebook, UpdateRequest $request)
    {
        $data = $request->validated();
        $notebook->update($data);
        return response()->json($notebook, 200);
    }

    public function deleteNotebook(Notebook $notebook)
    {
        $notebook->delete();
        return response()->json(null, 204);
    }
}
