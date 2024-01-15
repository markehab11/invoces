<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function index()
    {
        return view('sections.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:sections|max:255',
        ],[
            'name.required' =>'يرجي ادخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',
        ]);

        section::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return redirect('sections.index');
    }

    public function show(Section $section)
    {
        //
    }

    public function edit(Section $section)
    {
        //
    }

    public function update(Request $request, Section $section)
    {
        //
    }

    public function destroy(Section $section)
    {
        //
    }
}
