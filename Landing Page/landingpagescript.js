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
    document.querySelector("#signup").style.top = "50%";
    document.querySelector("#signup").style.display = "block";
    document.querySelector('#signup').classList.add('fadein');
}


//slide down sign-up
function closeSignUp(selected) {
    document.querySelector("#signup").style.top = "150%";
    document.querySelector('#signup').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#signup').classList.remove('fadeout');
    }, 300)
}

// close recipient sign up pop-up on outside click



