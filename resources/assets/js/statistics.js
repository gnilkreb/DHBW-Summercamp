$(() => {
    if ($('#statistics-container').length === 1) {
        const users = $('#users').data('users-array');
        const tasks = $('#tasks').data('tasks-array');

        initCharts(users, tasks);
    }
});

function initCharts(users, tasks) {
    initGenderChart(users);
    initDifficultyChart(tasks);
    initAgeChart(users);
    initSchoolChart(users);
    initGradeChart(users);
}

function initGenderChart(users) {
    var male = 0;
    var female = 0;

    for (var i = 0; i < users.length; i++) {
        if (users[i].gender == 1) {
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
}

function initDifficultyChart(tasks) {
    var bronze = 0;
    var silver = 0;
    var gold = 0;

    for (var i = 0; i < tasks.length; i++) {
        if (tasks[i].difficulty == 1) {
            bronze++;
        }
        if (tasks[i].difficulty == 2) {
            silver++;
        }
        if (tasks[i].difficulty == 3) {
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
            colors: {
                Bronze: '#CD7F32',
                Silber: 'silver',
                Gold: 'gold'
            },
            type: 'donut'
        },
        donut: {
            title: 'Schwierigkeitsgrade'
        }
    });
}

function initAgeChart(users) {
    var male = ['Männlich'];
    var female = ['Weiblich'];
    var sum = ['Gesamt'];

    for (var i = 0; i < users.length; i++) {
        if (users[i].gender == 1) {
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
}

function initSchoolChart(users) {
    var gymnasium = 0;
    var realschule = 0;
    var hauptschule = 0;
    var grundschule = 0;

    for (var i = 0; i < users.length; i++) {
        if (users[i].school == 'Gymnasium') {
            gymnasium++;
        }
        if (users[i].school == 'Realschule') {
            realschule++;
        }
        if (users[i].school == 'Hauptschule') {
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
}

function initGradeChart(users) {
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

    for (var i = 0; i < users.length; i++) {
        if (users[i].grade == 1) {
            one++;
        }
        if (users[i].grade == 2) {
            two++;
        }
        if (users[i].grade == 3) {
            three++;
        }
        if (users[i].grade == 4) {
            four++;
        }
        if (users[i].grade == 5) {
            five++;
        }
        if (users[i].grade == 6) {
            six++;
        }
        if (users[i].grade == 7) {
            seven++;
        }
        if (users[i].grade == 8) {
            eight++;
        }
        if (users[i].grade == 9) {
            nine++;
        }
        if (users[i].grade == 10) {
            ten++;
        }
        if (users[i].grade == 11) {
            eleven++;
        }
        if (users[i].grade == 12) {
            twelve++;
        }
        if (users[i].grade == 12) {
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
}