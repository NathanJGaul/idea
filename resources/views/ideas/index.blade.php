<x-layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">Ideas</h1>
            <p class="text-muted-foreground text-sm mt-2">Capture your thoughts. Make a plan.</p>
        </header>

        <form action="{{ route('idea.index') }}" method="GET" class="flex gap-2 mt-4">
            <input class="btn" type="radio" name="status" value="pending" aria-label="Pending"
                   onchange="this.form.submit()"/>
            <input class="btn" type="radio" name="status" value="in_progress" aria-label="In Progress"
                onchange="this.form.submit()"/>
            <input class="btn" type="radio" name="status" value="completed" aria-label="Completed"
                onchange="this.form.submit()"/>
            <button class="btn btn-square" type="button" onclick="window.location.href='{{ route('idea.index') }}'"
                    aria-label="All">×</button>
        </form>

        <div class="grid md:grid-cols-2 gap-6 mt-10 text-muted-foreground">
                @forelse($ideas as $idea)
                    <x-card href="{{ route('idea.show', $idea) }}">
                        <h3 class="text-foreground text-lg">{{ $idea->title }}</h3>
                        <div class="mt-2">
                            <x-status-label :status="$idea->status">{{ $idea->status->label() }}</x-status-label>
                        </div>
                        <div class="mt-5 line-clamp-3">{{ $idea->description }}</div>

                        <div class="mt-4">{{ $idea->created_at->diffForHumans() }}</div>
                    </x-card>
                @empty
                    <x-card><p>No ideas at this time.</p></x-card>

                @endforelse
        </div>
    </div>
</x-layout>
