var size;

function incfont() {
    var t = document.getElementById("fontsize").value;
    var x = document.getElementById("text");
    x.style.fontSize = t + "px";
    size = t;
    document.getElementById("text");
    x.style.fontSize = t + "px";
    size = t;
    document.getElementById("size").innerHTML = size;
}