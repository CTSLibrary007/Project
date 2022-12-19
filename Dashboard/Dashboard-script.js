const theme = document.querySelector("#theme");

function themeclick() {
    theme.addEventListener("click", () => {
        theme.querySelector("span").classList.toggle("fa-moon");
        // theme.querySelector("span").classList.toggle("fa-solid");
    })
}

let sideopt = document.querySelectorAll('.sideopt');
// console.log(sideopt);
for(let i = 0;i<sideopt.length;i++) {
    sideopt[i].onclick = function() {
        let j = 0;
        while(j < sideopt.length) {
            sideopt[j++].className = "sideopt";
        }
        sideopt[i].className = "sideopt active"
    }
}



function setActiveClass(section, option) {
    if(section.getBoundingClientRect().top<=70 && section.getBoundingClientRect().bottom>=70) {
        if(option.className=="sideopt")
        option.className="sideopt active";
    }
    else {
        if(option.className=="sideopt active")
        option.className="sideopt";
    }
}

document.addEventListener("scroll", function() {
    const contentlist = document.querySelector(".sidebar").lastElementChild.children;
    const sections = document.querySelector(".main-content").children;
    for (let i = 0; i < sections.length; i++) {
        setActiveClass(sections[i],contentlist[i]);
    }
});

// document.querySelector(".sidebar").onmousemove = function() {
//     console.log("Over the sidebar");
//     document.querySelector(".main-content").style.overflow="hidden";
// };

let srbi = document.querySelectorAll('.search-results-bookinfo');
// console.log(sideopt);
for(let i = 0;i<srbi.length;i++) {
    srbi[i].onclick = function(e) {
        if(e.target != srbi[i].children[2] && e.target != srbi[i].children[2].children[0] && e.target != srbi[i].children[2].children[0].children[0]) {
            if(srbi[i].children[2].classList.contains("active")==false) {
                let j = 0;
                while(j < srbi.length) {
                    srbi[j].children[2].classList.remove("active");
                    srbi[j].children[1].lastElementChild.innerHTML = "Click to show options";
                    j++;
                }
                srbi[i].children[2].classList.add("active");
                srbi[i].children[1].lastElementChild.innerHTML = "Click to hide options";
            }
            else {
                srbi[i].children[2].classList.remove("active");
                srbi[i].children[1].lastElementChild.innerHTML = "Click to show options";
            }
        }
    }
}

const requestpaneloptions = document.querySelector("#request-panel-options");
const requestpanelrequests = document.querySelector("#request-panel-requests");

