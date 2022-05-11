
        const data = {
            labels: [
                'Leads',
                'Professionels',
                'Commande'
            ],
            datasets: [{
                //label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    '#000066',
                    '#cc0000',
                    '#ffaa00'
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

   //Bar graph

    const dataBar = {
        labels: [
            'Administrateur',
            'Category',
            'Sous Category'
        ],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#000066',
            borderColor: '#000066',
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
