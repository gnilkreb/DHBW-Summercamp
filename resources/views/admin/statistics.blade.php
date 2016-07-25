@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    <div class="alert alert-warning">
        <strong>TODO:</strong> Richtige statt Guttenberg Daten verwenden
    </div>
    <div id="users" data-users-array="{{$users}}" ></div>
    <div id="tasks" data-tasks-array="{{$tasks}}" ></div>
    <div id="statistics-container" class="container">
        <div class="col-md-3">
            <div id="piechart-gendero"></div>
        </div>
        <div class="col-md-3">
            <div id="piechart-difficulty"></div>
        </div>
        <div class="col-md-6">
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
        var tasks = $('#tasks').data('tasks-array');

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

        var bronze = 0;
        var silver = 0;
        var gold = 0;

        for(var i = 0; i < tasks.length; i++) {
            if(tasks[i].difficulty == 1) {
                bronze++;
            }
            if(tasks[i].difficulty == 2) {
                silver++;
            }
            if(tasks[i].difficulty == 3) {
                gold++;
            }
        }

        const piechartDifficulty = c3.generate({
            bindto: '#piechart-difficulty',
            data: {
                // iris data from R
                columns: [
                    ['Bronze', bronze],
                    ['Silber', silver],
                    ['Gold', gold]
                ],
                type: 'donut'
            },
            donut: {
                title: 'Schwierigkeitsgrade'
            }
        });

        var male = ['Männlich'];
        var female = ['Weiblich'];
        var sum = ['Gesamt'];

        for(var i = 0; i < users.length; i++) {
            if(users[i].gender == 1) {
                male.push(users[i].age);
            } else {
                female.push(users[i].age);
            }
            sum.push(users[i].age);
        }

        const barchartAge = c3.generate({
            bindto: '#barchart-ageo',
            data: {
                columns: [
                    male,
                    female,
                    sum
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