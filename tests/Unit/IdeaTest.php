<?php

use App\Models\Idea;
use App\Models\User;

test('belongs to a user', function () {
    $idea = Idea::factory()->create();

    expect($idea->user)->toBeInstanceOf(User::class);
});

it('can have steps', function () {
    $idea = Idea::factory()->create();
    expect($idea->steps)->toBeEmpty();
    $idea->steps()->create(['description' => 'Test step']);
    expect($idea->fresh()->steps)->toHaveCount(1);
});

it('can be deleted', function () {
    $idea = Idea::factory()->create();
    $idea->delete();
    expect($idea->exists)->toBeFalse();
});
