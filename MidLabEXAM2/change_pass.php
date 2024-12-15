<?php
session_start();


if (isset($_POST['change_password'])) 
{
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($old_password == $_SESSION['pass'])
    {
        if ($new_password !== $confirm_password) 
        {
            echo "<p style='color: red;'>Passwords do not match.</p>";
        } 
        else 
        {
            $users = file('users.txt', FILE_IGNORE_NEW_LINES);
            $updated_users = [];

            foreach ($users as $user) 
            {
                list($id, $stored_password, $name, $user_type) = explode('|', $user);
                if ($id === $_SESSION['userid']) 
                {
                    $updated_users[] = "$id|$new_password|$name|$user_type";
                } 
                else 
                {
                    $updated_users[] = $user;
                }
            }

            file_put_contents('users.txt', implode("\n", $updated_users));

            echo "<p style='color: green;'>Password changed successfully.</p>";
        }
    }
    else
    {
        echo "<p style='color: red;'>Current Password mismatched.</p>";
    }    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <form method="POST" action="change_password.php">
    <fieldset>
    <legend><h2>Change Password</h2></legend>
        <label>Current Password:</label><br>
        <input type="password" name="old_password" required><br>

        <label>New Password:</label><br>
        <input type="password" name="new_password" required><br>

        <label>Confirm New Password:</label><br>
        <input type="password" name="confirm_password" required><br><br>

        <input type="submit" name="change_password" value="Change Password">
    </fieldset>
    </form>
    <a href="<?php echo $_SESSION['user_type'] === 'Admin' ? 'admin_home.php' : 'user_home.php'; ?>">Back to Home</a>
</body>
</html>