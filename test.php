<?php include 'inc/header.php'; ?>
<?php include 'userClasses/QuestionAnswer.php'; ?>
<?php
Session::chkSession();
$quesAns = new QuestionAnswer();
?>
<?php
if(isset($_POST['submit_category'])){
    $category_id = Validation::validate($_POST['category']);
}
?>
<?php
$allQues = Main::selectBy("*", "question", "category_id", $category_id);
?>
<div class="main">
    <h1>Welcome to Online Exam</h1>
    <div class="test">
        <form method="post" action="result.php?category_id=<?php echo $category_id;?>">
            <table> 
                <?php
                $i = 0;
                foreach ($allQues as $s) {
                    $i++;
                    echo '<tr>
                            <td colspan="2">
                                <h3>Question ' . $i . ' : ' . $s['question_desc'] . '</h3>
                            </td>
                        </tr>';
                    $allAnsById = Main::selectBy("*", "answer", "question_id", $s['question_id']);
                     $a = 0;
                    foreach ($allAnsById as $ans) {
                        $a++;
                        echo '<tr>
                                    <td>
                                        <input type="radio" value="'.$ans['ans'].'" name="ans'.$i.'"/>' . $ans['ans'] . '
                                    </td>
                                </tr>';
                        
                    }
                }
                ?>

                <tr>
                    <td>
                       
                        <input type="submit" name="submit" value="Submit"/>
                    </td>
                </tr>

            </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>