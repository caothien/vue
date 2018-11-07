<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;

class CrudsController extends Controller
{
    public function index()
    {
        $x = Student::all();
        return response()->json($x);
    }

    public function store(Request $request)
    {
        Student::create($request->all());
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
    }
}
