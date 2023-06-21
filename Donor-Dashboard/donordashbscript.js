
window.onload = function() {
    document.querySelector('.donDashb').style.display = "flex";
    document.querySelector('.donors').style.display = "none";
    document.querySelector('.userProfile').style.display = "none";
    document.querySelector('.changePass').style.display = "none";
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
    var donDashbBody = document.querySelector(".recip_dashb_body");

    if (selected) {
        donDashbBody.style.setProperty("transition", "background-color 0.3s ease, color 0.3s ease-in-out");
        donDashbBody.style.setProperty("--sidebar-background", "#46424F");
        donDashbBody.style.setProperty("--dark-text", "white");
        donDashbBody.style.setProperty("--dashbBG", "#1A1625");
        donDashbBody.style.setProperty("--shadow", "transparent");
        donDashbBody.style.setProperty("--babyblue", "#2F2B3A");
        donDashbBody.style.setProperty("--lightpink", "#2F2B3A");
        donDashbBody.style.setProperty("--whiteBox", "#1A1625");
        donDashbBody.style.setProperty("--rowRightTxt", "#2F2B3A");
        donDashbBody.style.setProperty("--rowLeftBG", "#2F2B3A");
        donDashbBody.style.setProperty("--btypeBG", "A688FA");
        donDashbBody.style.setProperty("--orgCountTxt", "white");
        donDashbBody.style.setProperty("--bloodCountTxt", "white");
    } else {
        donDashbBody.style.setProperty("transition", "background-color 0.3s ease, color 0.3s ease-in-out");
        donDashbBody.style.setProperty("--sidebar-background", "");
        donDashbBody.style.setProperty("--dark-text", "");
        donDashbBody.style.setProperty("--dashbBG", "");
        donDashbBody.style.setProperty("--shadow", "");
        donDashbBody.style.setProperty("--babyblue", "");
        donDashbBody.style.setProperty("--lightpink", "");
        donDashbBody.style.setProperty("--whiteBox", "");
        donDashbBody.style.setProperty("--rowRightTxt", "");
        donDashbBody.style.setProperty("--rowLeftBG", "");
        donDashbBody.style.setProperty("--btypeBG", "");
        donDashbBody.style.setProperty("--orgCountTxt", "");
        donDashbBody.style.setProperty("--bloodCountTxt", "");
    }
}

// open dashboard
function openDashB() {
    document.querySelector('.donDashb').style.display = "flex";
    closeDonors();
    closeUser();
    closeChangePass();
}

// close dashboard
function closeDashB() {
    document.querySelector('.donDashb').style.display = "none";
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
    closeChangePass();
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


