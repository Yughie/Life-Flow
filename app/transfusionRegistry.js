let options = document.querySelectorAll("input[name='blooodtype']");
let names = document.querySelectorAll(".bloodtype__name");
let counts = document.querySelectorAll(".bloodtype__count");
var value = null;


let findSelected = () => {
  selected = document.querySelector("input[name='blooodtype']:checked").value;

  console.log(selected);
  for(let i = 1; i <= options.length; i++){
    if(selected == i){
      names[i-1].style.height = "100%";
      counts[i-1].style.height = "0px";
      counts[i-1].style.visibility = "hidden";
      value = i;
    }
    else{
      names[i-1].style.height = "40%";
      counts[i-1].style.height = "100%";
      counts[i-1].style.visibility = "visible";
    }
  }
}


