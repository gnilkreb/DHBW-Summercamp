@extends('layouts.admin')

@section('title', 'Anfragen')

@section('content')
    <div id="requests-container"></div>
@endsection

@push('scripts')
    <script src="/js/admin-requests.js"></script>
@endpush