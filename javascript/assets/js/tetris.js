const TetrisWrap = document.querySelector(".tetris__wrap");
const playground = TetrisWrap.querySelector(".playground > ul");

// variables
let rows = 20;
let cols = 12;
let Tetscore = 0;
let duration = 500;
let downInterval;
let tempMovingItem;

// 블록
const movingItem = {
    type: "Tmino",
    direction: 0,       // 블록 모양
    top: 0,
    left: 4,
}

// 블록 좌표값
const blocks = {
    Tmino: [
        [[2,1],[0,1],[1,0],[1,1]],   //Tmino 기본 모양
        [[1,2],[0,1],[1,0],[1,1]],   //Tmino 기본 모양2
        [[1,2],[0,1],[2,1],[1,1]],   //Tmino 기본 모양3
        [[2,1],[1,2],[1,0],[1,1]],   //Tmino 기본 모양4
    ],
    Lmino: "",
    Jmino: "",
    Zmino: "",
    Smino: "",
    Omino: "",
    Imino: "",
}

// 시작하기
function init() {
    tempMovingItem = {...movingItem};

    prependNewLine();   // 블록 라인 만들기
    renderBlocks();     // 블록 출력하기
}

// 블록 만들기
function prependNewLine() {
    for(let i=0; i<rows; i++) {
        const li = document.createElement("li")
        const ul = document.createElement("ul")

        for(let j=0; j<cols; j++) {   // 자식 개념
            const matrix = document.createElement("li")
            ul.prepend(matrix);
        }

        li.prepend(ul);
        playground.prepend(li)    // 요소 집어넣기
    }
}

// 블록 출력하기
function renderBlocks() {
    // const ty = tempMovingItem.type;
    // const di = tempMovingItem.direction;
    // const to = tempMovingItem.top;
    // const le = tempMovingItem.left;

    const {type, direction, top, left} = tempMovingItem;

    const movingBlock = document.querySelectorAll(".moving");
    movingBlock.forEach((moving) => {
        moving.classList.remove(type, "moving")
    });
    // console.log(type)
    // console.log(direction)
    // console.log(top)
    // console.log(left)

    blocks[type][direction].forEach(block => {    // 좌표 값
        const x = block[0] + left;    // 2 0 1 1
        const y = block[1] + top;     // 1 1 0 1

        const target = playground.childNodes[y] ? playground.childNodes[y].childNodes[0].childNodes[x] : null;
        target.classList.add(type, "moving");
        // console.log({playground});
    });
    movingItem.left = left;
    movingItem.top = top;
    movingItem.direction = direction;
}

// 블록 움직이기
function moveBlock(moveType, amount) {
    tempMovingItem[moveType] += amount;
    renderBlocks();
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

        default :
            break;
    }
})



init()