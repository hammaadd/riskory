<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    
    public function index()
    {
        $contents = Content::all();
        return view('controls.content.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
        return view('controls.content.edit',compact('content'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);


        
        $detail=$request->input('content');
        $dom = new \DomDocument();
        @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        
        foreach($images as $k => $img){
            if($img->hasAttribute('data-filename') && !($img->hasAttribute('upload'))):
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "pagecontent/images/" . time().$k.'.png';
                $path = public_path().'/'. $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('upload','1');
                $img->setAttribute('src', asset($image_name));
            endif;
       }

        $detail = $dom->saveHTML();
        $request->merge(['content' => $detail]);

       

        $bp = $content->update($request->all());
        if($bp){
            $request->session()->flash('success', 'Content updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update Content');
        }
        return redirect()->route('content.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }

    public function contactIndex(){
        $contact = Contact::all();
        return view('controls.contact.index',compact('contact'));
    }

    public function destroyContact(Contact $contact, $id)
    {
        //
        $con = $contact->find($id)->delete();

        if($con){
            session()->flash('success', 'Submission deleted successfully');

        }else{
            session()->flash('error', 'Unable to delete submission');
        }
        return redirect()->route('contact.index');
    }

}
