<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FileController extends BaseController
{

    public function __construct()
    {
        parent::__construct(['show']);
    }

    public function index()
    {
        $files = Storage::disk('public')->files();
        $collection = collect($files);

        $filtered = $collection->filter(function ($file) {
            return strpos($file, '.') !== 0;
        });

        $transformed = $filtered->map(function ($file) {
            return [
                'name' => $file,
                'url' => URL::to('/uploads/' . $file)
            ];
        });

        return $this->adminView('files', [
            'files' => $transformed
        ]);
    }

    public function upload(UploadFileRequest $request)
    {

        $file = $request->file('file');

        $file->move(storage_path() . '/app/public', $file->getClientOriginalName());

        return redirect('/admin/files');
    }

    public function show($name)
    {
        $file = Storage::disk('public')->get($name);
        $mimeType = Storage::disk('public')->mimeType($name);

        return response($file, 200, [
            'Content-Type' => $mimeType
        ]);
    }

    public function delete($name)
    {
        Storage::disk('public')->delete($name);

        return response()->json(true);
    }

}