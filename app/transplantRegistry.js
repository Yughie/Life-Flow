let TRoptions = document.querySelectorAll("input[name='transplantDonor']");
let TRcontainers = document.querySelectorAll(".transplantDonor");
let TRvalue = null;

let TRfindSelected = () => {
  selected = document.querySelector("input[name='transplantDonor']:checked").value;
  console.log(selected);
  for(let i = 1; i <= TRoptions.length; i++){
    if(selected == i){
      TRcontainers[i -1].style.backgroundColor = "#5ab0c7";
      TRvalue = i;
    }
    else{
      TRcontainers[i-1].style.backgroundColor = "#e9e9e9";
    }
  }
}

TRoptions.forEach(TRoptions => {
  TRoptions.addEventListener("change", TRfindSelected);
});








let TDoptions = document.querySelectorAll("input[name='transplantRecipient']");
let TDcontainers = document.querySelectorAll(".transplantRecipient");
let TDvalue = null;

let TDfindSelected = () => {
  selected = document.querySelector("input[name='transplantRecipient']:checked").value;
  console.log(selected);
  for(let i = 1; i <= TDoptions.length; i++){
    if(selected == i){
      TDcontainers[i -1].style.backgroundColor = "#5ab0c7";
      TDvalue = i;
    }
    else{
      TDcontainers[i-1].style.backgroundColor = "#e9e9e9";
    }
  }
}

TDoptions.forEach(TDoptions => {
  TDoptions.addEventListener("change", TDfindSelected);
});







