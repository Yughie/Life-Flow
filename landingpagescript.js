// carorousel auto play

var counter = 1;
setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
        if(counter > 3){
            counter = 1;
        }
}, 5000); 



// slide in/out sidenav
function openSidebar(selected) {
    if(selected) {
        document.getElementById("sidenav").style.right = "0px";
    } else {
        document.getElementById("sidenav").style.right = "";
    }
}


// fade-in/slideup sign-up pop-up 
function openSignUp() {
    document.querySelector("#signup").style.top = "50%";
    document.querySelector('#signup').style.boxShadow = "0 0 0 1600px rgba(0, 0, 0, 0.25)";
    document.querySelector("#signup").style.display = "block";
    document.querySelector('#signup').classList.add('fadein');
}
// fade-out/slidedown sign-up pop-up
function closeSignUp() {
    document.querySelector("#signup").style.top = "150%";
    document.querySelector('#signup').style.boxShadow = "0 0 0 0 rgba(0, 0, 0, 0)";
    document.querySelector('#signup').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#signup').classList.remove('fadeout');
    }, 300)
}


//---------------RECIPIENT SIGN-UP FORM---------------//
window.onload = function() {
    document.querySelector('#recipReg').style.display = 'none';
};
// open recipient sign up form 
function openRecReg() {
    document.querySelector("#recipReg").style.top = "50%";
    document.querySelector('#recipReg').style.boxShadow = "0 0 0 1600px rgba(0, 0, 0, 0.25)";
    document.querySelector("#recipReg").style.display = "flex";
    document.querySelector('#recipReg').classList.add('fadein');
    closeSignUp();
    closeRecipLogin();
}
// close recipient sign up form 
function closeRecReg() {
    document.querySelector("#recipReg").style.top = "150%";
    document.querySelector('#recipReg').style.boxShadow = "0 0 0 0 rgba(0, 0, 0, 0)";
    document.querySelector('#recipReg').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#recipReg').classList.remove('fadeout');
    }, 300)
}

//---------------DONOR SIGN-UP FORM---------------//
window.onload = function() {
    document.querySelector('#donReg').style.display = 'none';
};
// open donor sign up form 
function openDonReg() {
    document.querySelector("#donReg").style.top = "50%";
    document.querySelector('#donReg').style.boxShadow = "0 0 0 1600px rgba(0, 0, 0, 0.25)";
    document.querySelector("#donReg").style.display = "flex";
    document.querySelector('#donReg').classList.add('fadein');
    closeSignUp();
    closeRecipLogin();
    closeDonorLogin();
}

// close donor sign up form 
function closeDonReg() {
    document.querySelector("#donReg").style.top = "150%";
    document.querySelector('#donReg').style.boxShadow = "0 0 0 0 rgba(0, 0, 0, 0)";
    document.querySelector('#donReg').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#donReg').classList.remove('fadeout');
    }, 300)
}


//---------------LOGIN POP-UP---------------//
window.onload = function() {
    document.querySelector('#donorlogin').style.display = 'none';
    document.querySelector('#reciplogin').style.display = 'none';
};
// open login popup
function openDonorLogin() {
    document.querySelector("#donorlogin").style.top = "50%";
    document.querySelector('#donorlogin').style.boxShadow = "0 0 0 1600px rgba(0, 0, 0, 0.25)";
    document.querySelector("#donorlogin").style.display = "flex";
    document.querySelector('#donorlogin').classList.add('fadein');
    closeRecReg();
    closeDonReg()
}
// close login popup 
function closeDonorLogin() {
    document.querySelector("#donorlogin").style.top = "150%";
    document.querySelector('#donorlogin').style.boxShadow = "0 0 0 0 rgba(0, 0, 0, 0)";
    document.querySelector('#donorlogin').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#donorlogin').classList.remove('fadeout');
    }, 300)
}

function openRecipLogin() {
    document.querySelector("#reciplogin").style.top = "50%";
    document.querySelector('#reciplogin').style.boxShadow = "0 0 0 1600px rgba(0, 0, 0, 0.25)";
    document.querySelector("#reciplogin").style.display = "flex";
    document.querySelector('#reciplogin').classList.add('fadein');
    closeRecReg();
    closeDonReg()
    closeSignUp();
}
function closeRecipLogin() {
    document.querySelector("#reciplogin").style.top = "150%";
    document.querySelector('#reciplogin').style.boxShadow = "0 0 0 0 rgba(0, 0, 0, 0)";
    document.querySelector('#reciplogin').classList.add('fadeout');
    setTimeout(() => {
        document.querySelector('#reciplogin').classList.remove('fadeout');
    }, 300)
}



// checks if recipient password matches (for span indicator)
let check = function() {
    if (document.getElementById('passInput').value == document.getElementById('confirmPassInput').value) {
        document.getElementById('indicator').style.color = 'rgb(12, 173, 138)';
        document.getElementById('indicator2').style.color = 'rgb(12, 173, 138)';
    } else {
        document.getElementById('indicator').style.color = 'red';
        document.getElementById('indicator2').style.color = 'red';
    }
}

// checks if donor password matches (for span indicator)
let donCheck = function() {
    if (document.getElementById('donPassInput').value == document.getElementById('donConfirmPassInput').value) {
        document.getElementById('indicator3').style.color = 'rgb(12, 173, 138)';
        document.getElementById('indicator4').style.color = 'rgb(12, 173, 138)';
    } else {
        document.getElementById('indicator3').style.color = 'red';
        document.getElementById('indicator4').style.color = 'red';
    }
}
