document.getElementById("mouseover").addEventListener("mouseover", function(){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.example.com/data", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("mouseover").innerHTML = this.responseText;
        }
    };
    xhr.send();
});
