//Professionel and Domain d'activite
const selectedInputs = document.querySelector('#domainTraveaux');
const SelectedDomain = document.querySelector('#domainSelected');
const Domains = document.querySelectorAll('.domain');




/**
 * Select multiple domaine 
 */
var SelectedDomainID   = [];
var SelectedDomainName = [];
if (selectedInputs.value.length > 0 ){
    var SelectedDomainID   = selectedInputs.value.split(",");
}

if(SelectedDomain.value){
    var SelectedDomainName = SelectedDomain.value.split(",");
}

for (const domain of Domains) {
    domain.addEventListener('click', function(){
        SelectedDomainID.push(domain.value);
        SelectedDomainName.push(this.getAttribute('data-name'));
        selectedInputs.value  =  getUnique(SelectedDomainID);
        SelectedDomain.value  =  getUnique(SelectedDomainName);
    });
}



/**Delete deplicate item from the array */
function getUnique(array){
    var uniqueArray = [];
    for(var value of array){
        if(uniqueArray.indexOf(value) === -1){
            uniqueArray.push(value);
        }
    }
    return uniqueArray;
}


//Stickr en locale storage
// console.log("---------------------------Local Storage-------------------------");
// localStorage.setItem('users', 'vilh'); 

// users = [
// 	{
//     	id: 1,
//         name: 'vilh',
//     },
//     {
//     	id: 2,
//         name: 'zidane'
//     },
// ]

// // set string 
// localStorage.setItem('users', users);	// stored objects
// localStorage.setItem('users', JSON.stringify(users));	// stored string

// // get
// var retrievedUsername = localStorage.getItem('users'); 

// console.log(localStorage.setItem('users', users) );
// console.log(localStorage.setItem('users', JSON.stringify(users)))



