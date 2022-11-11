const TetrisWrap = document.querySelector(".tetris__wrap");
const playground = TetrisWrap.querySelector(".playground > ul");
const tetrisStart = document.querySelector(".tetris__start");
const tetrisBg = document.querySelector(".tetris__bg");
const tetrisScore = document.querySelector(".tetris__score");

// variables
let rows = 20;
let cols = 12;
let duration = 500;
let downInterval;
let tempMovingItem;
let tetScore = 0;

// 블럭
const movingItem = {
    type: "Imino",
    direction: 0,       // 블럭 모양
    top: 0,
    left: 4,
}

let tetrisSound = [
    "../assets/music/tetris/tetrisStart.mp3",
    "../assets/music/tetris/tetrisBgm.mp3",
    "../assets/music/tetris/tetrisBlock.mp3",
    "../assets/music/tetris/tetrisClear.mp3",
]
let tetrisStartSound = new Audio(tetrisSound[0]),
    tetrisBgm = new Audio(tetrisSound[1]),
    tetrisBlock = new Audio(tetrisSound[2]),
    tetrisClear = new Audio(tetrisSound[3]);

// 블럭 좌표값
const blocks = {
    Tmino: [
        [[2,1],[0,1],[1,0],[1,1]],   //Tmino 기본 모양
        [[1,2],[0,1],[1,0],[1,1]],   //Tmino 기본 모양2
        [[1,2],[0,1],[2,1],[1,1]],   //Tmino 기본 모양3
        [[2,1],[1,2],[1,0],[1,1]],   //Tmino 기본 모양4
    ],
    Imino : [
        [[0,0],[0,1],[0,2],[0,3]],
        [[0,0],[1,0],[2,0],[3,0]],
        [[0,0],[0,1],[0,2],[0,3]],
        [[0,0],[1,0],[2,0],[3,0]],
    ],
    Omino : [
        [[0,0],[0,1],[1,0],[1,1]],
        [[0,0],[0,1],[1,0],[1,1]],
        [[0,0],[0,1],[1,0],[1,1]],
        [[0,0],[0,1],[1,0],[1,1]],
    ],
    Zmino : [
        [[0,0],[1,0],[1,1],[2,1]],
        [[1,0],[0,1],[1,1],[0,2]],
        [[0,0],[1,0],[1,1],[2,1]],
        [[1,0],[0,1],[1,1],[0,2]],
    ],
    Smino : [
        [[1,0],[2,0],[0,1],[1,1]],
        [[0,0],[0,1],[1,1],[1,2]],
        [[1,0],[2,0],[0,1],[1,1]],
        [[0,0],[0,1],[1,1],[1,2]],
    ],
    Jmino : [
        [[0,2],[1,0],[1,1],[1,2]],
        [[0,0],[0,1],[1,1],[2,1]],
        [[0,0],[1,0],[0,1],[0,2]],
        [[0,0],[1,0],[2,0],[2,1]],
    ],
    Lmino : [
        [[0,0],[0,1],[0,2],[1,2]],
        [[0,0],[1,0],[2,0],[0,1]],
        [[0,0],[1,0],[1,1],[1,2]],
        [[0,1],[1,1],[2,0],[2,1]],
    ]
}

// 시작하기
function init() {
    tempMovingItem = {...movingItem};

    for(let i=0; i<rows; i++) {
        prependNewLine();   // 블럭 라인 만들기
    }

    generateNewBlock();    // 블럭 만들기
}

// 블럭 만들기
function prependNewLine() {
        const li = document.createElement("li")
        const ul = document.createElement("ul")

        for(let j=0; j<cols; j++) {   // 자식 개념
            const matrix = document.createElement("li")
            ul.prepend(matrix);
        }

        li.prepend(ul);
        playground.prepend(li)    // 요소 집어넣기
}

// 블럭 출력하기
function renderBlocks(moveType = "") {
    // const ty = tempMovingItem.type;
    // const di = tempMovingItem.direction;
    // const to = tempMovingItem.top;
    // const le = tempMovingItem.left;

    const {type, direction, top, left} = tempMovingItem;

    const movingBlocks = document.querySelectorAll(".moving");
    movingBlocks.forEach((moving) => {
        moving.classList.remove(type, "moving")
    });

    blocks[type][direction].some(block => {    // 좌표 값
        const x = block[0] + left;    // 2 0 1 1
        const y = block[1] + top;     // 1 1 0 1

        const target = playground.childNodes[y] ? playground.childNodes[y].childNodes[0].childNodes[x] : null;
        const isAvailable = checkEmpty(target);
        
        if(isAvailable) {
            target.classList.add(type, "moving");
        } else {
            tempMovingItem = {...movingItem};

            setTimeout(() => {
                renderBlocks();
                if(moveType === "top") {
                    seizeBlock();
                }
            },0)

            return true;
        }
        
        // console.log({playground});
    });
    movingItem.left = left;
    movingItem.top = top;
    movingItem.direction = direction;
}

// 블럭 감지하기
function seizeBlock() {
    const movingBlocks = document.querySelectorAll(".moving");
    movingBlocks.forEach(moving => {
        moving.classList.remove("moving")
        moving.classList.add("seized")
    })
    checkMatch();
}

// 한 줄 제거
function checkMatch() {
    const childNodes = playground.childNodes;
    childNodes.forEach(child => {
        let matched = true;
        child.children[0].childNodes.forEach(li => {
            if(!li.classList.contains("")) {
                matched = false;
                tetrisBlock.play()
            }
        })

        if(matched) {
            tetScore = tetScore + 10;
            child.remove();
            prependNewLine();
            tetrisClear.play();
            tetrisScore.innerText = "SCORE" + " " + tetScore;
        }
    })

    generateNewBlock()
}

// 새로운 블럭 만들기
function generateNewBlock() {
    clearInterval(downInterval);

    downInterval = setInterval(() => {
        moveBlock("top", 1)
    }, duration)

    const blockArray = Object.entries(blocks);
    const randomIndex = Math.floor(Math.random() * blockArray.length)
    movingItem.type = blockArray[randomIndex] [0];
    movingItem.top = 0;
    movingItem.left =  6;
    movingItem.direction = 0,
    tempMovingItem = {...movingItem};
    renderBlocks()
}

// 빈칸 확인하기
function checkEmpty(target) {
    if(!target || target.classList.contains("seized")) {
        return false;
    }
    return true;
}

// 블럭 움직이기
function moveBlock(moveType, amount) {
    tempMovingItem[moveType] += amount;
    renderBlocks(moveType);
}

// 모양 바꾸기
function changeDirection() {
    const direction = tempMovingItem.direction;
    direction === 3 ? tempMovingItem.direction = 0 : tempMovingItem.direction += 1;
    renderBlocks();
}

// 블럭 빨리 내리기
function dropBlock() {
    clearInterval(downInterval);
    downInterval = setInterval(() => {
        moveBlock("top", 1)
    }, 10);
}

// 게임 리셋
function tetrisReset() {
    
}

// 이벤트
document.addEventListener("keydown", e => {
    switch(e.keyCode) {
        case 39 :
            moveBlock("left", 1);
            break;

        case 37 :
            moveBlock("left", -1);
            break;

        case 40 :
            moveBlock("top", 1);
            break;

        case 38 :
            changeDirection();
            break;

        case 32 :
            dropBlock();
            break;

        default :
            break;
    }
})

// 게임 시작 버튼 클릭
tetrisStart.addEventListener("click", () => {
    tetrisBg.classList.add("hide");
    tetrisStartSound.play();

    init()
});

// 테트리스 게임 모달
const tetrisIcon = document.querySelector(".tetris__icon");
const tetrisClose = document.querySelector(".tetris__close")
const tetrisGame = document.querySelector(".tetris__wrap");

tetrisIcon.addEventListener("click", () => {
    tetrisBgm.play()
});

tetrisClose.addEventListener("click", () => {
    tetrisBgm.pause()
});

tetrisIcon.addEventListener("click", () => {
    tetrisGame.classList.add("show");
    tetrisGame.classList.remove("hide");
});
tetrisClose.addEventListener("click", () => {
    tetrisGame.classList.add("hide");
});