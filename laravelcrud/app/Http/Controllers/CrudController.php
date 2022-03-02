<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read(Request $request,$name=null)
    {
        if(isset($request->keyword))
        {
            $crud=$this->fetch($request);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_asc_id')
        {
            $crud = crud::orderBy('id', 'asc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_desc_id')
        {
            $crud = crud::orderBy('id', 'desc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_asc_fs')
        {
            $crud = crud::orderBy('firstname', 'asc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_desc_fs')
        {
            $crud = crud::orderBy('firstname', 'desc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_asc_ls')
        {
            $crud = crud::orderBy('lastname', 'asc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_desc_ls')
        {
            $crud = crud::orderBy('lastname', 'desc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_asc_mail')
        {
            $crud = crud::orderBy('mail', 'asc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_desc_mail')
        {
            $crud = crud::orderBy('mail', 'desc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_asc_ph')
        {
            $crud = crud::orderBy('phone', 'asc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($name=='sort_desc_ph')
        {
            $crud = crud::orderBy('phone', 'desc')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        /* filters for fetch the rows
        if(isset($request->keyword) && !empty($request->keyword))
        {

            $input = $request->keyword;
        }
        if(isset($request->category) && !empty($request->category))
        {

            $category = $request->category;
        }
        if($category!='global')
        {
            //$input = $request->keyword;
            //$category = $request->category;
            $crud=crud::where($category,'like',$input)->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($category=='global')
        {
            //$input = $request->keyword;
            //$category = $request->category;
            $crud=crud::where('id','like','%'.$input.'%')->orwhere('firstname','like','%'.$input.'%')->orwhere('lastname','like','%'.$input.'%')->orwhere('mail','like','%'.$input.'%')->orwhere('phone','like','%'.$input.'%')->paginate(3);
            return view('laravelcrud.read',['crud'=>$crud]);
        }*/
        $crud=crud::paginate(3);
        return view('laravelcrud.read',['crud'=>$crud]);
    }
    public function index()
    {
        //$crud=crud::all();
        return view('laravelcrud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laravelcrud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record=$request->validate([
            'id'=>'required|integer|unique:cruds',
            'firstname'=>'required',
            'lastname'=>'required',
            'mail'=>'required|unique:cruds',
            'phone'=>'required|integer'
        ]);
        $alert=crud::create($record);
        if($alert){
            return back()->with('success','Record creted successfully');}
        else{
            return back()->with('fail','something went wrong');
        }
        //return redirect()->route('laravelcrud.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        return view('show',compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($cruds)
    {
        $crud=crud::find($cruds);
        if(!empty($crud))
        {
        return view('laravelcrud.edit',compact('crud'));}
        else
        {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $crud)
    {
        
        $contact = crud::find($crud);
        $input = $request->all();
        $up=$contact->update($input);
        if($up){
            return redirect()->route('read')->with('upload_success','Record updated successfully');}
        else{
            return redirect()->route('read')->with('upload_fail','something went wrong');}
        /*$request->validate([
            'id'=>'required|integer',
            'firstname'=>'required',
            'lastname'=>'required',
            'mail'=>'required',
            'phone'=>'required|integer'
        ]);
        $crud->id=$request->id;
        $crud->firstname=$request->firstname;
        $crud->lastname=$request->lastname;
        $crud->mail=$request->mail;
        $crud->phone=$request->phone;
        $crud->save();
        return redirect()->route('laravelcrud.read');
        //$crud->update($request->all());*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($crud)
    {
        $del=crud::destroy($crud);
        if($del){
            return back()->with('success','Record deleted successfully');}
        else{
            return back()->with('fail','something went wrong');}
    }
    public function fetch(Request $request)
    {
        if(isset($request->keyword))
        {

            $input = $request->keyword;
        }
        if(isset($request->category))
        {

            $category = $request->category;
        }
       /* if(isset($category))
        {
        $crud_arry = crud::where('category', '=', $category, 'and');
        }
        if(isset($input))
        {
            $crud_arry = $crud_arry->where('input', '=', $input, 'and');
        }
        return view('laravelcrud.read',compact('crud_arry'));*/
        //$crud = crud::where($category, '=',$input)->paginate(3);
        //dd($crud);
        //var_dump($category);
        //var_dump($input);
        //var_dump($crud);
        if($category!='global')
        {
        $crud=crud::where($category,'like',$input)->paginate(3);
        return $crud;
        //return view('laravelcrud.read',['crud'=>$crud]);
        }
        if($category=='global')
        {
            $crud=crud::where('id','like','%'.$input.'%')->orwhere('firstname','like','%'.$input.'%')->orwhere('lastname','like','%'.$input.'%')->orwhere('mail','like','%'.$input.'%')->orwhere('phone','like','%'.$input.'%')->paginate(3);
            return $crud;
            //return view('laravelcrud.read',['crud'=>$crud]);
        }
    }
    
}
