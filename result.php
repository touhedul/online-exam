<?php
include 'inc/header.php';
include 'userClasses/QuestionAnswer.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header('location: exam.php');
}
?>
<?php
Session::chkSession();
$quesAns = new QuestionAnswer();
?>
<?php
$result = "";
if (isset($_POST['submit'])) {
    $category_id = $_GET['category_id'];
    $result = $quesAns->processResult($_POST, $category_id);
}
?>
<div class="main">
    <?php echo '<span style="color:green">Your Score is ' . $result . '</span>' ?></br></br>
    <a href="exam.php"><button class="btn btn-success">Start Test Again</button></a>
    </br></br>
    <form action="" method="POST">
        <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id ?>">
        <button class="btn btn-success" type="submit" name="show_answer" id="show_answer">Show Answer</button>
    </form>

    </br>
    <table class="table table-bordered">

        <div id="answer"></div>
    </table>
</div>
<?php include 'inc/footer.php'; ?>