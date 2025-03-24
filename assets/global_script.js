document.addEventListener("click", handleEvent);
window.addEventListener("resize", handleResize);

function handleEvent(event){
    var mobileNav = document.getElementById("mobileNav");
    var display = mobileNav.style.display;
    if(event.target.id == "hamburger" || event.target.classList.contains("hamburgerDiv")){
        if(display =="none") {
            mobileNav.style.display = "inline-block";
        } else if(display == "inline-block") {
            mobileNav.style.display = "none";
        }
    } else {
        if(display == "inline-block"){
            mobileNav.style.display ="none";
        }
    }
}

function handleResize() {
    var mobileNav = document.getElementById("mobileNav");
    var display = mobileNav.style.display;
    if(display == "inline-block") {
        mobileNav.style.display = "none";
    }
}

function goToPage(title, id){
    window.location.replace("https://people.rit.edu/oms4556/FCS/flower-city-sound/view/artistPgTemplate.php");
}

// document.getElementById("txtChange").addEventListener("load", txtChange());
function txtChange(){
    var txt = document.getElementById("txtChange");
    console.log(txt);
    var words = ["Blues", "Classical", "Country", "Electronic", "Folk", "Hip-Hop", "Rap", "Jazz", "Pop", "R&B", "Soul", "Rock", "Metal", "Sound"];
}