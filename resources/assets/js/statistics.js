const MALE_COLOR = '#2980b9';
const FEMALE_COLOR = '#c0392b';

$(() => {
    if ($('#statistics-container').length === 1) {
        const users = $('#users').data('users-array');
        const finishedTasks = $('#finished-tasks').data('finished-tasks-array');

        initCharts(users, finishedTasks);
    }
});

function initCharts(users, finishedTasks) {
    initGenderChart(users);
    initDifficultyChart(finishedTasks);
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

function initDifficultyChart(finishedTasks) {
    const data = {
        '1': 0,
        '2': 0,
        '3': 0
    };

    finishedTasks.forEach(finishedTask => {
        const task = finishedTask.task;

        data[task.difficulty]++;
    });

    c3.generate({
        bindto: '#piechart-difficulty',
        data: {
            columns: [
                ['Leicht', data['1']],
                ['Mittel', data['2']],
                ['Schwer', data['3']]
            ],
            colors: {
                Leicht: '#27ae60',
                Mittel: '#f1c40f',
                Schwer: '#c0392b'
            },
            type: 'donut'
        },
        donut: {
            title: 'Schwierigkeitsgrade'
        }
    });
}

function initAgeChart(users) {
    const male = [];
    const female = [];
    const sum = [];

    users.forEach(user => {
        if (user.gender === 1) {
            female.push(user.age);
        } else {
            male.push(user.age);
        }

        sum.push(user.age);
    });

    const avgFemale = average(female);
    const avgMale = average(male);
    const avgSum = average(sum);

    c3.generate({
        bindto: '#barchart-ageo',
        data: {
            columns: [
                ['Männlich', avgMale],
                ['Weiblich', avgFemale],
                ['Gesamt', avgSum]
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

function average(array) {
    const sum = array.reduce((previous, current) => previous + current, 0);

    return Math.round(sum / array.length);
}