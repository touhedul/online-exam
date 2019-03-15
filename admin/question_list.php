<?php
include 'inc/header.php';
include 'adminClasses/QuestionAnswer.php';
$quesAns = new QuestionAnswer();
$msg="";
?>
<?php
if(isset($_GET['remove'])){
    $question_no = $_GET['remove'];
    $msg = $quesAns->removeQuestion($question_no);
}
?>
<?php
$allQues = $quesAns->getAllQues();
?>

<div class="main">
    <?php echo $msg;?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($allQues as $s){
                $i++;
                echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$s['question_desc'].'</td>
                        <td><a href="?remove='.$s['question_id'].'">Remove</a></td>
                    </tr>';
            }
            ?>
            
        </tbody>
    </table>

</div>
<?php include 'inc/footer.php'; ?>