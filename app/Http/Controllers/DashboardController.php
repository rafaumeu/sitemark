<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('dashboard', ['user' => $user, 'links' => $user->links()->orderBy('sort')->get()]);
    }
}
