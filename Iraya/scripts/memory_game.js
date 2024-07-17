const cardValues = [
	"I",
	"I",
	"R",
	"R",
	"A",
	"A",
	"Y",
	"Y",
	"E",
	"E",
	"F",
	"F",
	"G",
	"G",
	"H",
	"H",
];
let firstCard = null;
let secondCard = null;
let lockBoard = false;

function createCard(value) {
	const card = document.createElement("div");
	card.classList.add("card");
	card.innerHTML = `
        <div class="card-inner">
            <div class="card-front"></div>
            <div class="card-back">${value}</div>
        </div>`;
	card.addEventListener("click", () => flipCard(card, value));
	return card;
}

function startGame() {
	const gameContainer = document.getElementById("game_container");
	shuffleArray(cardValues);
	cardValues.forEach((value) => {
		const card = createCard(value);
		gameContainer.appendChild(card);
	});
}

function resetGame() {
	const gameContainer = document.getElementById("game_container");
	gameContainer.innerHTML = "";
	firstCard = null;
	secondCard = null;
	lockBoard = false;
	startGame();
}

function flipCard(card, value) {
	if (lockBoard) return;
	if (card === firstCard) return;

	card.classList.add("flipped");

	if (!firstCard) {
		firstCard = card;
		return;
	}

	secondCard = card;
	lockBoard = true;

	if (firstCard.innerHTML === secondCard.innerHTML) {
		disableCards();
	} else {
		unflipCards();
	}
}

function disableCards() {
	firstCard.removeEventListener("click", flipCard);
	secondCard.removeEventListener("click", flipCard);
	resetBoard();
}

function unflipCards() {
	setTimeout(() => {
		firstCard.classList.remove("flipped");
		secondCard.classList.remove("flipped");
		resetBoard();
	}, 1000);
}

function resetBoard() {
	[firstCard, secondCard, lockBoard] = [null, null, false];
}

function shuffleArray(array) {
	for (let i = array.length - 1; i > 0; i--) {
		const j = Math.floor(Math.random() * (i + 1));
		[array[i], array[j]] = [array[j], array[i]];
	}
}

function initializeMemoryMatchGame() {
	const resetButton = document.getElementById("reset_button");
	resetButton.addEventListener("click", resetGame);
	startGame();
}

initializeMemoryMatchGame();
