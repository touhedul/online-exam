<?php include 'inc/header.php'; ?>
<?php
Session::chkSession();
?>
<div class="main">
<h1>Welcome to Online Exam - Start Now</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/online_exam.png"/>
	</div>
	<div class="segment">
	<h2>Start Test</h2>
	<ul>
            <li><form action="test.php" method="POST">
                    <select required  name="category">
                    <option>Select</option>
                    <?php 
                    $allCategory = Main::selectAll("question_category");
                    foreach ($allCategory as $s){
                        echo '<option value="'.$s['category_id'].'">'.$s['category_name'].'</option>';
                    }
                    ?>
                </select>
                    
            </li></br>
            <li><input type="submit" name="submit_category" value="Start"></li>
                    </form>
	</ul>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>