<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Models\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        return view('files.index');
    }

    public function create()
    {
        return view('files.create');
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
