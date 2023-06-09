//carorousel auto play
var counter = 1;
setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
        if(counter > 3){
            counter = 1;
        }
}, 5000);


//sidenav open/close
function openSidebar(selected) {
    if(selected) {
        document.getElementById("sidenav").style.display = "";
    } else {
        document.getElementById("sidenav").style.display = "none";
    }
}
