<?php

include '../userClasses/QuestionAnswer.php';
include_once '../commonClasses/Validation.php';
$quesAns = new QuestionAnswer();

$category_id = Validation::validate($_POST['category_id']);
if(Main::chkExist("question_category", "category_id", $category_id)){
    $quesAns->showAnswer($category_id);
    
}else{
    echo Variable::$invalid;
    exit();
}

?>

