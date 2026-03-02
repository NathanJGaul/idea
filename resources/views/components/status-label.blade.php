@props(['status' => \App\IdeaStatus::PENDING])

@php
    $status = $status instanceof \App\IdeaStatus ? $status : \App\IdeaStatus::tryFrom($status) ?? \App\IdeaStatus::PENDING;

    $classes = match ($status) {
        \App\IdeaStatus::PENDING => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
        \App\IdeaStatus::IN_PROGRESS => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
        \App\IdeaStatus::COMPLETED => 'bg-green-500/10 text-green-500 border-green-500/20',
        default => 'bg-gray-500/10 text-gray-500 border-gray-500/20',
    };
@endphp

<span {{ $attributes->class(['inline-block rounded-full px-2 py-1 text-xs font-medium border', $classes]) }}>
    {{ $slot }}
</span>
