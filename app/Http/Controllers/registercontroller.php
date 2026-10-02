<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class registercontroller extends Controller
{
    public function index(){
        return view('form');    
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'gender' => 'required|in:male,female,other',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );

        $validated['image'] = $imageName;
    }

        User::create($validated);

        return redirect('/users');
    }

    public function users()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'gender' => 'required|in:male,female,other',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('image')) {

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );

        $validated['image'] = $imageName;
    }

        $user->update($validated);

        return redirect('/users');
    }

    public function delete($id)
    {
    $user = User::findOrFail($id);

    $user->delete();

    return redirect('/users');
    }

}
