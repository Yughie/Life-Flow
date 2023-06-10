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


//fade-in/slideup sign-up pop-up 
function openSignUp() {
    document.querySelector("#signup").style.top = "50%";
    document.querySelector("#signup").style.display = "block";
    document.querySelector('#signup').classList.add('fadein');
}


//fade-out/slidedown sign-up pop-up
function closeSignUp() {
    document.querySelector("#signup").style.top = "150%";
    document.querySelector('#signup').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#signup').classList.remove('fadeout');
    }, 300)
}

//fade-in recipient sign up 
window.onload = function() {
    document.querySelector('#recipReg').style.display = 'none';
};

function openRecipientReg() {
    document.querySelector("#recipReg").style.display = "flex";
    document.querySelector('#recipReg').classList.add('fadein');
    closeSignUp();
    openSignUp = undefined;
}



