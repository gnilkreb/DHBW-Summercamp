<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;

class FileController extends BaseController
{

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

    public function delete($name)
    {
        Storage::disk('public')->delete($name);

        return response()->json(true);
    }

}