function myFunction() {
    let tiempo = document.getElementById("tiempo");
    
    if (document.getElementById("hobby").value == "ninguno") {
        tiempo.disabled = true;
        tiempo.selectedIndex = 0;
    } else {
        tiempo.disabled = false;
    }
}