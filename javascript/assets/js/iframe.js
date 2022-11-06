const modalB = document.querySelector(".modal__btn");
const iframe = document.querySelector("iframe");
const modalC = document.querySelector(".modal__close");

modalB.addEventListener("click", () => {
    iframe.style.display = "block"
})

modalC.addEventListener("click", () => {
    iframe.style.display = "none"
})