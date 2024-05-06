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

// Output the results
echo "Number of game classes: $number_of_games<br>";
echo "Number of special game items: $number_of_special_games<br>";
echo "Number of deal items: $number_of_deal_items";

?>
