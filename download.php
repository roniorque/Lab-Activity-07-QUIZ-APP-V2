<?php
require "vendor/autoload.php";
use App\QuestionManager;

session_start();
session_destroy();

$manager = new QuestionManager;
$manager->initialize();

if (!isset($_SESSION['user_fullname']) || !isset($_SESSION['user_email']) || !isset($_SESSION['user_bday']) || !isset($_SESSION['user_score']) || !isset($_SESSION['answers'])) {
    echo "Quiz not completed.";
    exit;
}

// Save results text to file
$content_name = 'Complete Name: ' . $_SESSION['user_fullname'];
$content_email = 'Email: ' . $_SESSION['user_email'];
$content_birthdate = 'Birthdate: ' . $_SESSION['user_bday'];
$content_score = 'Score: ' . $_SESSION['user_score'] . ' out of ' . $manager->getQuestionSize();
$content_userAnswers = "Answers:\n";

if (is_array($_SESSION['answers'])) {
    foreach ($_SESSION['answers'] as $number => $answer) {
        $isCorrect = ($answer == $manager->getAnswers()[$number]) ? "(correct)" : "(incorrect)";
        $content_userAnswers .= "$number. $answer $isCorrect\n";
    }
}

$fileContent = $content_name . "\n" . $content_email . "\n" . $content_birthdate . "\n" . $content_score . "\n" . $content_userAnswers;
$fileName = "results.txt";

file_put_contents($fileName, $fileContent);

// Send file to user for download
header('Content-disposition: attachment; filename=results.txt');
header('Content-type: text/plain');
readfile('results.txt');
