<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: #dc2626; font-size: 14px; }
        .btn { margin-top: 15px; padding: 8px 16px; background: #2563eb; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edit Event</h1>
    <a href="{{ route('events.index') }}">Back to events</a>

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Event name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label for="event_date">Date</label>
        <input type="date" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date) }}">
        @error('event_date') <div class="error">{{ $message }}</div> @enderror

        <label for="venue">Venue</label>
        <input type="text" id="venue" name="venue" value="{{ old('venue', $event->venue) }}">
        @error('venue') <div class="error">{{ $message }}</div> @enderror

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4">{{ old('description', $event->description) }}</textarea>
        @error('description') <div class="error">{{ $message }}</div> @enderror

        <button class="btn" type="submit">Update Event</button>
    </form>
</body>
</html>