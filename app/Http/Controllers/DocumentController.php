<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Inspection;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class DocumentController extends Controller
{
    public function create(Inspection $inspection){
//        $types = DocumentType::orderBy('type', 'asc')->get();
        $docs = $inspection->documents;
        return view('documents.create', compact('inspection', 'docs'));
    }

    public function upload(Inspection $inspection)
    {
        $data = request()->validate([
            'upload' => 'required|file|mimes:doc,docx,pdf,xls,xlsx,jpg,png,jpeg',
            'name' => 'required',
        ]);
        foreach($inspection->documents as $document){
            if($document->name == request('name'))
            {
                Session::flash('message', 'Document name already used for this inspection!');
                return redirect()->back()->withInput();
            }
        }
        $doc = new Document();
        $doc->inspection_id = $inspection->id;
        $doc->name = request('name');

        $file = request('upload');
        $doc->filename = $inspection->job_number.'-'.$file->getClientOriginalName();
        $doc->document_url = Storage::putFile('documents', $file);
        $doc->save();

        Session::flash('success','Document saved successfully!');
        return redirect()->action([InspectionController::class, 'index'], $inspection->client->id);
    }

    public function download($id){
        $doc = Document::findOrFail($id);
        if($doc->inspection->client_id == auth()->user()->client_id || auth()->user()->client_id == null)
        {
            return Storage::download('documents/' . basename($doc->document_url), $doc->filename);
        }
        else {
            Session::flash('message', 'You are not permitted to view the selected document!');
            return redirect()->action([InspectionController::class, 'index'], $doc->inspection->client->id);
        }
    }

    public function delete(Document $document){
        Storage::delete('documents/'.basename($document->document_url));
        $document->delete();
        return redirect()->action([InspectionController::class, 'index'], $document->inspection->client->id);
    }

}
