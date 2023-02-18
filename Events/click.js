document.getElementById("click").addEventListener("click", function(){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.example.com/data", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("click").innerHTML = this.responseText;
        }
    };
    xhr.send();
});
