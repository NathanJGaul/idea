<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IdeaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Idea::class);

        return Idea::all();
    }

    public function store(IdeaRequest $request)
    {
        $this->authorize('create', Idea::class);

        return $request->user()->ideas()->create($request->validated());
    }

    public function show(Idea $idea): Idea
    {
        $this->authorize('view', $idea);

        return $idea;
    }

    public function update(IdeaRequest $request, Idea $idea): Idea
    {
        $this->authorize('update', $idea);

        $idea->update($request->validated());

        return $idea;
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return response()->json();
    }
}
