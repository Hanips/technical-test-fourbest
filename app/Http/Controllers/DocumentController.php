<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function upload(Request $request) {
        $request->validate([
            'file_zip' => 'required|file|mimes:zip',
        ]);
    
        $zip = new \ZipArchive;
        $zip->open($request->file('file_zip'));
    
        // Extract ZIP file and process each file
        // Map Excel data to corresponding PDF files using ID_SISTEM
    }
    
}
