// Using pure JavaScript
window.onload = function() {
    // Include Header
    fetch("pages\Header_Footer\header.html")
        .then(response => response.text())
        .then(data => document.querySelector("header").innerHTML = data);

    // Include Footer
    fetch("pages\Header_Footer\footer.html")
        .then(response => response.text())
        .then(data => document.querySelector("footer").innerHTML = data);
}

// Using jQuery
$(function(){
    $("header").load("pages\Header_Footer\header.html"); 
    $("footer").load("pages\Header_Footer\footer.html"); 
});