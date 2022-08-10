"use strict"

const btn1 = document.querySelectorAll("input[type=button]");
const modal = document.querySelector("#modal");
modal.style.display = "block";

const contador = 0;



if(contador === 0){
    document.addEventListener("click", () => {
    
        modal.style.display = "none";

        contador++;
    
    });
}
