<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Section;
use Illuminate\Support\Facades\View;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PDFController extends Controller
{
    public function pdf_checklist(Inspection $inspection)
    {
        $sections = Section::orderBy('order', 'asc')->get();
        $answers = $inspection->sorted_answers();
        $included_sections = Section::remove_empty($inspection, $sections);
//        return view('pdfs.inspection', compact('sections', 'answers', 'inspection', 'included_sections'));
        $view = View::make('pdfs.inspection', compact('sections', 'answers', 'inspection', 'included_sections'));
        $doc = Pdf::loadHtml($view)->setOption("enable-local-file-access", true)->setPaper('a4')->setOrientation('portrait');

        return $doc->download($inspection->job_number.'-'.$inspection->site.'-'.$inspection->client->client . '-Checklist.pdf');
    }

    public function pdf_tables(Inspection $inspection)
    {

        $inspection->load('batteries', 'battery_cells','transformers',
            'switchgears','tevs');
        $view = View::make('pdfs.tables', compact('inspection'));
        $doc = Pdf::loadHtml($view)->setOption("enable-local-file-access", true)->setPaper('a4')->setOrientation('landscape');
        return $doc->download('Inspection-Tables.pdf');
    }
}
