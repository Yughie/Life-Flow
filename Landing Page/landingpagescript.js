//carorousel auto play
var counter = 1;
setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
        if(counter > 3){
            counter = 1;
        }
}, 5000);


//slide in/out sidenav
function openSidebar(selected) {
    if(selected) {
        document.getElementById("sidenav").style.right = "0px";
    } else {
        document.getElementById("sidenav").style.right = "";
    }
}

//slide up sign-up pop-up 
function openSignUp(selected) {
    document.getElementById("signup").style.top = "50%";
}

//slide down sign-up
function closeSignUp(selected) {
    document.getElementById("signup").style.top = "200%";
}
