        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        // bar graph

    const labelsBar = Utils.months({count: 3});
    const dataBar = {
    labels: labelsBar,
    datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 80],
        backgroundColor: [
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
    };

    const configBar = {
        type: 'bar',
        data: dataBar,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
    };

    const myChartBar = new Chart(
        document.getElementById('myChartBar'),
        configBar
    );
