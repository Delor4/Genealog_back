<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();

        return view('persons.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$parents = Person::select('last_name', 'first_name', 'id')->get();

        return view('persons.create', compact('parents', $parents));
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
            'first_name'=>'required',
            'last_name'=>'required',
        ]);

        $person = new Person([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'birth_year' => $request->get('birth_year') ?? 1900,
            'sex' => $request->get('sex') ?? 'f',
            'parent_id' => $request->get('parent_id'),
        ]);
        $person->save();
        return redirect('/persons')->with('success', 'Person saved!');

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
        $person = Person::find($id);
		$parents = Person::select('last_name', 'first_name', 'id')->where('id', '<>', $id)->get();

        return view('persons.edit')
			->with(compact('person'))
			->with(compact('parents')
		);
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
            'first_name'=>'required',
            'last_name'=>'required',
        ]);

        $person = Person::find($id);
        $person->first_name =  $request->get('first_name');
        $person->last_name = $request->get('last_name');
        $person->birth_year = $request->get('birth_year') ?? 1900;
        $person->sex = $request->get('sex') ?? 'f';
        $person->parent_id = $request->get('parent_id');

        $person->save();

        return redirect('/persons')->with('success', 'Person updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();

        return redirect('/persons')->with('success', 'Person deleted!');
    }
}
