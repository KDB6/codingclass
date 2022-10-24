// 닫기 버튼
const loginPopup = document.querySelector(".login__popup");
const close_btn = document.querySelector(".close_btn");

close_btn.addEventListener("click", () => {
    loginPopup.classList.add("close");
    loginPopup.classList.remove(".show")
    loginPopup.classList.add(".hide")
});