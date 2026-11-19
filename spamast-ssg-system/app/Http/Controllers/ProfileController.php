<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'student' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $student = $request->user();

        $data = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'email', 'max:255', Rule::unique('students', 'email')->ignore($student->id)],
            'course'         => ['required', 'string', 'max:255'],
            'year_level'     => ['required', 'string', 'max:20'],
            'contact_number' => ['nullable', 'string', 'max:20'],
            'password'       => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        // Only change the password if a new one was typed
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $student->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profile updated.');
    }
}
