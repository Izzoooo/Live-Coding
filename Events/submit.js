document.getElementById("submit").addEventListener("submit", function(event){
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://api.example.com/data", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            document.getElementById("submit").innerHTML = this.responseText;
        }
    };
    xhr.send("name=" + document.getElementById("name").value + "&email=" + document.getElementById("email").value);
});
