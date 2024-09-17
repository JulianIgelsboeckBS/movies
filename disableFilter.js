window.onload = output();
let output = function () {
    alert("Page loaded");
}

// window.onload = function () {
//     alert("Page loaded");
// }

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

document.getElementById('disableFilter').addEventListener(onclick,hideFilter());



      
   
    function getValues() {
        // Ein Array für die ausgewählten Werte
        let selectedValues = [];

        // Alle Select-Elemente im Formular abrufen
        const selects = document.querySelectorAll('select');

        // Durch die Select-Elemente iterieren
        selects.forEach(select => {
            // Durch alle Optionen des Select-Elements iterieren
            Array.from(select.options).forEach(option => {
                // Nur ausgewählte Optionen hinzufügen
                if (option.selected) {
                    selectedValues.push(option.value);
                }
            });
        });

        // Das Array mit den Werten in der Konsole ausgeben
        console.log(selectedValues);

        // Optional: die Werte auch im HTML ausgeben
        document.getElementById('output').innerText = selectedValues.length > 0
            ? 'Kategorie: ' + selectedValues[0] + '\nJahr: ' + selectedValues[1] + '\nBewertung: ' + selectedValues[2]+ '\nStreamdienst: '+selectedValues[3]
            : 'Keine Werte ausgewählt.';
    }




