<x-layout>
    <div class="py-4 max-w-4xl mx-auto">
        <div class="flex justify-between items-center">
            <a href="{{ route('idea.index') }}">Back to Ideas</a>

            <div class="gap-x-3 flex items-center">
                <button class="btn btn-ghost">Edit</button>
                <form action="{{ route('idea.destroy', ['idea' => $idea]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline text-red-500">Delete</button>
                </form>            </div>
        </div>
        <h1 class="text-xl font-bold mb-4">{{ $idea->title }}</h1>
        <x-card>
            <div class="text-foreground max-w-none cursor-pointer">{{ $idea->description }}</div>
        </x-card>
    </div>
</x-layout>
