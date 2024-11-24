<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Models\SubFields;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class SubFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $get_field = $request->input('fields'); 



        $subFields = SubFields::first(); // Example: Fetch the first row
        return view('intrests', [
        'user' => auth()->user(),
        'fields' => $get_field,
        'savedData' => $subFields ? $subFields->toArray() : [],
        ]);

        
        // if ($get_field == 'field1') {
        //     $request->validate([
        //         'sub_field1' => ['nullable', 'in:CyberSecurity,AI,Web,Mobile'],
        //     ]);
        // } elseif ($get_field == 'field2') {
        //     $request->validate([
        //         'sub_field2' => ['nullable', 'in:sub1,sub2,sub3,sub4'],
        //     ]);
        // } elseif ($get_field == 'field3') {
        //     $request->validate([
        //         'sub_field3' => ['nullable', 'in:subF1,subF2,subF3,subF4'],
        //     ]);
        // }

        // $user = auth()->user();

        // return redirect('/sub-fields');
        // return view('intrests', compact('user'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'sub_field1' => 'array|nullable',
        'sub_field1.*' => 'in:CyberSecurity,AI,Web,Mobile',
        'sub_field2' => 'array|nullable',
        'sub_field2.*' => 'in:sub1,sub2,sub3,sub4',
        'sub_field3' => 'array|nullable',
        'sub_field3.*' => 'in:subF1,subF2,subF3,subF4',
    ]);


    SubFields::create([
        'sub_field1' => $validatedData['sub_field1'] ?? [],
        'sub_field2' => $validatedData['sub_field2'] ?? [],
        'sub_field3' => $validatedData['sub_field3'] ?? [],
    ]);

    return redirect()->back()->with('success', 'Data saved successfully!');
}



    /**
     * Display the specified resource.
     */
    public function show(SubFields $subFields)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubFields $subFields)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubFields $subFields)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubFields $subFields)
    {
        //
    }
}
