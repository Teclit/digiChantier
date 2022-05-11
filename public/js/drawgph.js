function setDateGraph(pdData, canvasId, sFormat){

	var lData = [];
	var dData = [];
	var tYear = ['janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'];
	var tweek =  ['Semaine-01', 'Semaine-02', 'Semaine-03', 'Semaine-04'];
	var tDay =  ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];


	if (sFormat == "month"){

		lData = tweek;
		for (let key in pdData) {
			if( key/7 <= 1 ) {

				if(!dData.includes(dData[0])){
					dData[0]= pdData[key];
				}else{
					dData[0]+= pdData[key];
				}

			} else if(key/7 >1 && key/7<=2 ) {

				if(!dData.includes(dData[1])){
					dData[1]= pdData[key];
				}else{
					dData[1]+= pdData[key];
				}

			} else if(key/7 >1 && key/7<=2 ) {
				if(!dData.includes(dData[2])){
					dData[2]= pdData[key]
				}else{
					dData[2]+= pdData[key];
				}
			} else if(key/7 >3) {
				if(!dData.includes(dData[3])){
					dData[3]= pdData[key];
				}else{
					dData[3]+= pdData[key];
				}
			}
		}
		
		console.log(lData);
		console.log(dData);
		drawGraph(lData, dData, canvasId);
		
	}else if (sFormat == "week"){
		lData =  tDay;
		dData =  pdData;


		console.log(lData);
		console.log(dData);
		
		drawGraph(lData, dData, canvasId);

	}else if (sFormat == "year") {

		currentTable = tYear;
		console.log(currentTable);
		console.log(pdData);

		for(i=0; i<currentTable.length; i++){
			let con = true;
			if(!lData.includes(currentTable[i])){
				for (let key in pdData) {
					if(i == key){
						lData.push(currentTable[i]);
						dData.push(pdData[key]);
						con = false;
					}
				}
				if(con){
					lData.push(currentTable[i]);
					dData.push(0);
				}
			}
		}

		drawGraph(lData, dData, canvasId);
	} else {
			console.log("ya un problem");
	}	
}


function drawGraph(lData, dData, canvasId){
		// <canvas id="myChart"></canvas>
	new Chart(document.getElementById(canvasId), {
		type: 'bar',
		data: {
		labels: lData ,
		datasets: [
			{
			label: "Nombre d\'utilisateur inscrit ",
			backgroundColor: 'rgb(255, 99, 132)',
			borderColor: 'rgb(255, 99, 132)',
			hoverBackgroundColor:'rgb(17, 21, 49)',
			data: dData,
			}
		]
		},
		options: {
		legend: { display: false },
		title: {
			display: true,
			text: 'Nombre d\'utilisateur inscrit ',
		}
		}
	});

}



