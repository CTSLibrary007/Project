//Setting up light and dark themes

let lighticon = document.querySelector("#light-icon");
let darkicon = document.querySelector("#dark-icon");
let lighticontheme = document.querySelector("#light-icon-theme");
let darkicontheme = document.querySelector("#dark-icon-theme");

darkicon.onclick = () => {
    document.body.classList.toggle("light-theme");
    darkicon.style.display = "none";
    lighticon.style.display = "inline-block";
    darkicontheme.style.display = "none";
    lighticon.style.display = "block";
}
lighticon.onclick = () => {
    document.body.classList.toggle("light-theme");
    darkicon.style.display = "inline-block";
    lighticon.style.display = "none";
    darkicontheme.style.display = "block";
    lighticontheme.style.display = "none";
}
darkicontheme.onclick = () => {
    document.body.classList.toggle("light-theme");
    darkicon.style.display = "none";
    lighticon.style.display = "inline-block";
    darkicontheme.style.display = "none";
    lighticontheme.style.display = "block";
}
lighticontheme.onclick = () => {
    document.body.classList.toggle("light-theme");
    darkicon.style.display = "inline-block";
    lighticon.style.display = "none";
    darkicontheme.style.display = "block";
    lighticontheme.style.display = "none";
}

//Toggling suboption list

let suboption = document.querySelector('#option');
let suboptionicon = suboption.children[0];
let suboptionlist = suboption.children[1];
suboptionicon.onclick = () => {
    if(suboptionlist.className == "sublist") {
        suboptionicon.style.transform = "rotate(-180deg)";
        suboptionlist.className = "sublist show";
    }
    else if(suboptionlist.className == "sublist show" || mclick!=suboptionlist) {
        suboptionicon.style.transform = "rotate(0deg)";
        suboptionlist.className = "sublist";
    }
}
window.onclick = (e) => {
    if(e.target!=suboptionicon) {
        if(e.target!=suboptionlist) {
            suboptionicon.style.transform = "rotate(0deg)";
            suboptionlist.className = "sublist";
        }
    }
}

//Opening and closing of contact us page

document.querySelectorAll(".show-contactus")[0].addEventListener("click",function(){
    document.querySelector(".popup").classList.add("active");
})
document.querySelectorAll(".show-contactus")[1].addEventListener("click",function(){
    document.querySelector(".popup").classList.add("active");
})
document.querySelector(".popup .close-btn").addEventListener("click",function(){
    document.querySelector(".popup").classList.remove("active");
})

//Opening and closing of modal

let openmodal = document.querySelector("#open-modal");
let modal = document.querySelector("#modal");
openmodal.onclick = () => {
    modal.classList.add("modalshow");
    scrollVisibility();  //Correct
    // printf();
}
let closemodal = document.querySelector("#modal .close-btn");
closemodal.onclick = () => {
    modal.classList.remove("modalshow");
}

//Scrolling horizontally

let leftscroll = document.querySelector("#leftarrow");
let rightscroll = document.querySelector("#rightarrow");
let element = document.querySelector("#groupgrid-content");

let currentScrollPosition = element.scrollLeft;
let scrollAmount = 100;

leftscroll.onclick = () => {
    scrollHorizontally(-1);
    // console.log("Left clicked");
}

rightscroll.onclick = () => {
    scrollHorizontally(1);
    // console.log("Right clicked");
}

element.addEventListener('scroll', () => {
    // console.log("scrolled");
    scrollVisibility();
})

function scrollHorizontally(val) {
    element.scrollBy({
        top: 0,
        left: val*scrollAmount,
        behavior: 'smooth'
    });
    // console.log(element.scrollLeft);
    scrollVisibility();
}

function scrollVisibility() {
    if(element.scrollWidth - element.clientWidth == element.scrollLeft) {
        // console.log("End of right scroll");
        rightscroll.style.transform = "scale(0)";
    }
    else {
        // console.log("Continue scrolling right");
        rightscroll.style.transform = "scale(1)";
    }

    if(element.scrollLeft == 0) {
        // console.log("End of left scroll");
        leftscroll.style.transform = "scale(0)";

    }
    else {
        // console.log("Continue scrolling left");
        leftscroll.style.transform = "scale(1)";
    }
}