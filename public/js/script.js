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