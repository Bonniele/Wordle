<?php
    require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/menu.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/animals.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head>

<header style="background-color:#ADD8E6">
    <div class="header_bar">
        <div id="main_screen_logo">
            <a href="https://telugupuzzles.com"><img src="images/logo.png" alt="10000 Icon" style="height:5rem;width:10vw;"></a>
        </div>
        <div id="admin_access">
            <ul id="admin_profile">
                <li id="admin_button"><span>
                        <img src="images/admin_icon.png"><a id="admin_name" href="admin.php"></a>
                    </span>
                </li>
            </ul>
        </div>
        <div>
            <button onclick="window.location.href='index.php'">
                <h1 id="title">Wordle</h1>
            </button>
        </div>
        <div id="menu_buttons">
            <div id="help_button">
                <button onclick="showHelpModal()" class="modalbtn">
                    <img class="img_button" src="images/icons-help.png" alt="Help Icon">
                </button>
            </div>
            <div id="stat_button">
                <button onclick="showStatModal()" class="modalbtn">
                    <img class="img_button" src="images/icons-statistic.png" alt="Stat Icon">
                </button>
            </div>
            <div id="profile_button" class="dropdown">
                <button class="dropbtn">
                    <img class="img_button" src="images/icons-user.png" alt="Profile Icon">
                </button>
                <div id="profile_dropdown" class="dropdown-content">
                    <p id="profile_menu_1">Access Level: GUEST</p>
                    <p id="profile_menu_2" style="color:darkGray">Create Custom Word</p>
                    <p id="profile_menu_3" style="color:darkGray">Puzzle Word List</p>
                    <p id="profile_menu_4" style="color:darkGray">Custom Word List</p>
                    <a id="profile_menu_5" href="login_page.php">Log In</a>
                </div>
            </div>
        </div>
    </div>
</header>

<body onload="updateMenus();" style="background-color:#e4f2f7">

<div id="clue_box">

</div>
<div id="game_panel">
    <div id="character_tile_panel">
        <table id="character_table"></table>
    </div>
</div>
<div id="game_message">

</div>

<div id="submission_panel">
    <!-- Form calls Javascript function processGuess when the submit button is clicked. -->
    <form action="" method="post" autocomplete="off" onsubmit="processGuess();return false;">
        <input id="input_box" type="text" name="input_box">
        <input id="submit_button" type="submit" value="Submit" name="submit">
    </form>
</div>



<!--  Help Modal      -->
<?php $page_title = 'wordle > help modal';
# Page Content
include('wordle_help_modal.php');
?>

<!--   Stat Modal   -->
<?php $page_title = 'wordle > stats modal';
# Page Content
include('statistics_modal.php');
?>

<script>
    // Javascript function to pull puzzle_word details and build UI tables
    <?php
    if(isset($_GET['id'])) {
    ?>
    loadCustomGame(<?php echo(json_encode($_GET['id'])); ?>);
    <?php
    } else {
    ?>
    loadPuzzleGame();
    <?php
    } ?>
    
    // loadGame();
    
    
    /* These functions make modals appear. They weren't working from the external
    file, so I put them here. */
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === helpModal) {
            helpModal.style.display = "none";
        } else if (event.target === statModal) {
            statModal.style.display = "none";
        }
    }

    // var languageElement = document.getElementById("lang");
    // var lengthElement = document.getElementById("length");
    // var attemptsElement = document.getElementById("attempts");
    //settingModal.onchange = buildTables();
    
    // var applyButton = document.getElementById("apply-button");
    // applyButton.onclick = function () {
    //     resetGame();
    //     loadPuzzleGame();
    //     settingModal.style.display = "none";
    // }

</script>
</body>
</html>
