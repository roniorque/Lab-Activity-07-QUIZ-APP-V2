<?php

require "vendor/autoload.php";
use App\QuestionManager;

session_start();

try {
    // 1. Initialize question manager
    $manager = new QuestionManager;
    $manager->initialize();

    // 2. Check if answers are set in session
    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }

    // 3. Compute score
    $_SESSION['user_score'] = $score = $manager->computeScore($_SESSION['answers']);

} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
</head>
<body>

    <h1>Thank You!</h1>

    <p><b>Congratulations <?php echo $_SESSION['user_fullname'].' ('. $_SESSION['user_email']. ')'; ?> <br> Score: <?php echo "<span style='color: blue'>$score</span>"; ?> out of <?php echo $manager->getQuestionSize(). ' items'; ?></b></p>

    <p> Your Answers</p>
    <ol>
        <?php
        $cAnswers = $manager->getAnswers();

        foreach ($_SESSION['answers'] as $index => $answer) {
            if (!isset($answer)) continue;
        
            $cAnswer = $cAnswers[$index];
            $isCorrect = $answer == $cAnswer;
            $color = $isCorrect ? "blue" : "red";
            $status = $isCorrect ? "correct" : "wrong";
        
            echo "<li>$answer (<span style='color:$color'>$status</span>)</li>";
        }
        ?>
    </ol>

    <button type="submit" onclick="window.location.href='download.php'">Download results</button>

</body>
</html>

<!-- DEBUG MODE -->
<pre>
<?php
//var_dump($_SESSION);
?>
</pre>
