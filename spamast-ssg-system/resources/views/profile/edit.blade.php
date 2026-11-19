<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile | SPAMAST SSG</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 24px; }
        .card { max-width: 520px; margin: 0 auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        h1 { color: #14532d; margin-top: 0; }
        label { display: block; margin-top: 14px; font-size: 14px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #d1d5db; border-radius: 4px; box-sizing: border-box; }
        input[readonly] { background: #f3f4f6; color: #6b7280; }
        .error { color: #b91c1c; font-size: 13px; margin-top: 4px; }
        .success { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 12px; }
        .hint { color: #6b7280; font-size: 12px; }
        button { margin-top: 20px; padding: 10px 16px; background: #166534; color: #fff; border: 0; border-radius: 4px; cursor: pointer; }
        a { color: #166534; }
    </style>
</head>
<body>
<div class="card">
    <h1>Edit Profile</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <label>Student ID</label>
        <input type="text" value="{{ $student->student_id }}" readonly>

        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label for="course">Course</label>
        <input type="text" id="course" name="course" value="{{ old('course', $student->course) }}">
        @error('course') <div class="error">{{ $message }}</div> @enderror

        <label for="year_level">Year Level</label>
        <input type="text" id="year_level" name="year_level" value="{{ old('year_level', $student->year_level) }}">
        @error('year_level') <div class="error">{{ $message }}</div> @enderror

        <label for="contact_number">Contact Number</label>
        <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $student->contact_number) }}">
        @error('contact_number') <div class="error">{{ $message }}</div> @enderror

        <label for="password">New Password</label>
        <input type="password" id="password" name="password">
        <div class="hint">Leave blank to keep your current password.</div>
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button type="submit">Save Changes</button>
        <p><a href="{{ route('dashboard') }}">← Back to dashboard</a></p>
    </form>
</div>
</body>
</html>
