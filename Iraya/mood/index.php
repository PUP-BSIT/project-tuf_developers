<?php
    session_start();

    if(!$_SESSION['user_id']) {
         header('Location:../login.php');
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modal.css">
    <title>Mood Tracker</title>
</head>

<body>
<header>
	<div class="logo-container">
      <img src="../assets/images/logo.png" alt="Iraya Logo" class="logo" />
      <div class="logo-text">
        <h1>Iraya</h1>
        <p>Simplify Your Journaling Experience</p>
      </div>
    </div>
		<nav>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../journal_manager.php">Journal</a></li>
                <li><a href="../todo/todo.php">Tasks</a></li>
				<li><a href="#">Mood</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
    <h1>Mood Tracker</h1>
    <div class="flex">
        <input type="text" id="search" class="grow-6">
        <button class="grow-1" onclick="searchMoods()">Search</button>
        <select id="sort_mood" class="grow-1" oninput="sortDate()">
            <option value="date_descending">Sort by Date: Descending</option>
            <option value="date_ascending">Sort by Date: Ascending</option>
        </select>
        <select id="filter_mood" oninput="filterMood()">
            <option value="all">All Moods</option>
            <option value="mood_sad">Sad</option>
            <option value="mood_unhappy">Unhappy</option>
            <option value="mood_neutral">Neutral</option>
            <option value="mood_happy">Happy</option>
            <option value="mood_joyful">Joyfull</option>
        </select>
    </div>
    <div class="flex between">
        <button onclick="displayModal()">Add mood</button>
        <div>
            <button id="clear_button" 
                class="none" 
                onclick="clearAllSelection()">
                Clear All Selections
            </button>
            <button 
                id="edit_button" 
                class="none" 
                onclick="editSelection()">
                Edit
            </button>
            <button 
                id="delete_button" 
                class="none"
                onclick="deleteSelection()">
                Delete
            </button>
        </div>
    </div>
    <div id="mood_list"></div>

    <div class="modal">
        <div class="modal-content">
            <h2>How are you feeling today?</h2>
            <div>
                <button 
                    class="mood-btn" 
                    id="mood_sad"
                    value="mood_sad" 
                    onclick="set(this)">
                    <img src="../assets/images/mood_sad.png" alt="emoji">
                </button>
                <button 
                    class="mood-btn" 
                    id="mood_unhappy"
                    value="mood_unhappy" 
                    onclick="set(this)">
                    <img src="../assets/images/mood_unhappy.png" alt="emoji">
                </button>
                <button 
                    class="mood-btn" 
                    id="mood_neutral"
                    value="mood_neutral" 
                    onclick="set(this)">
                    <img src="../assets/images/mood_neutral.png" alt="emoji">
                </button>
                <button 
                    class="mood-btn" 
                    id="mood_happy"
                    value="mood_happy"
                    onclick="set(this)">
                    <img src="../assets/images/mood_happy.png" alt="emoji">
                </button>
                <button 
                    class="mood-btn"
                    id="mood_joyful" 
                    value="mood_joyful" 
                    onclick="set(this)">
                    <img src="../assets/images/mood_joyful.png" alt="emoji">
                </button>
            </div>
            <div class="flex">
                <textarea id="mood_description" class="grow-1"></textarea>
            </div>
            <div>
                <sub id="warn_text"></sub>
                <button id="add" onclick="addMood()">Add</button>
                <button id="edit" onclick="editMood()">Edit</button>
                <button onclick="removeModal()">Cancel</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>