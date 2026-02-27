<?php

it('registers a new user', function() {
    visit('/register')
        ->fill('name', 'Test User')
        ->fill('email', 'test@user.com')
        ->fill('password', 'password')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'Test User',
        'email' => 'test@user.com',
    ]);
});

it('fails to register a new user due to invalid email', function() {
    visit('/register')
        ->fill('name', 'Test User')
        ->fill('email', 'test')
        ->fill('password', 'password')
        ->click('Create Account')
        ->assertPathIs('/register');
});

it('fails to register a new user due to name less than 4 characters long', function() {
    visit('/register')
        ->fill('name', 'Te')
        ->fill('email', 'test@user.com')
        ->fill('password', 'password')
        ->click('Create Account')
        ->assertPathIs('/register')
        ->assertSee('The name field must be at least 4 characters.');
});

it('fails to register a new user due to the password being less than 8 characters long', function() {
    visit('/register')
        ->fill('name', 'Test User')
        ->fill('email', 'test@user.com')
        ->fill('password', 'pass')
        ->click('Create Account')
        ->assertPathIs('/register')
        ->assertSee('The password field must be at least 8 characters.');
});
