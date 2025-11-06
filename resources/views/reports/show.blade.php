@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title"> Report Details</h1>
    <div class="details-card">
        <p><strong>Title:</strong> {{ $report->title }}</p>
        <p><strong>Content:</strong> {{ $report->content }}</p>
        <p><strong>Date:</strong> {{ $report->created_at->format('d/m/Y') }}</p>
    </div>
    <a href="{{ route('reports.index') }}" class="btn btn-secondary">⬅️ Back</a>
</div>
@endsection
