function dashboardtogglePopup(){
    document.getElementById("dashboard-popup-1").classList.toggle("active");
    document.getElementById("dashboard-popup-1").style.scale = "0";
    
}


function dashboardopenPopup(){
    document.getElementById("dashboard-popup-1").style.scale = "1";
   
}



function dashboardtogglePopupUpdate(){
    document.getElementById("dashboard-popup-1-update").classList.toggle("active");
    document.getElementById("dashboard-popup-1-update").style.scale = "0";
    
}


function dashboardopenPopupUpdate(){
    document.getElementById("dashboard-popup-1-update").style.scale = "1";
   
}



const editButtons = document.querySelectorAll('.edit-button');

    // Attach a click event listener to each edit button
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Retrieve the user ID from the data-user-id attribute
            const userId = button.dataset.userId;
            console.log(userId);
            // Toggle the visibility of the corresponding edit form
            const editForm = document.querySelector('.edit-form' + userId);
            editForm.style.scale = "1";
        });
    });


    const closeButtons = document.querySelectorAll('.close-button');

    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Retrieve the user ID from the data-user-id attribute
            const btnId = button.dataset.btnId;
            console.log(btnId);
            // Toggle the visibility of the corresponding edit form
            const closeForm = document.querySelector('.edit-form' + btnId);
            closeForm.style.scale = "0";

            

        });
    });


    const overlayButtons = document.querySelectorAll('.overlay-button');

    overlayButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Retrieve the user ID from the data-user-id attribute
            const overlayId = button.dataset.overlayId;
            console.log(overlayId);
            // Toggle the visibility of the corresponding edit form
            const closeForm = document.querySelector('.edit-form' + overlayId);
            closeForm.style.scale = "0";

            button.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                console.log('button Pressed');
                  closeForm.style.scale = "0";
                }
              });


    
        });
    });

