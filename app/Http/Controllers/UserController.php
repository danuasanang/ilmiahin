<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;

// use Barryvdh\DomPDF\PDF;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard', [
            'title' => 'Ilmiah | Dashboard',
        ]);
    }

    public function makalah()
    {
        return view('pages.makalah', [
            'title' => 'Ilmiah | Makalah',
        ]);
    }

    public function pdfExport(Request $request)
    {

        $logo = $request->logo->getClientOriginalName();
        $request->logo->storeAs('public', $logo);

        $filename = $request->filename;
        $format = $request->format;

        $data = [
            'judul' => $request->judulCover,
            'logo' => $request->logo->getClientOriginalName(),
            'dosen' => $request->dosenCover,
            'penyusun' => $request->penyusunCover,
            'footer' => $request->footerCover,
        ];

        if ($format == 'pdf') {
            $pdf = PDF::loadView('pages.pdf', [
                'data' => $data,
            ])->setPaper('a4', 'portrait');
            return $pdf->stream($filename . '.pdf', $data);
        } else if ($format == 'doc') {
        }
    }
}
