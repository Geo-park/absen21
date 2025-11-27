const slide = document.getElementById("slidePanel");
const btnReg = document.getElementById("showRegister");
const btnLogin = document.getElementById("showLogin");

btnReg.addEventListener("click", () => {
    slide.classList.add("move");
});

btnLogin.addEventListener("click", () => {
    slide.classList.remove("move");
});
