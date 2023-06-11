const Onegative = document.querySelector('.bloodtype1');
const Opositive = document.querySelector('.bloodtype2');
const Bnegative = document.querySelector('.bloodtype3');
const Bpositive = document.querySelector('.bloodtype4');
const Anegative= document.querySelector('.bloodtype5');
const Apositive = document.querySelector('.bloodtype6');
const ABnegative = document.querySelector('.bloodtype7');
const ABpositive = document.querySelector('.bloodtype8');

const name1 = document.querySelector('.bloodtype__name1');
const name2 = document.querySelector('.bloodtype__name2');
const name3 = document.querySelector('.bloodtype__name3');
const name4 = document.querySelector('.bloodtype__name4');
const name5 = document.querySelector('.bloodtype__name5');
const name6 = document.querySelector('.bloodtype__name6');
const name7 = document.querySelector('.bloodtype__name7');
const name8 = document.querySelector('.bloodtype__name8');


const count1 = document.querySelector('.bloodtype__count1');
const count2 = document.querySelector('.bloodtype__count2');
const count3 = document.querySelector('.bloodtype__count3');
const count4 = document.querySelector('.bloodtype__count4');
const count5 = document.querySelector('.bloodtype__count5');
const count6 = document.querySelector('.bloodtype__count6');
const count7 = document.querySelector('.bloodtype__count7');
const count8 = document.querySelector('.bloodtype__count8');



let bloodtype = 0;
let check = false;

let checker = 0;


/********************1*********************** */
Onegative.addEventListener('click', function(){
    //console.log(bloodtype);
    
    if(check == false){
        check = true;
        bloodtype =1;
        console.log(bloodtype);
        name1.style.height = "100%";
        count1.style.height = "0px";
        count1.style.visibility = "hidden";
        checker++;
        console.log("checker" + checker);
    }
    else{
        check = false;
        bloodtype = 0;
        name1.style.height = "40%";
        count1.style.height = "100%";
        count1.style.visibility = "visible";
        checker--;
        console.log("checker" + checker);
    }
});


/********************2************************/

Opositive.addEventListener('click', function(){
    
    if(check == false){
        check = true;
        bloodtype =2;
        console.log(bloodtype);
        name2.style.height = "100%";
        count2.style.height = "0px";
        count2.style.visibility = "hidden";
        checker++;
        console.log("checker" + checker);
    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name2.style.height = "40%";
        count2.style.height = "100%";
        count2.style.visibility = "visible";
        checker--;
        console.log("checker" + checker);
    }
});

/********************3*********************** */
Bnegative.addEventListener('click', function(){
    if(check == false){
        check = true;
        bloodtype =3;
        console.log(bloodtype);
        name3.style.height = "100%";
        count3.style.height = "0px";
        count3.style.visibility = "hidden";

    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name3.style.height = "40%";
        count3.style.height = "100%";
        count3.style.visibility = "visible";
    }
});

/********************4*********************** */

Bpositive.addEventListener('click', function(){
    if(check == false){
        check = true;
        bloodtype =4;
        console.log(bloodtype);
        name4.style.height = "100%";
        count4.style.height = "0px";
        count4.style.visibility = "hidden";

    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name4.style.height = "40%";
        count4.style.height = "100%";
        count4.style.visibility = "visible";
    }
});

/********************5*********************** */

Anegative.addEventListener('click', function(){
    if(check == false){
        check = true;
        bloodtype =5;
        console.log(bloodtype);
        name5.style.height = "100%";
        count5.style.height = "0px";
        count5.style.visibility = "hidden";

    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name5.style.height = "40%";
        count5.style.height = "100%";
        count5.style.visibility = "visible";
    }
});

/********************6*********************** */

Apositive.addEventListener('click', function(){
    if(check == false){
        check = true;
        bloodtype = 6;
        console.log(bloodtype);
        name6.style.height = "100%";
        count6.style.height = "0px";
        count6.style.visibility = "hidden";

    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name6.style.height = "40%";
        count6.style.height = "100%";
        count6.style.visibility = "visible";
    }
});

/********************7*********************** */

ABnegative.addEventListener('click', function(){
    if(check == false){
        check = true;
        bloodtype = 7;
        console.log(bloodtype);
        name7.style.height = "100%";
        count7.style.height = "0px";
        count7.style.visibility = "hidden";

    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name7.style.height = "40%";
        count7.style.height = "100%";
        count7.style.visibility = "visible";
    }
});

/********************8*********************** */


ABpositive.addEventListener('click', function(){
    if(check == false){
        check = true;
        bloodtype = 8;
        console.log(bloodtype);
        name8.style.height = "100%";
        count8.style.height = "0px";
        count8.style.visibility = "hidden";

    }
    else{
        check = false;
        bloodtype = 0;
        console.log(bloodtype);
        name8.style.height = "40%";
        count8.style.height = "100%";
        count8.style.visibility = "visible";
    }
});

