@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    <div class="alert alert-warning">
        <strong>TODO:</strong> Richtige statt Guttenberg Daten verwenden
    </div>
    <div id="users" data-users-array="{{$users}}" ></div>
    <div id="statistics-container" class="container">
        <div class="col-md-4">
            <h2>Geschlechtsverteilung</h2>
            <div id="piechart-gendero"></div>
        </div>
        <div class="col-md-8">
            <h2>Altersverteilung</h2>
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
    <script>
        var users = $('#users').data('users-array');

        var male = 0;
        var female = 0;

        for(var i = 0; i < users.length; i++) {
            if(users[i].gender == 1) {
                male++;
            } else {
                female++;
            }
        }

        const piechartGender = c3.generate({
            bindto: '#piechart-gendero',
            data: {
                // iris data from R
                columns: [
                    ['Männlich', male],
                    ['Weiblich', female],
                ],
                type: 'donut'
            },
            donut: {
                title: 'Geschlechtsverteilung'
            }
        });

        const barchartAge = c3.generate({
            bindto: '#barchart-ageo',
            data: {
                columns: [
                    ['Männlich', 13, 17, 13, 14, 12, 13, 16, 9],
                    ['Weiblich', 15, 15, 17, 16, 11, 15, 18, 11],
                    ['Gesamt', 13, 17, 13, 14, 12, 13, 16, 9, 15, 15, 17, 16, 11, 15, 18, 11]
                ],
                type: 'bar'
            },
            bar: {
                width: {
                    ratio: 0.5
                }
            },
            axis: {
                x: {
                    categories: ['Category 1', 'Category 2']
                }
            }
        });
    </script>
@endpush