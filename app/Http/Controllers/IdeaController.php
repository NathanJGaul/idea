<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $user = Auth::user();

        $status = $request->status;

        if (! in_array($status, IdeaStatus::values())) {
            $status = null;
        }

        $ideas = $user
            ->ideas()
            ->when($status, fn ($query, $status) => $query->where('status', $status))
            ->get();

        return view('ideas.index', [
            'ideas' => $ideas,
            'statusCounts' => Idea::statusCounts($user),
        ]);
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
