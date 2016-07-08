$(() => {
    if ($('#statistics-container').length === 1) {
        initCharts();
    }
});

function initCharts() {
    //TODO: I am grateful for your upcoming implementation for this Philipp.
    const piechartGender = c3.generate({
        bindto: '#piechart-gender',
        data: {
            // iris data from R
            columns: [
                ['Männlich', 17],
                ['Weiblich', 12],
            ],
            type: 'donut'
        },
        donut: {
            title: 'Geschlechtsverteilung'
        }
    });

    const barchartAge = c3.generate({
        bindto: '#barchart-age',
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
}