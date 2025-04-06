<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    $wordCount = str_word_count($text);
    echo $wordCount;
} else {
    echo "Invalid request.";
}
?>