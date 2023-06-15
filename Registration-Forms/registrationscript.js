// slide in/out sidenav
function openSidebar(selected) {
    if(selected) {
        document.getElementById("sidenav").style.right = "0px";
    } else {
        document.getElementById("sidenav").style.right = "";
    }
}

// user profile file size
function checkFileSize(input) {
    if (input.files.length > 0) {
        var fileSize = input.files[0].size; // File size in bytes
        var maxSize = 2 * 1024 * 1024; // 2MB in bytes

        if (fileSize > maxSize) {
            alert('File size exceeds the limit. Please choose a smaller file.');
            input.value = ''; // Clear the file input field
        }
    }
}

// lengths in number inputs
document.getElementById("recipFormID").addEventListener("submit", function(event) {
    var phoneInput = document.getElementById("phoneNum");
    var postal = document.getElementById("postal");

    if (phoneInput.value.length > 11) {
        event.preventDefault(); // Prevent form submission
        alert("Phone number should not exceed 11 digits.");
    }

    if (postal.value.length > 4) {
        event.preventDefault(); // Prevent form submission
        alert("Postal code should not exceed 4 digits.");
    }
});


function donblocker() {
    var blocker = document.querySelector("#blocker");
    var checkbox = document.querySelector("#ui-checkboxdonorg");

    if (checkbox.checked) {
        blocker.style.display = "none";
    } else {
        blocker.style.display = "block";
    }
}

function bloodblock() {
    var bloodblocker = document.querySelector("#bloodblocker");
    var organblocker = document.querySelector("#organblocker");
    var organblocker2 = document.querySelector("#organblocker2");
    var radio = document.querySelector("#recip_boolBlood");

    if (radio.checked) {
        bloodblocker.style.display = "none";
        organblocker.style.display = "block";
        organblocker2.style.display = "block";
    }
}

function organblock() {
    var bloodblocker = document.querySelector("#bloodblocker");
    var organblocker = document.querySelector("#organblocker");
    var organblocker2 = document.querySelector("#organblocker2");
    var radio = document.querySelector("#recip_boolOrganTissue");

    if (radio.checked) {
        bloodblocker.style.display = "block";
        organblocker.style.display = "none";
        organblocker2.style.display = "none";
    }
}

