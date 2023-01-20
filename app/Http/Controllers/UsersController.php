<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShareRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = auth()->user()->users;
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreShareRequest $request)
    {
        $user = User::where('id', auth()->user()->id)->first();

        $share = User::where('email', $request->validated())->first()->id;

        if ($user->users()->where('share_to_user_id', $share)->exists()) {
            return redirect()->back()->with('error', __('share_already_exists'));
        }

        $user->users()->sync($share, false);

        return redirect()->route('users.index')->with('success', __('share_created_successfully'));
    }

    public function destroy($id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user->users()->detach($id);

        return redirect()->route('users.index')->with('success', __('share_deleted_successfully'));
    }
}
