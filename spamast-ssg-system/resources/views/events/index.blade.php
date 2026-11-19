<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events | SPAMAST SSG</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; padding: 30px; color: #1f2937; }
        .container { max-width: 1200px; margin: auto; }
        .box { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px #0000000d; }
        .top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h1 { margin: 0; color: #173b2d; }
        a { color: #176b4d; }
        .btn { background: #176b4d; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; border: none; cursor: pointer; font-size: 14px; }
        .btn-danger { background: #dc2626; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb; }
        th { color: #6b7280; font-size: 13px; text-transform: uppercase; }
        .success { background: #dcfce7; color: #166534; padding: 10px 14px; border-radius: 6px; margin-bottom: 15px; }
        .actions { display: flex; gap: 10px; align-items: center; }
        .actions form { margin: 0; }
    </style>
</head>
<body>
<div class="container">
    <p><a href="{{ route('dashboard') }}">&larr; Back to dashboard</a></p>
    <div class="box">
        <div class="top">
            <h1>Events</h1>
            <a class="btn" href="{{ route('events.create') }}">+ Add Event</a>
        </div>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->venue }}</td>
                        <td class="actions">
                            <a href="{{ route('events.show', $event) }}">View</a>
                            <a href="{{ route('events.edit', $event) }}">Edit</a>
                            <form action="{{ route('events.destroy', $event) }}" method="POST"
                                  onsubmit="return confirm('Delete this event?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" style="text-align:center;color:#6b7280;">No events yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
