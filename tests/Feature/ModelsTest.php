<?php

declare(strict_types=1);

use App\Models\Link;
use App\Models\User;

describe('User model', function () {
    test('can create a user using factory', function () {
        $user = User::factory()->create();

        expect($user)->toBeInstanceOf(User::class)
            ->and($user->id)->not->toBeNull()
            ->and($user->email)->not->toBeEmpty();
    });

    test('user has links relationship', function () {
        $user = User::factory()->create();
        $link = $user->links()->create([
            'link' => 'https://example.com',
            'name' => 'Test Link',
            'sort' => 0,
        ]);

        expect($user->links)->toHaveCount(1)
            ->and($user->links->first()->id)->toBe($link->id);
    });

    test('user hides password and remember token', function () {
        $user = User::factory()->create();

        $json = $user->toArray();

        expect($json)->not->toHaveKey('password')
            ->and($json)->not->toHaveKey('remember_token');
    });

    test('user password is hashed', function () {
        $user = User::factory()->create(['password' => 'plaintext']);

        expect($user->password)->not->toBe('plaintext');
    });
});

describe('Link model', function () {
    test('can create a link using factory', function () {
        $user = User::factory()->create();
        $link = Link::factory()->create(['user_id' => $user->id]);

        expect($link)->toBeInstanceOf(Link::class)
            ->and($link->id)->not->toBeNull()
            ->and($link->user_id)->toBe($user->id);
    });

    test('link belongs to user', function () {
        $user = User::factory()->create();
        $link = Link::factory()->create(['user_id' => $user->id]);

        expect($link->user)->toBeInstanceOf(User::class)
            ->and($link->user->id)->toBe($user->id);
    });

    test('link moveUp swaps sort with previous link', function () {
        $user = User::factory()->create();
        $linkA = $user->links()->create(['link' => 'https://a.com', 'name' => 'A', 'sort' => 0]);
        $linkB = $user->links()->create(['link' => 'https://b.com', 'name' => 'B', 'sort' => 1]);

        $linkB->moveUp();

        expect($linkB->fresh()->sort)->toBe(0)
            ->and($linkA->fresh()->sort)->toBe(1);
    });

    test('link moveDown swaps sort with next link', function () {
        $user = User::factory()->create();
        $linkA = $user->links()->create(['link' => 'https://a.com', 'name' => 'A', 'sort' => 0]);
        $linkB = $user->links()->create(['link' => 'https://b.com', 'name' => 'B', 'sort' => 1]);

        $linkA->moveDown();

        expect($linkA->fresh()->sort)->toBe(1)
            ->and($linkB->fresh()->sort)->toBe(0);
    });

    test('moveUp does nothing when already first', function () {
        $user = User::factory()->create();
        $link = $user->links()->create(['link' => 'https://a.com', 'name' => 'A', 'sort' => 0]);

        $link->moveUp();

        expect($link->fresh()->sort)->toBe(0);
    });

    test('moveDown does nothing when already last', function () {
        $user = User::factory()->create();
        $link = $user->links()->create(['link' => 'https://a.com', 'name' => 'A', 'sort' => 0]);

        $link->moveDown();

        expect($link->fresh()->sort)->toBe(0);
    });

    test('link is deleted when user is deleted', function () {
        $user = User::factory()->create();
        $link = Link::factory()->create(['user_id' => $user->id]);

        $user->delete();

        expect(Link::find($link->id))->toBeNull();
    });

    test('link fillable attributes', function () {
        $link = new Link();

        expect($link->getFillable())->toContain('link', 'name');
    });
});
