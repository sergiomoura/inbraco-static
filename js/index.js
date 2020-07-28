// When the user scrolls down 50px from the top of the document, resize the header's font size
window.addEventListener('scroll', scrollFunction);

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        document.getElementById("logo-navbar").style.height = "60px";
    } else {
        document.getElementById("logo-navbar").style.height = "115px";
    }
}