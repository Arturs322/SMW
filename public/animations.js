function message() {
    document.getElementById("main_place").style.display = "none";
    document.getElementById("comment").style.display = "none";
    document.getElementById("hidden").style.display = "block";
    document.getElementById("bck-btn").style.display = "block";
    document.getElementById("lines").style.transform = "rotate(180deg)";
}

function back() {
    document.getElementById("main_place").style.display = "flex";
    document.getElementById("comment").style.display = "block";
    document.getElementById("hidden").style.display = "none";
    document.getElementById("bck-btn").style.display = "none";
    document.getElementById("lines").style.transform = "rotate(360deg)";

}

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
    setTimeout(message, 500);
}