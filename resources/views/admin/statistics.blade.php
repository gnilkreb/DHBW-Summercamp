@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    <div id="users" data-users-array="{{ $users }}"></div>
    <div id="finished-tasks" data-finished-tasks-array="{{ $finishedTasks }}"></div>
    <div id="statistics-container" class="container">
        <div class="col-md-3">
            <div id="piechart-gendero"></div>
        </div>
        <div class="col-md-3">
            <div id="piechart-difficulty"></div>
        </div>
        <div class="col-md-3">
            <div id="piechart-school"></div>
        </div>
        <div class="col-md-3">
            <div id="piechart-grade"></div>
        </div>
        <div class="col-md-12">
            <h2>Altersdurchschnitt</h2>
            <div id="barchart-ageo"></div>
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