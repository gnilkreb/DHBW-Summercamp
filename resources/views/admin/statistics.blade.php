@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    Statistik
@endsection

@push('styles')
    <link rel="stylesheet" href="/components/c3/c3.min.css">
@endpush

@push('scripts')
    <script src="/components/d3/d3.min.js"></script>
    <script src="/components/c3/c3.min.js"></script>
@endpush