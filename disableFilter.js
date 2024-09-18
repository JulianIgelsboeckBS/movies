
window.onload = function () {
    alert("Page loaded");
}

document.getElementById('disableFilter').addEventListener("click",hideFilter);

//document.getElementsByClassName("search-form").addEventListener("submit",log);



document.getElementById("searchfield").addEventListener("input",checkfilter);

function checkfilter (){
    let selectedValues = [];
    const selects = document.querySelectorAll('select');
    selects.forEach(select => {
        Array.from(select.options).forEach(option => {
            if (option.selected) {
                selectedValues.push(option.value);
            }
        });
    });
    //console.log(selectedValues);

    const isFilterSelected = containsAlphaNumeric(selectedValues);
    if(!isFilterSelected){
        alert("Bitte einen Filter auswählen!")
    }
    //console.log(isFilterSelected);

    function containsAlphaNumeric(arr) {
        const alphaNumericRegex = /^[a-zA-Z0-9]+$/;
    
        return arr.some(item => alphaNumericRegex.test(item));
    }   
   
    // const array = [, '%!', '123', , '!', '456'];
    // const result = containsAlphaNumeric(array);
    // console.log(result);    
}

function hideFilter(){    
    
    if(document.getElementById('disableFilter').innerHTML == "Filter ausblenden"){
        document.getElementById('disableFilter').innerHTML = "Filter anzeigen";
        document.getElementById('filters').style.display = "none";
        getValues();
        document.getElementById('output').style.display = "block";
       
    }
    else{
        document.getElementById('disableFilter').innerHTML = "Filter ausblenden";
        document.getElementById('filters').style.display = "block";
        document.getElementById('output').style.display = "none";
    }
     
}    
   
    function getValues() {
        
        let selectedValues = [];
        
        const selects = document.querySelectorAll('select');
       
        selects.forEach(select => {            
            Array.from(select.options).forEach(option => {                
                if (option.selected) {
                    selectedValues.push(option.value);
                }
            });
        });        
        console.log(selectedValues);
        
        document.getElementById('output').innerText = selectedValues.length > 0
            ? 'Kategorie: ' + selectedValues[0] + '\nJahr: ' + selectedValues[1] + '\nBewertung: ' + selectedValues[2]+ '\nStreamdienst: '+selectedValues[3]
            : 'Keine Werte ausgewählt.';
    }




