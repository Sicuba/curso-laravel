<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Company;

class DocumentController extends Controller
{
    public function index() {
        $documents = Document::with('company')->get();
        return view('documents.index', compact('documents'));
    }
    
    public function create() {
        $companies = Company::all();
        /* dd($companies); */
        return view('documents.create', compact('companies'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|file|mimes:pdf,docx',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        $filePath = $request->file('file_path')->store('documents');
    
        Document::create([
            'name' => $request->name,
            'description' => $request->description,
            'file_path' => $filePath,
            'company_id' => $request->company_id,
        ]);
    
        return redirect()->route('documents.index');
    }
    
    public function edit(Document $document) {
        $companies = Company::all();
        return view('documents.edit', compact('document', 'companies'));
    }
    
    public function update(Request $request, Document $document) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('documents');
            $document->update(['file_path' => $filePath]);
        }
    
        $document->update($request->only(['name', 'description', 'company_id']));
    
        return redirect()->route('documents.index');
    }
    
    public function destroy(Document $document) {
        $document->delete();
        return redirect()->route('documents.index');
    }
    
}
