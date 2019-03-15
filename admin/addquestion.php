<?php
include 'inc/header.php';
include 'adminClasses/QuestionAnswer.php';
$quesAns = new QuestionAnswer();
$msg = "";
?>
<?php
if (isset($_POST['save'])) {
    $msg = $quesAns->addQuestionAns($_POST);
}
?>
<div class="main">
    <?php echo $msg; ?>
    <form action="" method="POST">
        <table class="table table-striped">
            <tr>
                <td>Question Category</td>
                <td>
                    <select  name="category">
                        <option>Select Category</option>
                        <?php
                        $allCategory = Main::selectAll("question_category");
                        foreach ($allCategory as $s) {
                            echo '<option value="' . $s['category_id'] . '">' . $s['category_name'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Question</th>
                <th><textarea rows="3" cols="65" name="question"></textarea></th>
            </tr>
            <tr>
                <td>Answer 1 : </td>
                <td><input type="text" name="ans1" ></td>
            </tr>
            <tr>
                <td>Answer 2 : </td>
                <td><input type="text" name="ans2" ></td>
            </tr>
            <tr>
                <td>Answer 3 : </td>
                <td><input type="text" name="ans3" ></td>
            </tr>
            <tr>
                <td>Answer 4 : </td>
                <td><input type="text" name="ans4" ></td>
            </tr>
            <tr>
                <td>Right Answer : </td>
                <td><input type="number" name="right_answer" min="1" max="4"></td>
            </tr>
            <tr>
                <th></th>
                <th><button name="save" class="btn btn-success">Save</button></th>
            </tr>

        </table>
    </form>


</div>
<?php include 'inc/footer.php'; ?>