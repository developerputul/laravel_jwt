<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions.index');
    } //End Method
    public function create()
    {
        return view('permissions.create');
    } //End Method

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission added Successfully');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    } //End Method
    public function edit()
    {
        //

    } //End Method
    public function update()
    {
        //

    } //End Method
    public function delete()
    {
        //

    } //End Method
}
