<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; max-width: 600px; }
        .label { font-weight: bold; margin-top: 12px; }
    </style>
</head>
<body>
    <h1>{{ $event->name }}</h1>
    <a href="{{ route('events.index') }}">Back to events</a>

    <div class="label">Date</div>
    <div>{{ $event->event_date }}</div>

    <div class="label">Venue</div>
    <div>{{ $event->venue }}</div>

    <div class="label">Description</div>
    <div>{{ $event->description ?: 'No description provided.' }}</div>

    <p><a href="{{ route('events.edit', $event) }}">Edit this event</a></p>
</body>
</html>