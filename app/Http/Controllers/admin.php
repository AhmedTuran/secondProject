<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libraries = library:: all();
        return view('BookStor') ->with('allLibrary',$libraries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('InsertBook');
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
        $validator = $request->validate([
            'BookName' => ['required',
                'string',
                'max:20',
                'unique:users',
                'alpha_dash',
                'alpha'],
            'email' => ['required'],
        ]);
        if ($this->somethingElseIsInvalid()) {

            return redirect()->back()->withErrors($validator);
        }
        $library = new library();
        $library-> BookName =$request -> get( 'BookName');
        $library-> Author =$request -> get( 'Author');
        $library-> email =$request -> get( 'AuthorEmail');
        $library-> save();
        return redirect()->to('library');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $request)
    {
        //
        $library= library::fined($id);
        $library-> BookName =$request -> get( 'BookName');
        $library-> Author =$request -> get( 'Author');
        $library-> email =$request -> get( 'AuthorEmail');
        $library-> save();
        return redirect()->to('library');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $library= library::fined($id);
        return view('EditBook')->with('$one_library',$library);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $library= library::fined($id);
        $library->delete($id);
        return redirect('library');
    }
}
