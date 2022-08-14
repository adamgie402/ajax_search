<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form>
    <label>Wyszukiwanie osób: </label>
    <input type="text" onkeyup="sugest(this.value)">
    <p>Pasujące wyniki: <span id="output"></span></p>
</form>

<script>
    function sugest(string) {
        
        // document.getElementById('sugest-output').innerHTML = string;
        // console.log(string);

        if(string.lenght == 0) {            
            document.getElementById('output').innerHTML = "";

        } else {
            //ajax reqest
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    //jeżeli jest odpowiedź - wypisanie odpowiedzi otrzymanej przez ajax
                    document.getElementById('output').innerHTML = this.responseText;
                }
            }
            //wysłanie zapytania ajax do sktyptu php w drugim pliku
            xmlhttp.open("GET", "ajax2.php?query="+string, true);
            xmlhttp.send();
        }
    }
</script>
    
</body>
</html>