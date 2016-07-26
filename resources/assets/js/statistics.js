const MALE_COLOR = '#2980b9';
const FEMALE_COLOR = '#c0392b';

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
    const data = {
        '0': 0,
        '1': 0
    };

    users.forEach(user => {
        data[user.gender]++;
    });

    c3.generate({
        bindto: '#piechart-gendero',
        data: {
            columns: [
                ['Männlich', data['0']],
                ['Weiblich', data['1']],
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
    const data = {
        '1': 0,
        '2': 0,
        '3': 0
    };

    tasks.forEach(task => {
        data[task.difficulty]++;
    });

    c3.generate({
        bindto: '#piechart-difficulty',
        data: {
            columns: [
                ['Bronze', data['1']],
                ['Silber', data['2']],
                ['Gold', data['3']]
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
    const data = {
        'Grundschule': 0,
        'Hauptschule': 0,
        'Realschule': 0,
        'Gymnasium': 0
    };

    users.forEach(user => {
        data[user.school]++;
    });

    c3.generate({
        bindto: '#piechart-school',
        data: {
            columns: [
                ['Gymnasium', data['Gymnasium']],
                ['Realschule', data['Realschule']],
                ['Hauptschule', data['Hauptschule']],
                ['Grundschule', data['Grundschule']]
            ],
            type: 'donut'
        },
        donut: {
            title: 'Schularten'
        }
    });
}

function initGradeChart(users) {
    const data = {};

    for (let i = 1; i <= 13; i++) {
        data[i] = 0;
    }

    users.forEach(user => {
        if (!user.grade) {
            return;
        }

        data[user.grade]++;
    });

    const columns = [];

    for (let key in data) {
        const value = data[key];
        const column = [key, value];

        columns.push(column);
    }

    c3.generate({
        bindto: '#piechart-grade',
        data: {
            columns,
            type: 'donut'
        },
        donut: {
            title: 'Klasse'
        }
    });
}