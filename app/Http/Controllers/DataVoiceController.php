<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataVoice;
use Yajra\Datatables\Datatables;
use Validator;
use Rinvex\Country\Country;

class DataVoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empdata = DataVoice::all();
       return view('emp.index', compact('empdata'));

    }

    public function getUsers(){
        return Datatables::of(DataVoice::query())
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emp.create');
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
            'emp_id'=>'required|numeric',
            'emp_name'=>'required',
            'country_code'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'dob'=>'required',
            'profile'=>'mimes:jpg,png|required|max:10000'
        ]);

        $data = new DataVoice([
            'emp_id' => $request->get('emp_id'),
            'emp_name' => $request->get('emp_name'),
            'country_code' => $request->get('country_code'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'dob' => $request->get('dob'),
        ]);

        $image = $request->file('profile');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $filename = $image;
        $data->profile = $filename;
        $data->save();
        return redirect('/home')->with('success', 'Contact saved!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = DataVoice::find($id);
        return view('emp.edit', compact('emp'));
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
        $request->validate([
            'emp_id'=>'required',
            'emp_name'=>'required',
            'country_code'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'dob'=>'required',
            'profile'=>'required'
        ]);

        $data = DataVoice::find($id);
        $data->emp_id = $request->get('emp_id');
        $data->emp_name = $request->get('emp_name');
        $data->country_code = $request->get('country_code');
        $data->mobile = $request->get('mobile');
        $data->email = $request->get('email');
        $data->dob = $request->get('dob');
        $data->profile = $request->get('profile');

        $data->save();
        return redirect('/home')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empdata = DataVoice::find($id);
        $empdata->delete();
        return redirect('/home')->with('success', 'Data Deleted !');;
    }
}
