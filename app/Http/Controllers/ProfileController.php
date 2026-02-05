<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('profile', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * @property-read UploadedFile $photo
     */
    public function update(ProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        if ($file = $request->photo) {
            $data['photo'] = $file->store('photos');
        }
        $user->fill($data)->save();

        return back()->with('message', 'Perfil atualizado com sucesso!');
    }
}
