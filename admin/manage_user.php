<?php
include 'inc/header.php';
include 'adminClasses/Users.php';
$users = new Users();
$msg = "";
?>
<?php
if(isset($_GET['disable'])){
    $user_id = $_GET['disable'];
    $msg = $users->disableUser($user_id);
}
if(isset($_GET['enable'])){
    $user_id = $_GET['enable'];
    $msg = $users->enableUser($user_id);
}
if(isset($_GET['remove'])){
    $user_id = $_GET['remove'];
    $msg = $users->removeUser($user_id);
}
?>
<?php
$allUser = $users->getAllUsers();
?>

<div class="main">
<?php echo $msg;?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($allUser as $s) {
                $i++;
                echo '<tr>';
                if($s['status'] == 0){
                echo '<td><span style="color:red">'.$i.'</span></td>';
                echo '<td><span style="color:red">'.$s['name'].'</span></td>
                    <td><span style="color:red">'.$s['username'].'</span></td>
                    <td><span style="color:red">'.$s['email'].'</span></td>
                    <td>';
                 }else{
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$s['name'].'</td>
                    <td>'.$s['username'].'</td>
                    <td>'.$s['email'].'</td>
                    <td>';
                }
              
                    
                if($s['status'] == 0){
                    echo '<a onclick="return confirm(\'Are You Sure?\')" href="?enable='.$s['user_id'].'">Enable</a>';
                }else{
                    echo '<a onclick="return confirm(\'Are You Sure?\')" href="?disable='.$s['user_id'].'">Disable</a>';
                }
                echo ' || <a onclick="return confirm(\'Are You Sure?\')" href="?remove='.$s['user_id'].'">Remove</a>
                        </td>
                  </tr>';
            }
            ?>
            
        </tbody>
    </table>



</div>
<?php include 'inc/footer.php'; ?>
