const menus = document.querySelectorAll('.navbar-nav .nav-item a');

const selectedInputs = document.querySelector('#domainTraveaux');
const SelectedDomain = document.querySelector('#domainSelected');
const Domains = document.querySelectorAll('.domain');



/**
 * Select multiple domaine
 */
for (const domain of Domains) {
    selectDomainID = [];
    selectDomainName = [];
    domain.addEventListener('click', function(){
        selectDomainID .push(domain.value);
        selectDomainName.push(this.getAttribute('data-name'));
        
        selectedInputs.value  = getUnique(selectDomainID);
        SelectedDomain.value = getUnique(selectDomainName);
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