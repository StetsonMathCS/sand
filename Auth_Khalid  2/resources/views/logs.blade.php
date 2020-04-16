@extends('layouts.app')

@section('title', 'View Logs')

@section('content')
    <div class="container py-5">
        <h1>Logs</h1>
        <pre class="code bg-dark text-light border rounded p-3">{{ $logs }}</pre>
    </div>
@endsection
