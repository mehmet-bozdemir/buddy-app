<?php

namespace App\Http\Controllers;

use App\Models\Buddy;
use Illuminate\Http\Request;

class BuddyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Buddy/Index',
            [
                'buddies' => Buddy::all()
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Buddy/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(Request $request)
    {
        Buddy::create([
            ... $request->all(),
            ... $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'age' => 'required',
                'birth_place' => 'required',
                'mother_tongue' => 'required',
                'birthday' => 'required',
            ])
        ]);

        return redirect()->route( "buddy.index")
            ->with('success', 'Buddy was created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Buddy $buddy)
    {
        return inertia(
            'Buddy/Show',
            [
                'buddy' => $buddy
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buddy $buddy)
    {
        return inertia(
            'Buddy/Edit',
            [
                'buddy' => $buddy
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buddy $buddy)
    {
        $buddy->update(
            $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'age' => 'required',
                'birth_place' => 'required',
                'mother_tongue' => 'required',
                'birthday' => 'required',
            ])
        );

        return redirect()->route( "buddy.index")
            ->with('success', 'Buddy was edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buddy $buddy)
    {
        $buddy->delete();

        return redirect()->back( )
            ->with('success', 'Buddy was removed!');
    }
}