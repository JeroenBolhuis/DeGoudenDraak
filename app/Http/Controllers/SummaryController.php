<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SummaryController extends Controller
{
    public function index()
    {
        $files = File::files(public_path('storage/summaries'));
        return view('backend.admin.summaries.index', compact('files'));
    }

    public function download($file)
    {
        return response()->download(public_path('storage/summaries/' . $file));
    }
}
