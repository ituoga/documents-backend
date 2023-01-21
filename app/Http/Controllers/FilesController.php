<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFileRequest;

class FilesController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $files = $user->files()->latest()->paginate(10);
        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function edit(File $file)
    {
        return view('files.edit', compact('file'));
    }

    public function store(StoreFileRequest $request)
    {
        $file = File::create($request->validated());

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file->addFile($request->file('file'));
        }

        return redirect()->route('files.index')->with('success', __('file_created_successfully'));
    }

    public function update(StoreFileRequest $request, File $file)
    {
        $file->update($request->validated());

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file->addMediaFromRequest('file')->toMediaCollection('files', 'minio');
        }

        return redirect()->route('files.index')->with('success', __('file_updated_successfully'));
    }

    public function destroy(File $file)
    {
        $file->delete();

        return redirect()->route('files.index')->with('success', __('file_deleted_successfully'));
    }
}
