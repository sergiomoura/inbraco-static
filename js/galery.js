// Get the modal
console.log("teste");
var modal = document.getElementById("modalGalery");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img-galery-modal");
var captionText = document.getElementById("caption-galery-modal");
var imgs = document.getElementsByClassName("img-galery");
for (i = 0; i < imgs.length; i++) {
    imgs[i].onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
}

// Get the <span> element that closes the modal
var span = document.getElementById("closeModal");

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
