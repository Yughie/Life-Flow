

function checkSelectedRadio() {
    var radio1 = document.querySelector('input[name="recip_boolBlood"][value="1"]');
    var radio2 = document.querySelector('input[name="recip_boolBlood"][value="0"]');
    let selectContainer = document.querySelector('.organOption');
    var select = document.querySelector("#recip_neededOrgan");
    let dateUrgency = document.querySelector('.dateUrgency');
    
    if (radio1.checked) {
        selectContainer.style.display = "none";
        
  

    } else if (radio2.checked) {
        selectContainer.style.display = "block";
       
    } else {
        console.log("No radio button is selected.");
    }
}
