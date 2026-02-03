@foreach($customers->jobs as $job)
    <div style="border-bottom: 1px solid #ccc; padding: 10px 0;">
        <strong>Date:</strong> {{ $job->created_at->format('d M Y') }}<br>
        <strong>Car:</strong> {{ $job->car->model ?? 'N/A' }}<br>
        <strong>Parts Used:</strong>
        <ul>
            @foreach($job->parts as $part)
                <li>{{ $part->title }} (Qty: {{ $part->pivot->quantity }})</li>
            @endforeach
        </ul>
    </div>
@endforeach
