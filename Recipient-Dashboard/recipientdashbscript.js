
window.onload = function() {
    document.querySelector('.recipDashb').style.display = "none";
    document.querySelector('.donors').style.display = "none";
    document.querySelector('.userProfile').style.scale = "none";
}; 

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

// open dashboard
function openDashB() {
    document.querySelector('.recipDashb').style.display = "block";
    closeDonors();
}

// close dashboard
function closeDashB() {
    document.querySelector('.recipDashb').style.display = "none";
}

// open donors
function openDonors() {
    document.querySelector('.donors').style.display = "block";
    closeDashB();
    closeUser();
    closeChangePass();
}

// close donors
function closeDonors() {
    document.querySelector('.donors').style.display = "none";
}

// open user profile
function openUser() {
    document.querySelector('.userProfile').style.display = "flex";
    closeDashB();
    closeDonors();
}

// close user profile
function closeUser() {
    document.querySelector('.userProfile').style.display = "none";
}

// open change pass
function openChangePass() {
    document.querySelector('.changePass').style.scale = "1";
}

// open change pass
function closeChangePass() {
    document.querySelector('.changePass').style.scale = "0";
}


// Function to load the table content
function loadTable(page) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the table content
            document.getElementById("donors-table").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "load-table.php?page=" + page, true);
    xmlhttp.send();
}

// Function to load the table content initially
function initializeTable() {
    loadTable(1);
}

// Event listener for navigation links
document.addEventListener('DOMContentLoaded', function() {
    initializeTable();
    document.addEventListener('click', function(e) {
        if (e.target.matches('.pagination-link')) {
            e.preventDefault();
            var page = e.target.getAttribute('data-page');
            loadTable(page);
        }
    });
});


