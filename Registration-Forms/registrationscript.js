// slide in/out sidenav
function openSidebar(selected) {
    if(selected) {
        document.getElementById("sidenav").style.right = "0px";
    } else {
        document.getElementById("sidenav").style.right = "";
    }
}

//file size

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

