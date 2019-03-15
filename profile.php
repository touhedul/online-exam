<?php include 'inc/header.php'; ?>
<?php
Session::chkSession();
?>
<div class="main">
    <h1>Your Profile</h1>



    <table class="table table-active">    
        <tr>
            <td>Name</td>
            <td><?php echo Session::get("name") ?></td>
        </tr>
        <tr>
            <td>Username </td>
            <td><?php echo Session::get("username") ?></td>
        </tr>
        <tr>
            <td>Email </td>
            <td><?php echo Session::get("email") ?></td>
        </tr>
    </table>
    <div id="msg"></div>




</div>
<?php include 'inc/footer.php'; ?>