    //GET values from dashboard page
    var nbLeads         = document.querySelector('#totalLeads').value;
    var nbProfessionels = document.querySelector('#totalProfessionels').value;
    var nbCommandes     = document.querySelector('#totalCommandes').value;
    // Draw doughnut graph
    const data = {
        labels: ['Leads','Professionels','Commande'],
        datasets: [{data: [nbLeads, nbProfessionels, nbCommandes],backgroundColor: [ '#000066','#cc0000','#ffaa00'], hoverOffset: 4}]
    };
    const config = {type: 'doughnut',data: data,};
    const myChart = new Chart(document.querySelector('#myChart'),config);

   //Draw  Bar graph
    var nbAdmin       = document.querySelector('#totalAdmin').value;
    var nbCategory    = document.querySelector('#totalCategory').value ;
    var nbSouCategory = document.querySelector('#totalSouCategory').value; 
    var nbPosts       = document.querySelector('#totalPosts').value; 

    const dataBar = {
        labels: ['Administrateur', 'Category', 'Sous Category', 'Posts'],
        datasets: [{label: 'Nombres ',backgroundColor: '#000066',borderColor: '#000066',data: [nbAdmin, nbCategory, nbSouCategory, nbPosts],}]
    };
    const configBar = {type: 'bar', data: dataBar, options: {}};
    const myChartBar = new Chart(document.querySelector('#myChartBar'),configBar);
