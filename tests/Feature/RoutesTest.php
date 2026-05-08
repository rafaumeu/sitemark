<?php

declare(strict_types = 1);

use App\Models\User;

describe('guest routes', function () {
    test('login page is accessible', function () {
        $this->get(route('login'))
            ->assertOk();
    });

    test('register page is accessible', function () {
        $this->get(route('register'))
            ->assertOk();
    });

    test('guest is redirected from dashboard to login', function () {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    });

    test('guest is redirected from links create to login', function () {
        $this->get(route('links.create'))
            ->assertRedirect(route('login'));
    });

    test('guest is redirected from profile to login', function () {
        $this->get(route('profile'))
            ->assertRedirect(route('login'));
    });

    test('guest can register', function () {
        $response = $this->post(route('register'), [
            'name'               => 'John',
            'surname'            => 'Doe',
            'email'              => 'john@example.com',
            'email_confirmation' => 'john@example.com',
            'password'           => 'password123',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    });

    test('registration requires valid data', function () {
        $this->post(route('register'), [])
            ->assertSessionHasErrors(['name', 'surname', 'email', 'password']);
    });

    test('guest can login with valid credentials', function () {
        $user = User::factory()->create(['password' => bcrypt('password123')]);

        $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'password123',
        ])->assertRedirect(route('dashboard'));
    });

    test('guest cannot login with invalid credentials', function () {
        $user = User::factory()->create();

        $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'wrong-password',
        ])->assertSessionHas('mensagem');
    });
});

describe('authenticated routes', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    });

    test('dashboard is accessible', function () {
        $this->get(route('dashboard'))
            ->assertOk();
    });

    test('profile page is accessible', function () {
        $this->get(route('profile'))
            ->assertOk();
    });

    test('links create page is accessible', function () {
        $this->get(route('links.create'))
            ->assertOk();
    });

    test('user can store a new link', function () {
        $this->post(route('links.store'), [
            'link' => 'https://example.com',
            'name' => 'Example Link',
        ])->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('links', [
            'link'    => 'https://example.com',
            'name'    => 'Example Link',
            'user_id' => $this->user->id,
        ]);
    });

    test('store link requires valid data', function () {
        $this->post(route('links.store'), [])
            ->assertSessionHasErrors(['link', 'name']);
    });

    test('user can view their own link edit page', function () {
        $link = $this->user->links()->create([
            'link' => 'https://example.com',
            'name' => 'My Link',
            'sort' => 0,
        ]);

        $this->get(route('links.edit', $link))
            ->assertOk();
    });

    test('user can update their own link', function () {
        $link = $this->user->links()->create([
            'link' => 'https://example.com',
            'name' => 'Old Name',
            'sort' => 0,
        ]);

        $this->put(route('links.edit', $link), [
            'link' => 'https://updated.com',
            'name' => 'Updated Name',
        ])->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('links', [
            'id'   => $link->id,
            'link' => 'https://updated.com',
            'name' => 'Updated Name',
        ]);
    });

    test('user can delete their own link', function () {
        $link = $this->user->links()->create([
            'link' => 'https://example.com',
            'name' => 'To Delete',
            'sort' => 0,
        ]);

        $this->delete(route('links.destroy', $link))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseMissing('links', ['id' => $link->id]);
    });

    test('user cannot edit another users link', function () {
        $otherUser = User::factory()->create();
        $link      = $otherUser->links()->create([
            'link' => 'https://example.com',
            'name' => 'Other Link',
            'sort' => 0,
        ]);

        $this->get(route('links.edit', $link))
            ->assertForbidden();
    });

    test('user can logout', function () {
        $this->get(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    });
});

describe('biolink route', function () {
    test('biolink page is accessible by handler', function () {
        $user = User::factory()->create(['handler' => 'johndoe']);

        $this->get('/johndoe')
            ->assertOk();
    });
});
