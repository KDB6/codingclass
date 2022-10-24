const allMusic = [
    {
        name : "01. Blue Boi",
        artist : "Lakey Inspired",
        img : "music__bg01",
        audio : "music__audio01"
    },
    {
        name : "02. September Rain",
        artist : "Yme Fresh",
        img : "music__bg02",
        audio : "music__audio02"
    },
    {
        name : "03. mellow morning",
        artist : "Dixxy.",
        img : "music__bg03",
        audio : "music__audio03"
    },
    {
        name : "04. At My Front Door",
        artist : "DJ Quads",
        img : "music__bg04",
        audio : "music__audio04"
    },
    {
        name : "05. Chill Noons",
        artist : "Kronicle",
        img : "music__bg05",
        audio : "music__audio05"
    },
    {
        name : "06. i can't tell you my love",
        artist : "LucidDream.",
        img : "music__bg06",
        audio : "music__audio06"
    },
    {
        name : "07. Every Day (Jazz Ver)",
        artist : "Lukrembo",
        img : "music__bg07",
        audio : "music__audio07"
    },
    {
        name : "08. Sunshine",
        artist : "Joakim Karud",
        img : "music__bg08",
        audio : "music__audio08"
    },
    {
        name : "09. Laundrette",
        artist : "MonaWonderlick",
        img : "music__bg09",
        audio : "music__audio09"
    },
    {
        name : "10. WINTER KLOUD",
        artist : "WINYELLE",
        img : "music__bg10",
        audio : "music__audio10"
    }
]

const musicWrap = document.querySelector(".muisc__wrap");
const musicView = musicWrap.querySelector(".music__view .img img");
const musicName = musicWrap.querySelector(".music__view .title h3");
const musicArtist = musicWrap.querySelector(".music__view .title p")
const musicAudio = musicWrap.querySelector("#main__audio");
const musicPlay = musicWrap.querySelector("#control__play");
const musicPrev = musicWrap.querySelector("#control__prev");
const musicNext = musicWrap.querySelector("#control__next");
const musicProgress = musicWrap.querySelector(".progress");
const musicProgressBar = musicWrap.querySelector(".progress .bar");
const musicProgressCurrent = musicWrap.querySelector(".progress .timer .current");
const musicProgressDuration = musicWrap.querySelector(".progress .timer .duration");
const musicRepeat = musicWrap.querySelector("#control__repeat");
const musicListBtn = musicWrap.querySelector("#control__list");
const musicList = musicWrap.querySelector(".music__list");
const musicListUl = musicWrap.querySelector(".music__list ul");

let musicIndex = 1;     // 현재 음악 인덱스

// 음악 재생
function loadMusic(num) {
    musicName.innerText = allMusic[num-1].name;                             // 뮤직 이름 로드
    musicArtist.innerText = allMusic[num-1].artist;                         // 뮤직 아티스트 로드
    musicView.src = `../assets/img/music/${allMusic[num-1].img}.png`;       // 뮤직 이미지 로드
    musicView.alt = allMusic[num-1].name;                                   // 뮤직 이미지 alt 로드
    musicAudio.src = `../assets/music/${allMusic[num-1].audio}.mp3`;        // 뮤직 로드
}

// 재생 버튼
function playMusic() {
    musicWrap.classList.add("paused")
    musicPlay.setAttribute("title","정지");
    musicPlay.setAttribute("class","stop");
    musicAudio.play();
}

// 정지 버튼
function pauseMusic() {
    musicWrap.classList.remove("paused")
    musicPlay.setAttribute("title","재생");
    musicPlay.setAttribute("class","play");
    musicAudio.pause();
}

// 이전 곡 듣기 버튼
function prevMusic() {
    musicIndex == 1 ? musicIndex = allMusic.length : musicIndex--;
    loadMusic(musicIndex);
    playMusic();
    playListMusic();
}

// 다음 곡 듣기 버튼
function nextMusic() {
    musicIndex == allMusic.length ? musicIndex = 1 : musicIndex++;
    loadMusic(musicIndex);
    playMusic();
    playListMusic();
}

// 뮤직 진행 바
musicAudio.addEventListener("timeupdate", e => {
    const currentTime = e.target.currentTime;               // 현재 재생되는 시간
    const duration = e.target.duration;                 // 오디오의 총 길이
    let progressWidth = (currentTime/duration) * 100;   // 전체 길이에서 현재 진행되는 시간을 백분위로 나눔

    musicProgressBar.style.width = `${progressWidth}%`;

    // 전체 시간
    musicAudio.addEventListener("loadeddata", () => {
        let audioDuration = musicAudio.duration;
        let totalMin = Math.floor(audioDuration / 60);  // 전체 시간을 분 단위로 나눔
        let totalSec = Math.floor(audioDuration % 60);  // 남은 초를 저장
        if(totalSec < 10) totalSec = `0${totalSec}`;    // 초가 한자리 수 일 때 앞에 0을 붙임
        musicProgressDuration.innerText = `${totalMin}:${totalSec}`;
    })

    // 진행 시간
    let currentMin = Math.floor(currentTime / 60);
    let currentSec = Math.floor(currentTime % 60);
    if(currentSec < 10) currentSec = `0${currentSec}`;
    musicProgressCurrent.innerText = `${currentMin}:${currentSec}`;

})

// 진행 버튼 클릭
musicProgress.addEventListener("click", (e) => {
    let progressWidth = musicProgress.clientWidth;      // 진행바 전체 길이
    let clickedOffsetX = e.offsetX;                     // 진행바 기준으로 측정되는 X좌표
    let songDuration = musicAudio.duration;             // 오디오 전체 길이

    musicAudio.currentTime = (clickedOffsetX / progressWidth) * songDuration;   // 백분위로 나눈 숫자에 다시 전체 길이를 곱하여 현재 재생값으로 바꿈
})

// 반복 버튼 클릭
musicRepeat.addEventListener("click", () => {
    let getAttr = musicRepeat.getAttribute("class");

    switch(getAttr) {
        case "repeat" :
            musicRepeat.setAttribute("class", "repeat__one");
            musicRepeat.setAttribute("title", "한 곡 반복");
            break;
        case "repeat__one" :
            musicRepeat.setAttribute("class", "shuffle");
            musicRepeat.setAttribute("title", "랜덤 반복");
            break;
        case "shuffle" :
            musicRepeat.setAttribute("class", "repeat");
            musicRepeat.setAttribute("title", "전체 반복");
            break;
    }
})

// 오디오가 끝나면 재생
musicAudio.addEventListener("ended", () => {
    let getAttr = musicRepeat.getAttribute("class");

    switch(getAttr) {
        case "repeat" :
            nextMusic();
            break;
        case "repeat__one" :
            playMusic();
            break;
        case "shuffle" :
            // let randomIndex = Math.floor(Math.random() * allMusic.length + 1);  // 랜덤 인덱스

            do {
                randomIndex = Math.floor(Math.random() * allMusic.length + 1);
            } while (musicIndex == randomIndex)
            musicIndex = randomIndex;       // 현재 인덱스를 랜덤 인덱스로 변경
            loadMusic(musicIndex);          // 랜덤 인덱스가 반영된 현재 인덱스 값으로 음악을 다시 로드
            playMusic();                    // 로드한 음악을 재생
            break;
    }
    playListMusic();
})

// 플레이 버튼
musicPlay.addEventListener("click", () => {
    const ismusicPaused = musicWrap.classList.contains("paused");    // 음악 재생 중
    ismusicPaused ? pauseMusic() : playMusic();
})

// 이전 곡 듣기 버튼
musicPrev.addEventListener("click", () => {
    prevMusic();
})

// 다음 곡 듣기 버튼
musicNext.addEventListener("click", () => {
    nextMusic();
})

// 뮤직 리스트 버튼
musicListBtn.addEventListener("click", () => {
    musicList.classList.add("show");
})

// 뮤직 리스트 구현하기
for(let i=0; i<allMusic.length; i++) {
    let li = `
            <li data-index="${i+1}">
                <strong>${allMusic[i].name}</strong>
                <em>${allMusic[i].artist}</em>
                <audio class="${allMusic[i].audio}" src="../assets/music/${allMusic[i].audio}.mp3"></audio>
                <span class="audio__duration" id="${allMusic[i].audio}">재생 시간</span>
            </li>
    `;

    // musicListUl.innerHTML += li;
    musicListUl.insertAdjacentHTML("beforeend", li);

    // 리스트 음악 시간 불러오기
    let liAudioDuration = musicListUl.querySelector(`#${allMusic[i].audio}`);   // 리스트에서 시간을 표시할 선택지를 가져옴
    let liAudio  = musicListUl.querySelector(`.${allMusic[i].audio}`);          // 리스트에서 오디오를 가져옴
    liAudio.addEventListener("loadeddata", () => {
        let audioDuration = liAudio.duration;
        let totalMin = Math.floor(audioDuration / 60);                              // 전체 단위를 분 단위로 쪼갬
        let totalSec = Math.floor(audioDuration % 60);                              // 초 계산
        if(totalSec < 10) totalSec = `0${totalSec}`;                                // 앞 자리에 0 추가
        liAudioDuration.innerText = `${totalMin}:${totalSec}`;                      //문자열 출력
        liAudioDuration.setAttribute("data-duration", `${totalMin}:${totalSec}`);   //속성에 오디오 길이 기록
    })
}

// 뮤직 리스트를 클릭하면 재생
function playListMusic() {
    const musicListAll = musicListUl.querySelectorAll("li");    // 뮤직 리스트 목록
    for(let i=0; i<musicListAll.length; i++) {
        let audioTag = musicListAll[i].querySelector(".audio__duration");

        if(musicListAll[i].classList.contains("playing")) {
            musicListAll[i].classList.remove("playing");                // 클래스가 존재하면 삭제
            let adDuration = audioTag.getAttribute("data-duration");    // 오디오 길이가 같으면 뭐시기
            audioTag.innerText = adDuration;
        }

        if(musicListAll[i].getAttribute("data-index") == musicIndex) {  // 현재 뮤직인덱스랑 리스트 인덱스 값이 같으면
            musicListAll[i].classList.add("playing");                   // 클랙스 playing 추가
            audioTag.innerText = "재생 중";                              // 재생중일 경우 재생 중 멘트 추가
        }

        musicListAll[i].setAttribute("onclick", "clicked(this)");
    }
}

// 뮤직 리스트를 클릭하면...
function clicked(el) {
    let getLiIndex = el.getAttribute("data-index");     // 클릭한 리스트의 인덱스 값을 저장
    musicIndex = getLiIndex;                            // 클릭한 인덱스 값을 뮤직 인덱스 저장
    loadMusic(musicIndex);                              // 해당 인덱스 뮤직 로드
    playMusic();                                        // 음악 재생
    playListMusic();                                    // 음악 리스트 업데이트
}

window.addEventListener("load", () => {
    loadMusic(musicIndex);  // 음악 재상
    playListMusic();        // 리스트 초기화
})

const controlBtn = document.querySelector(".control .list");
const closeBtn = document.querySelector(".music__list .close")
const muList = document.querySelector(".music__list");

controlBtn.addEventListener("click", () => {
    if(muList.classList.contains("hide")==true){
        muList.classList.add("show");
        muList.classList.remove("hide");
    } else {
        muList.classList.add("hide");
        muList.classList.remove("show");
    }

});
closeBtn.addEventListener("click", () => {
    muList.classList.add("hide");
})

// 음악 볼륨
const audio = document.querySelector("#main__audio");
const audioVolume = document.querySelector("#volume-control");

audioVolume.addEventListener("change", function(e) {
    audio.volume = this.value/10;
})