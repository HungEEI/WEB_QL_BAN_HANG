
document.querySelector("#show-login").addEventListener("click", function () {
    document.querySelector(".popup").classList.add("active");
    document.querySelector("#overlay").style.display = "block";
});

document.querySelector(".popup .close-btn").addEventListener("click", function () {
    document.querySelector(".popup").classList.remove("active");
    document.querySelector("#overlay").style.display = "none";
});