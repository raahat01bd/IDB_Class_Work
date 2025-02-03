<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Puzzle Game</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            background-color: #ffffff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        #puzzle-container {
            display: grid;
            grid-gap: 10px;
            justify-content: center;
            margin: 20px auto;
            width: max-content;
        }
        .tile {
            width: 70px;
            height: 70px;
            background-color: #4caf50;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            user-select: none;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }
        .tile.empty {
            background-color: #f0f0f0;
            color: #f0f0f0;
            cursor: default;
        }
        .tile:hover {
            background-color: #45a049;
            transform: scale(1.1);
        }
        button {
            padding: 10px 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background-color: #388e3c;
            transform: scale(1.1);
        }
        #info {
            margin: 20px;
            font-size: 18px;
        }
        select {
            padding: 5px;
            font-size: 16px;
            margin-right: 10px;
        }
        .timer {
            font-size: 24px;
            font-weight: bold;
            color: #4caf50;
            padding: 10px;
            border-radius: 5px;
            background-color: #f0f0f0;
            display: inline-block;
        }
        @keyframes tile-slide {
            0% {
                transform: translateY(-10px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .tile {
            animation: tile-slide 0.5s ease;
        }
    </style>
</head>
<body>
    <h1>Simple Puzzle Game</h1>
    <p>Slide the tiles to arrange them in order!</p>
    <div>
        <label for="grid-size-selector">Grid Size:</label>
        <select id="grid-size-selector">
            <option value="3">3x3</option>
            <option value="4" selected>4x4</option>
            <option value="5">5x5</option>
        </select>
        <button id="shuffle-button">Shuffle</button>
        <button id="reset-button">Reset</button>
        <button id="submit-button">Check</button>
    </div>
    <div id="info">
        Moves: <span id="move-counter">0</span> | Time: <span id="timer" class="timer">00:00:00</span>
    </div>
    <div id="puzzle-container"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const puzzleContainer = document.getElementById("puzzle-container");
            const moveCounterElement = document.getElementById("move-counter");
            const timerElement = document.getElementById("timer");
            let gridSize = 4;
            let moveCounter = 0;
            let time = 0;  // time in seconds
            let timerInterval;

            function initializePuzzle() {
                clearInterval(timerInterval);
                time = 0;
                moveCounter = 0;
                moveCounterElement.textContent = moveCounter;
                timerElement.textContent = formatTime(time);

                puzzleContainer.style.gridTemplateColumns = `repeat(${gridSize}, 70px)`;
                const tiles = [];
                for (let i = 1; i < gridSize * gridSize; i++) {
                    tiles.push(`<div class="tile">${i}</div>`);
                }
                tiles.push(`<div class="tile empty"></div>`);
                puzzleContainer.innerHTML = tiles.join("");
                startTimer();
            }

            function shuffleTiles() {
                const tiles = Array.from(puzzleContainer.children);
                for (let i = tiles.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [tiles[i], tiles[j]] = [tiles[j], tiles[i]];
                }
                puzzleContainer.innerHTML = "";
                tiles.forEach(tile => puzzleContainer.appendChild(tile));
            }

            function isValidMove(emptyIndex, tileIndex) {
                const emptyRow = Math.floor(emptyIndex / gridSize);
                const emptyCol = emptyIndex % gridSize;
                const tileRow = Math.floor(tileIndex / gridSize);
                const tileCol = tileIndex % gridSize;

                return (
                    (emptyRow === tileRow && Math.abs(emptyCol - tileCol) === 1) ||
                    (emptyCol === tileCol && Math.abs(emptyRow - tileRow) === 1)
                );
            }

            function checkWin() {
                const tiles = Array.from(puzzleContainer.children);
                for (let i = 0; i < gridSize * gridSize - 1; i++) {
                    if (tiles[i].textContent != i + 1) return false;
                }
                return true;
            }

            function startTimer() {
                timerInterval = setInterval(() => {
                    time++;
                    timerElement.textContent = formatTime(time);
                }, 1000);
            }

            function formatTime(seconds) {
                const hours = String(Math.floor(seconds / 3600)).padStart(2, '0');
                const minutes = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
                const secs = String(seconds % 60).padStart(2, '0');
                return `${hours}:${minutes}:${secs}`;
            }

            puzzleContainer.addEventListener("click", (e) => {
                const tiles = Array.from(puzzleContainer.children);
                const emptyTile = tiles.find(tile => tile.classList.contains("empty"));
                const emptyIndex = tiles.indexOf(emptyTile);
                const tileIndex = tiles.indexOf(e.target);

                if (isValidMove(emptyIndex, tileIndex)) {
                    moveCounter++;
                    moveCounterElement.textContent = moveCounter;

                    const emptyText = emptyTile.textContent;
                    emptyTile.textContent = e.target.textContent;
                    e.target.textContent = emptyText;

                    emptyTile.classList.remove("empty");
                    e.target.classList.add("empty");
                }
            });

            document.getElementById("shuffle-button").addEventListener("click", shuffleTiles);
            document.getElementById("reset-button").addEventListener("click", initializePuzzle);
            document.getElementById("submit-button").addEventListener("click", () => {
                if (checkWin()) {
                    clearInterval(timerInterval);
                    alert(`Well done! You solved it in ${moveCounter} moves and ${formatTime(time)}!`);
                } else {
                    alert("Not yet solved. Keep trying!");
                }
            });

            document.getElementById("grid-size-selector").addEventListener("change", (e) => {
                gridSize = parseInt(e.target.value);
                initializePuzzle();
            });

            initializePuzzle();
        });
    </script>
</body>
</html>
