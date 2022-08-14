<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person search script</title>
</head>
<body>

<form>
    <h4>Wyszukiwanie osób</h4>
    <label>Wpisz imię: </label>
    <input type="text" onkeyup="sugest(this.value)">
    <p>Pasujące wyniki: <span id="output"></span></p>
</form>

<script>
    function sugest(string) {
        
        if(string.lenght == 0) {            
            document.getElementById('output').innerHTML = "";

        } else {
            //ajax reqest
            var xmlhttp = new XMLHttpRequest();

            //wysłanie zapytania (zmienna string) ajax do sktyptu php w drugim pliku
            xmlhttp.open("GET", "search.php?query="+string, true);
            xmlhttp.send();
            
            // zwracanie odpowiedzi 
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) { // jeżeli odpowiedź jest gotowa - wypisanie odpowiedzi otrzymanej przez ajax
                    document.getElementById('output').innerHTML = this.responseText;
                } 
            }
        }
    }
</script>
    
</body>
</html>