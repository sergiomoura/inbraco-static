const TOP_OFFSET_FOR_HEADER_SHRINK = 100;
const INITIAL_LOGO_HEIGHT = 115;
const FINAL_LOGO_HIEGHT = 60;

function onWindowScroll() {

    let logo = document.getElementById("logo-navbar");

    if (document.body.scrollTop > TOP_OFFSET_FOR_HEADER_SHRINK ||
        document.documentElement.scrollTop > TOP_OFFSET_FOR_HEADER_SHRINK) {

        logo.style.height = `${FINAL_LOGO_HIEGHT}px`;

    } else {

        logo.style.height = `${INITIAL_LOGO_HEIGHT}px`;

    }

}

window.addEventListener('scroll', onWindowScroll);