const TOP_OFFSET_FOR_HEADER_SHRINK = 100;
const INITIAL_LOGO_HEIGHT = 115;
const FINAL_LOGO_HIEGHT = 60;
const OFFSET_COLOR_INDICATION = 200;

var sections = document.getElementsByClassName("navbar-section");
var navItens = document.getElementById("navbar").getElementsByClassName("navbar-item");


function onWindowScroll() {

    let logo = document.getElementById("logo-navbar");

    if (document.body.scrollTop > TOP_OFFSET_FOR_HEADER_SHRINK ||
        document.documentElement.scrollTop > TOP_OFFSET_FOR_HEADER_SHRINK) {

        logo.style.height = `${FINAL_LOGO_HIEGHT}px`;

    } else {

        logo.style.height = `${INITIAL_LOGO_HEIGHT}px`;

    }
    
    var heigthForChange = document.documentElement.scrollTop + FINAL_LOGO_HIEGHT + OFFSET_COLOR_INDICATION;
    
    for (i=0; i < sections.length; i++){
        // if pass this section
        if (sections[i].offsetTop < heigthForChange){
            if (i == sections.length-1){
                changeColorActive (i);
            } else {
                // and not de next one
                if (sections[i+1].offsetTop > heigthForChange){
                    changeColorActive (i);
                }
            }
        }
    }
    
    // end of page
    if (window.scrollY + window.innerHeight >= document.body.scrollHeight){
       changeColorActive (sections.length-1);
    }
    
}        

function changeColorActive (active){
    for (i=0; i < navItens.length; i++){
        navItens[i].style.color = "#007cc3";
    }
    navItens[active].style.color = "#3bb3c2";
}

function showDropdonw (liDropdown){
    liDropdown.getElementsByClassName("dropdown-content")[0].style.display = "block";
}

if ( document.getElementById("navbar-area-de-atuacao") !== null){
    var liDropdown = document.getElementById("navbar-area-de-atuacao").getElementsByClassName("dropdown active")[0];
    console.log
    liDropdown.getElementsByClassName("dropdown-content")[0].style.display = "none";
    liDropdown.onclick = function(){showDropdonw(liDropdown)};
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        console.log(event.target)
      if (event.target !== liDropdown.getElementsByClassName("dropbtn navbar-item")[0]) {
        console.log("if")
        liDropdown.getElementsByClassName("dropdown-content")[0].style.display = "none"
      }
    }
}




window.addEventListener('scroll', onWindowScroll);