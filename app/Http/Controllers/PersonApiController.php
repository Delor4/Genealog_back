<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::all();
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = Person::create($request->all());
        
        return response()->json($person, 201);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return $person;
    }
        
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $person = Person::update($request->all());
        
        return response()->json($person, 200);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function delete(Person $person)
    {
        $person->delete();
        
        return response()->json(null, 204);
    }
}
