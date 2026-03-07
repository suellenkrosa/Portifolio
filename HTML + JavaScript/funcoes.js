function displayOk(){
    var d = document.getElementById('btn');

    d.style.position = "absolute";
    d.style.left = Math.random() * window.innerWidth + "px";
    d.style.top = Math.random() * window.innerHeight + "px";
}
