function choose(game) {
	switch (game) {
		case "monopoly":
			window.location.href = 'https://en.wikipedia.org/wiki/Monopoly_(game)';
			break;
		  
		case "tictactoe":
			window.location.href = 'https://en.wikipedia.org/wiki/Tic-tac-toe';
			break;
		  
		case "cowsandbulls":
			window.location.href = 'https://en.wikipedia.org/wiki/Bulls_and_Cows';
			break;
		  
		case "hangman":
			window.location.href = 'https://en.wikipedia.org/wiki/Hangman_(game)';
			break;
			
		default:
			alert("Unknown game");
	}
}