@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    <div id="users" data-users-array="{{$users}}" ></div>
    <div id="tasks" data-tasks-array="{{$tasks}}" ></div>
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

        var gymnasium = 0;
        var realschule = 0;
        var hauptschule = 0;
        var grundschule = 0;

        for(var i = 0; i < users.length; i++) {
            if(users[i].school == 'Gymnasium') {
                gymnasium++;
            }
            if(users[i].school == 'Realschule') {
                realschule++;
            }
            if(users[i].school == 'Hauptschule') {
                hauptschule++;
            }
        }

        const piechartSchool = c3.generate({
            bindto: '#piechart-school',
            data: {
                // iris data from R
                columns: [
                    ['Gymnasium', gymnasium],
                    ['Realschule', realschule],
                    ['Hauptschule', hauptschule]
                ],
                type: 'donut'
            },
            donut: {
                title: 'Schularten'
            }
        });

        var one = 0;
        var two = 0;
        var three = 0;
        var four = 0;
        var five = 0;
        var six = 0;
        var seven = 0;
        var eight = 0;
        var nine = 0;
        var ten = 0;
        var eleven = 0;
        var twelve = 0;
        var thirteen = 0;

        for(var i = 0; i < users.length; i++) {
            if(users[i].grade == 1) {
                one++;
            }
            if(users[i].grade == 2) {
                two++;
            }
            if(users[i].grade == 3) {
                three++;
            }
            if(users[i].grade == 4) {
                four++;
            }
            if(users[i].grade == 5) {
                five++;
            }
            if(users[i].grade == 6) {
                six++;
            }
            if(users[i].grade == 7) {
                seven++;
            }
            if(users[i].grade == 8) {
                eight++;
            }
            if(users[i].grade == 9) {
                nine++;
            }
            if(users[i].grade == 10) {
                ten++;
            }
            if(users[i].grade == 11) {
                eleven++;
            }
            if(users[i].grade == 12) {
                twelve++;
            }
            if(users[i].grade == 12) {
                thirteen++;
            }
        }

        const piechartGrade = c3.generate({
            bindto: '#piechart-grade',
            data: {
                // iris data from R
                columns: [
                    ['1', one],
                    ['2', two],
                    ['3', three],
                    ['4', four],
                    ['5', five],
                    ['6', six],
                    ['7', seven],
                    ['8', eight],
                    ['9', nine],
                    ['10', ten],
                    ['11', eleven],
                    ['12', twelve],
                    ['13', thirteen]
                ],
                type: 'donut'
            },
            donut: {
                title: 'Klasse'
            }
        });
    </script>
@endpush