
window.onload = function () {



    //document.getElementById('disableFilter').addEventListener("click",hideFilter);

    //document.getElementsByClassName("search-form").addEventListener("submit",log);

    //document.getElementById("searchfield").addEventListener("input",checkfilter);

    function checkfilter() {
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
        if (!isFilterSelected) {
            alert("Bitte einen Filter auswählen!")
        }
        //console.log(isFilterSelected);

        function containsAlphaNumeric(arr) {
            const alphaNumericRegex = /^[a-zA-Z0-9]+$/;

            return arr.some(item => alphaNumericRegex.test(item));
        }


    }

    function hideFilter() {

        if (document.getElementById('disableFilter').innerText == "Filter ausblenden") {
            document.getElementById('disableFilter').innerText = "Filter anzeigen";
            document.getElementById('filters').style.display = "none";
            getValues();
            document.getElementById('output').style.display = "block";

        }
        else {
            document.getElementById('disableFilter').innerText = "Filter ausblenden";
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
            ? 'Kategorie: ' + selectedValues[0] + '\nJahr: ' + selectedValues[1] + '\nBewertung: ' + selectedValues[2] + '\nStreamdienst: ' + selectedValues[3]
            : 'Keine Werte ausgewählt.';
    }

    document.getElementById("searchfield").addEventListener("input", searchfilter);

    // function searchfilter(){
    //     var movielist = document.getElementsByClassName("card-title");
    // var searchtext = document.getElementById("searchfield").value.toUpperCase();
    // for(let movie of movielist){
    //     var movietag = movie.getElementsByTagName("a")[0].innerHTML.toUpperCase();
    //     if(movietag.includes(searchtext)){
    //         movie.style.display = "block";
    //     }
    //     else{
    //         movie.style.display = "none";
    //     }
    // }

    // }

    function searchfilter() {
        var movielist = document.getElementsByClassName("card");
        var searchtext = document.getElementById("searchfield").value.toUpperCase();
        for (let movie of movielist) {
            var movietag = movie.getElementsByTagName("a")[0].innerHTML.toUpperCase();
            if (movietag.includes(searchtext)) {
                movie.style.display = "block";
            }
            else {
                movie.style.display = "none";
            }
        }

    }


}

