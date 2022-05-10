
        const data = {
            labels: [
                'Leads',
                'Professionels',
                'Commande'
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

    const dataBar = {
        labels: [
            'Administrateur',
            'Category',
            'Sous Category'
        ],
        datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [10, 20, 55],
        }]
    };

    const configBar = {
        type: 'bar',
        data: dataBar,
        options: {}
    };

    const myChartBar = new Chart(
        document.getElementById('myChartBar'),
        configBar
    );
