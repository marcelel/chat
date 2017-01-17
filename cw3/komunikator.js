
/**
 * Created by marcel on 17.01.17.
 */

function check() {
    return document.getElementById("check").checked;
}

function chechNickAndMessage() {
    return (document.getElementById("nick").value) && (document.getElementById("message").value);
}

function display() {
    document.getElementById("text").innerHTML = ""; //cleaning chat
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 3 && xhttp.status == 200) {
            if (check()){
                document.getElementById("text").innerHTML = xhttp.responseText;
            }
        }
        if (xhttp.readyState == 4){
            setTimeout(function () {
                xhttp.open("GET", "messages.php", true);
                xhttp.send();
            }, 500); // minimizing frequency of creation connection with server
        }
    };
    xhttp.open("GET", "messages.php", true);
    xhttp.send();
}

function send() {
    if (check() && chechNickAndMessage()){
        var xhttp = new XMLHttpRequest();
        var nick = document.getElementById("nick").value;
        var message = document.getElementById("message").value;
        var page = "send.php?nick=" + nick + "&message=" + message;
        xhttp.open("GET", page, true);
        xhttp.send();
        document.getElementById("message").value = "";
        document.getElementById("nick").value = ""; //cleaning bufor
    }
}