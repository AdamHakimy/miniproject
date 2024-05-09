<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbers of Games Available</title>
    <style>
        body {
            background: url("./img/bg.jpg");
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            width: 50%;
            margin: auto;
            border-radius: 10px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .stats {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Number of Games Available</h1>

    <?php
    // Load the HTML content from the first HTML file
    $html_content_gaming_bank = file_get_contents('GamingBank2.html');

    // Load the HTML content from the second HTML file
    $html_content_game_deals = file_get_contents('GameDeals.html');

    // Define the patterns to search for game classes
    $pattern_game = '/<div class="game">/';
    $pattern_special_game = '/<div class="special-game-item">/';
    $pattern_deal_item = '/<div class="deal-item">/';

    // Use preg_match_all to find all matches of the patterns
    preg_match_all($pattern_game, $html_content_gaming_bank, $matches_games);
    preg_match_all($pattern_special_game, $html_content_gaming_bank, $matches_special_games);
    preg_match_all($pattern_deal_item, $html_content_game_deals, $matches_deal_items);

    // Count the number of matches found
    $number_of_games = count($matches_games[0]);
    $number_of_special_games = count($matches_special_games[0]);
    $number_of_deal_items = count($matches_deal_items[0]);
    ?>

    <div class="stats">
        <p>Number of Regular Games: <?php echo $number_of_games; ?></p>
        <p>Number of Special Games: <?php echo $number_of_special_games; ?></p>
        <p>Number of Game deals: <?php echo $number_of_deal_items; ?></p>
    </div>

</div>

</body>
</html>
