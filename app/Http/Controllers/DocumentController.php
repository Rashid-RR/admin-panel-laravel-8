<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Document::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docuement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        $document = new Document();
        $document->name = $request->name;
        $document->expiryDate = $request->expiryDate;
        $document->image = $fileName;
        $document->employee_id = $request->employee_id;
        $document->documentType_id = $request->documentType_id;


        return redirect()->back()->with('success','Document Type is created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $Document)
    {
        return view('Document.show',compact($Document));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $Document)
    {
        return view('Document.edit',['Document' => Document::findOrFail($Document->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $Document)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $document = Document::findOrFail($Document->id);

        if(!$request->image){
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
        }
        $document->name = $request->name;
        $document->expiryDate = $request->expiryDate;
        $document->image = $fileName;
        $document->employee_id = $request->employee_id;
        $document->documentType_id = $request->documentType_id;
        
        return redirect()->back()->with('success','Document Type updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $Document)
    {
        Document::findOrFail($Document->id)->delete();
        return redirect()->back()->with('success','Document Type deleted successfully !');
        
    }
}
