const MALE_COLOR = '#2980b9';
const FEMALE_COLOR = '#c0392b';

$(() => {
    if ($('#statistics-container').length === 1) {
        const users = $('#users').data('users-array');
        const tasks = $('#tasks').data('tasks-array');
        console.log(users, tasks);
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
    let male = 0;
    let female = 0;

    for (let i = 0; i < users.length; i++) {
        if (users[i].gender === 1) {
            male++;
        } else {
            female++;
        }
    }

    c3.generate({
        bindto: '#piechart-gendero',
        data: {
            columns: [
                ['Männlich', male],
                ['Weiblich', female],
            ],
            colors: {
                'Männlich': MALE_COLOR,
                'Weiblich': FEMALE_COLOR
            },
            type: 'donut'
        },
        donut: {
            title: 'Geschlechtsverteilung'
        }
    });
}

function initDifficultyChart(tasks) {
    let bronze = 0;
    let silver = 0;
    let gold = 0;

    for (let i = 0; i < tasks.length; i++) {
        if (tasks[i].difficulty === 1) {
            bronze++;
        }
        if (tasks[i].difficulty === 2) {
            silver++;
        }
        if (tasks[i].difficulty === 3) {
            gold++;
        }
    }

    c3.generate({
        bindto: '#piechart-difficulty',
        data: {
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
    const male = ['Männlich'];
    const female = ['Weiblich'];
    const sum = ['Gesamt'];

    for (let i = 0; i < users.length; i++) {
        if (users[i].gender === 1) {
            male.push(users[i].age);
        } else {
            female.push(users[i].age);
        }
        sum.push(users[i].age);
    }

    c3.generate({
        bindto: '#barchart-ageo',
        data: {
            columns: [
                male,
                female,
                sum
            ],
            colors: {
                'Männlich': MALE_COLOR,
                'Weiblich': FEMALE_COLOR,
                'Gesamt': '#2c3e50'
            },
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
    let gymnasium = 0;
    let realschule = 0;
    let hauptschule = 0;
    let grundschule = 0;

    for (let i = 0; i < users.length; i++) {
        if (users[i].school == 'Gymnasium') {
            gymnasium++;
        }
        if (users[i].school == 'Realschule') {
            realschule++;
        }
        if (users[i].school == 'Hauptschule') {
            hauptschule++;
        }
        if (users[i].school === 'Grundschule') {
            grundschule++;
        }
    }

    c3.generate({
        bindto: '#piechart-school',
        data: {
            columns: [
                ['Gymnasium', gymnasium],
                ['Realschule', realschule],
                ['Hauptschule', hauptschule],
                ['Grundschule', grundschule]
            ],
            type: 'donut'
        },
        donut: {
            title: 'Schularten'
        }
    });
}

function initGradeChart(users) {
    let one = 0;
    let two = 0;
    let three = 0;
    let four = 0;
    let five = 0;
    let six = 0;
    let seven = 0;
    let eight = 0;
    let nine = 0;
    let ten = 0;
    let eleven = 0;
    let twelve = 0;
    let thirteen = 0;

    for (let i = 0; i < users.length; i++) {
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

    c3.generate({
        bindto: '#piechart-grade',
        data: {
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