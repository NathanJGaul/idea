<?php

use App\Models\User;

it('logs in a user', function() {
    // create a new user with the user factory
    $user = User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', 'password')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => $user->name,
        'email' => $user->email,
    ]);
});

it('logs out user', function() {
    // create a new user with the user factory
    $user = User::factory()->create();

    $this->actingAs($user);

    $this->assertAuthenticated();

    visit('/')
        ->click('@logout-button')
        ->assertPathIs('/');

    $this->assertGuest();
});
