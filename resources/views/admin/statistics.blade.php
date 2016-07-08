@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    <div class="alert alert-warning">
        <strong>TODO:</strong> Richtige statt Guttenberg Daten verwenden
    </div>
    <div id="statistics-container" class="container">
        <div class="col-md-4">
            <h2>Geschlechtsverteilung</h2>
            <div id="piechart-gender"></div>
        </div>
        <div class="col-md-8">
            <h2>Altersverteilung</h2>
            <div id="barchart-age"></div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/components/c3/c3.min.css">
@endpush

@push('scripts')
    <script src="/components/d3/d3.min.js"></script>
    <script src="/components/c3/c3.min.js"></script>
@endpush