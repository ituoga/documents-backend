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
        $document_directions = config('site.document_directions');
        return view('files.create', compact('document_directions'));
    }

    public function edit(File $file)
    {
        $document_directions = config('site.document_directions');
        return view('files.edit', compact('file', 'document_directions'));
    }

    public function store(StoreFileRequest $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $item) {
                $file = File::create($request->validated());
                $file->addFile($item);
            }
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
