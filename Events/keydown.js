//Tasten-Events (keydown, keypress, keyup):
document.addEventListener("keydown", function(event){
    if (event.key === "Enter") {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "https://api.example.com/data", true);
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                document.getElementById("keydown").innerHTML = this.responseText;
            }
        };
        xhr.send();
    }
});
