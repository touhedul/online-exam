<?php
include 'inc/header.php';
include 'adminClasses/QuestionAnswer.php';
$quesAns = new QuestionAnswer();
$msg = "";
?>
<?php
if(isset($_GET['remove'])){
    $category_id = $_GET['remove'];
    Main::deleteBy("question_category", "category_id", $category_id);
}
?>
<?php
$msg = "";
if (isset($_POST['addCategory'])) {
    $category_name = Validation::validate($_POST['category_name']);
    if ($category_name == "" OR strlen($category_name) > 20) {
        $msg = '<span style="color: red">Invalid Category</span>';
    } else {
        $params = array('category_name' => $category_name);
        Main::insert("question_category", $params);
        $msg = '<span style="color: green"> Category Insert Successful.</span>';
    }
}
?>
<div class="main">
    <?php echo $msg; ?>
    <form action="" method="POST">
        <table class="table table-striped">
            <tr>
                <td>Category name : </td>
                <td><input type="text" name="category_name" ></td>
            </tr>
            <tr>
                <th></th>
                <th><button name="addCategory" class="btn btn-success">Save</button></th>
            </tr>

        </table>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $allCategory = Main::selectAll("question_category");
            foreach ($allCategory as $s) {
                $i++;
                echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $s['category_name'] . '</td>
                        <td><a href="?remove=' . $s['category_id'] . '">Remove</a></td>
                    </tr>';
            }
            ?>

        </tbody>
    </table>

</div>
<?php include 'inc/footer.php'; ?>