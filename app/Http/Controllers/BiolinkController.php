<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\User;

class BiolinkController extends Controller
{
    public function __invoke(User $user)
    {
        return view('bio-links', compact('user'));
    }
}
