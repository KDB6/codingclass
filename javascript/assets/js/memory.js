// 01 HTML/CSSS 디자인 구성
// 02 클릭한 카드 뒤집기
// 03 두 개의 카드 뒤집기 (첫 번째, 두 번째)

const memoryWrap = document.querySelector(".memory__wrap");
const memoryCards = document.querySelectorAll(".cards li");
const memoryCard = document.querySelector(".memory__card");
const memoryTime = document.querySelector(".memoryTime span");
const memoryStart = document.querySelector(".memoryStart");
const memortResultWrap = document.querySelector(".memory__inner .memory__result");
const memoryCardsCard = document.querySelector(".memory__card .cards");
const memoryCardScore = document.querySelector(".memoryScore");
const memoryInfo = document.querySelector(".memoryInfo");
const memoryOver = document.querySelector(".game__out");
const memoryOutScore = document.querySelector(".memoryOutScore span");
const memoryRestart = document.querySelector(".memory__inner .restart");
const cardList = document.querySelector(".memory__card .cards");


let cardOne, cardTwo;
let disableDeck = false;    // 매치 했을 떄
let matchedCard = 0;

let sound = [
    "../../assets/music/audio/match.mp3",
    "../../assets/music/audio/unmatch.mp3",
    "../../assets/music/audio/success.mp3"
]
let soundMatch = new Audio(sound[0]);
let soundUnMatch = new Audio(sound[1]);
let soundSuccess = new Audio(sound[2]);

let memoryTimeReamining = 120,      // 남은 시간
    memoryTimeInterval = "",        // 시간 간격
    memoryScore = 100               // 점수

function updateList() {
    memoryCardScore.forEach(() => {
        matchCards();
    });
}

// 게임 시작하기
function startQuiz() {

    // 시간 설정
    timeInterval = setInterval(reduceTime, 1000);


    // 정답 체크
    checkAnswers();
}

// 시간 설정하기
function reduceTime() {
    memoryTimeReamining--;

    if(memoryTimeReamining == 0 ) endQuiz();

    memoryTime.innerText = displayTime();
}

// 시간 표시하기
function displayTime() {
    if(memoryTimeReamining <= 0) {
        return "0:00";
    } else {
        let minutes = Math.floor(memoryTimeReamining / 60);
        let seconds = memoryTimeReamining % 60;

        // 초 단위가 한 자리 일 때 0을 추가
        if(seconds < 10 ) seconds = "0" + seconds;
        return minutes + ":" + seconds;
     }
}

// 게임 끝났을 때
function endQuiz() {
    // alert("게임 끝");

    // 시작 버튼 만들기
    // memoryStart.style.display = "block";
    memoryStart.style.pointerEvents = "none";

    // 시간 정지
    clearInterval(timeInterval);

    // 메세지 출력
    memortResultWrap.classList.add("show");
    let point = Math.round(score/cssProperty.length * 100);
}

// 카드 뒤집기
function flipCard(e) {
    let clickedCard = this;

    if(clickedCard !== cardOne && !disableDeck) {
        clickedCard.classList.add("flip");

        if(!cardOne) {
            return cardOne = clickedCard;
        }
        cardTwo = clickedCard;
        disableDeck = true;

        let cardOneImg = cardOne.querySelector(".back img").src;
        let cardTwoImg = cardTwo.querySelector(".back img").src;

        matchCards(cardOneImg, cardTwoImg);
    }
}

// 카드 확인 (두 개 이미지 비교)
function matchCards(img1, img2) {
    if(img1 == img2) {   // 두 이미지가 같을 시
        // 같을 경우
        matchedCard++;

        if(matchedCard == 8) {
            memoryOver.classList.add("show");
            memoryOutScore.innerHTML = `<span>${memoryScore}</span>`;
        }
        cardOne.removeEventListener("click", flipCard);
        cardTwo.removeEventListener("click", flipCard);
        cardOne = cardTwo = "";
        disableDeck = false;

        soundMatch.play();
    } else {
        // 일치하지 않는 경우(틀린음악, 이미지가 좌우로 흔들림)
        setTimeout(() => {
            cardOne.classList.add("shakeX")
            cardTwo.classList.add("shakeX")
        },500);

        setTimeout(() => {
            cardOne.classList.remove("shakeX", "flip")
            cardTwo.classList.remove("shakeX", "flip")
            cardOne = cardTwo = "";
            disableDeck = false;
        },1000);

        memoryScore = memoryScore - 5;

        if (memoryScore == 0) {
            memoryCard.style.pointerEvents = "none";
            memoryOver.classList.add("show");
            memoryOutScore.innerHTML = `<span>${memoryScore}</span>`;
        }

        memoryCardScore.innerText = "게임 점수" + " " + ":" + " " + memoryScore;

        soundUnMatch.play();
    }
}

// 카드 섞기
function shuffledCard() {
    cardOne = cardTwo = "";
    disableDeck = false;
    let matchedCard = 0;

    let arr = [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8];
    let result = arr.sort(() => Math.random() > 0.5  ? 1 : -1);

    memoryCards.forEach((card,index) => {
        card.classList.remove("flip")

        setTimeout(() => {
            card.classList.add("flip");
        },200 * index)

        setTimeout(() => {
            card.classList.remove("flip");
        },4000)

        let imgTag = card.querySelector(".back img");
        imgTag.src = `../../assets/img/card/card0${arr[index]}.svg`;
    })
}

// 게임 시작 버튼 클릭
memoryStart.addEventListener("click", () => {
    memoryInfo.classList.add("hide");

    soundMatch.play();
    shuffledCard();
});

// 다시 시작1
function memoryReset() {
    matchedCard = 0;
    memoryScore = 100;
    
    disableDeck = false;
    cardOne = cardTwo = "";

    memoryCardScore.innerText = "게임 점수" + memoryScore;
    memoryCards.forEach((card) => {
        card.classList.remove("flip");
    });
}

// 카드 클릭
memoryCards.forEach((card) => {
    card.addEventListener("click", flipCard);
});


// 다시 시작2
memoryRestart.addEventListener("click", () => {
    memoryOver.classList.remove("show");
    memoryReset();
});

memoryStart.addEventListener("click", startQuiz);
memoryRestart.addEventListener("click", memoryReset);

// 카드 게임 모달
const memoryIcon = document.querySelector(".memory__icon");
const memoryClose = document.querySelector(".memory__close")
const memoryGame = document.querySelector(".memory__wrap");

// 카드 게임 끄기
memoryClose.addEventListener("click", () => {
    memoryReset();
});

memoryIcon.addEventListener("click", () => {
    memoryGame.classList.add("show");
    memoryGame.classList.remove("hide");
});
memoryClose.addEventListener("click", () => {
    memoryGame.classList.add("hide");
});