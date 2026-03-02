<?php

test('it renders pending status correctly', function () {
    $view = $this->blade('<x-status-label status="pending">Pending</x-status-label>');

    $view->assertSee('Pending');
    $view->assertSee('bg-yellow-500/10');
    $view->assertSee('text-yellow-500');
    $view->assertSee('border-yellow-500/20');
});

test('it renders in_progress status correctly', function () {
    $view = $this->blade('<x-status-label status="in_progress">In Progress</x-status-label>');

    $view->assertSee('In Progress');
    $view->assertSee('bg-blue-500/10');
    $view->assertSee('text-blue-500');
    $view->assertSee('border-blue-500/20');
});

test('it renders completed status correctly', function () {
    $view = $this->blade('<x-status-label status="completed">Completed</x-status-label>');

    $view->assertSee('Completed');
    $view->assertSee('bg-green-500/10');
    $view->assertSee('text-green-500');
    $view->assertSee('border-green-500/20');
});

test('it renders using enum instance', function () {
    $status = \App\IdeaStatus::COMPLETED;
    $view = $this->blade('<x-status-label :status="$status">Completed</x-status-label>', ['status' => $status]);

    $view->assertSee('Completed');
    $view->assertSee('bg-green-500/10');
});
