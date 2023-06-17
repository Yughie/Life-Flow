/*
window.onload = function() {
    document.querySelector('.recipDashb').style.display = 'none';
}; */

function openSidebar(selected) {
    if(selected) {
        document.getElementById("sidebar").style.left = "0px";
        document.getElementById("menubtn").style.left = "243px";
        document.getElementById("menubtn").style.background = "lightcoral";
        document.getElementById("menubtn").style.boxShadow = "none";
    } else {
        document.getElementById("sidebar").style.left = "";
        document.getElementById("menubtn").style.left = "";
        document.getElementById("menubtn").style.background = "";
        document.getElementById("menubtn").style.boxShadow = "";
    }
}

function darkMode(selected) {
    var recipDashbBody = document.querySelector(".recip_dashb_body");

    if (selected) {
        recipDashbBody.style.setProperty("transition", "background-color 0.3s ease, color 0.3s ease-in-out");
        recipDashbBody.style.setProperty("--sidebar-background", "#46424F");
        recipDashbBody.style.setProperty("--dark-text", "white");
        recipDashbBody.style.setProperty("--dashbBG", "#1A1625");
        recipDashbBody.style.setProperty("--shadow", "transparent");
        recipDashbBody.style.setProperty("--babyblue", "#2F2B3A");
        recipDashbBody.style.setProperty("--lightpink", "#2F2B3A");
        recipDashbBody.style.setProperty("--whiteBox", "#1A1625");
        recipDashbBody.style.setProperty("--rowRightTxt", "#2F2B3A");
        recipDashbBody.style.setProperty("--rowLeftBG", "#2F2B3A");
        recipDashbBody.style.setProperty("--btypeBG", "A688FA");
        recipDashbBody.style.setProperty("--orgCountTxt", "white");
        recipDashbBody.style.setProperty("--bloodCountTxt", "white");
    } else {
        recipDashbBody.style.setProperty("transition", "background-color 0.3s ease, color 0.3s ease-in-out");
        recipDashbBody.style.setProperty("--sidebar-background", "");
        recipDashbBody.style.setProperty("--dark-text", "");
        recipDashbBody.style.setProperty("--dashbBG", "");
        recipDashbBody.style.setProperty("--shadow", "");
        recipDashbBody.style.setProperty("--babyblue", "");
        recipDashbBody.style.setProperty("--lightpink", "");
        recipDashbBody.style.setProperty("--whiteBox", "");
        recipDashbBody.style.setProperty("--rowRightTxt", "");
        recipDashbBody.style.setProperty("--rowLeftBG", "");
        recipDashbBody.style.setProperty("--btypeBG", "");
        recipDashbBody.style.setProperty("--orgCountTxt", "");
        recipDashbBody.style.setProperty("--bloodCountTxt", "");
    }
}