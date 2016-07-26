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

    users.forEach(user => {
        if (user.gender === 1) {
            male++;
        } else {
            female++;
        }
    });

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

    tasks.forEach(task => {
        if (task.difficulty === 1) {
            bronze++;
        }
        if (task.difficulty === 2) {
            silver++;
        }
        if (task.difficulty === 3) {
            gold++;
        }
    });

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

    users.forEach(user => {
        if (user.gender === 1) {
            male.push(user.age);
        } else {
            female.push(user.age);
        }
        sum.push(user.age);
    });

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

    users.forEach(user => {
        if (user.school == 'Gymnasium') {
            gymnasium++;
        }
        if (user.school == 'Realschule') {
            realschule++;
        }
        if (user.school == 'Hauptschule') {
            hauptschule++;
        }
        if (user.school === 'Grundschule') {
            grundschule++;
        }
    });

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

    users.forEach(user => {
        if (user.grade == 1) {
            one++;
        }
        if (user.grade == 2) {
            two++;
        }
        if (user.grade == 3) {
            three++;
        }
        if (user.grade == 4) {
            four++;
        }
        if (user.grade == 5) {
            five++;
        }
        if (user.grade == 6) {
            six++;
        }
        if (user.grade == 7) {
            seven++;
        }
        if (user.grade == 8) {
            eight++;
        }
        if (user.grade == 9) {
            nine++;
        }
        if (user.grade == 10) {
            ten++;
        }
        if (user.grade == 11) {
            eleven++;
        }
        if (user.grade == 12) {
            twelve++;
        }
        if (user.grade == 12) {
            thirteen++;
        }
    });

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