<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class SharedFilesController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $users = $user->shares;

        $users->each(function ($user) use (&$files) {
            $files = $user->files->map(function ($item) {
                return $item;
            });
        });


        if (request()->has('user')) {
            $files = User::where('id', request()->user)->first()->files;
        }

        return view(
            'shared_files.index',
            [
                'users' => $users,
                'files' => $files ?? [],
            ]
        );
    }
}
