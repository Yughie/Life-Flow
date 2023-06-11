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

window.onload = function() {
    document.querySelector('#recipReg').style.display = 'none';
};
// open recipient sign up form 
function openRecReg() {
    document.querySelector("#recipReg").style.top = "50%";
    document.querySelector("#recipReg").style.display = "flex";
    document.querySelector('#recipReg').classList.add('fadein');
    closeSignUp();
}

// close recipient sign up form 
function closeRecReg() {
    document.querySelector("#recipReg").style.top = "150%";
    document.querySelector('#recipReg').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#recipReg').classList.remove('fadeout');
    }, 300)
}

// checks if password matches
var check = function() {
    if (document.getElementById('passInput').value == document.getElementById('confirmPassInput').value) {
        document.getElementById('indicator').style.color = 'rgb(12, 173, 138)';
        document.getElementById('indicator2').style.color = 'rgb(12, 173, 138)';
    } else {
        document.getElementById('indicator').style.color = 'red';
        document.getElementById('indicator2').style.color = 'red';
    }
}
  
