<?php
session_start();
if (isset($_REQUEST['submit']))
{
    $name = $_POST['id'];
    $u_name = $_POST['pass'];
    $email = $_POST['confirm_pass'];
    $phone = $_POST['name'];
    $pass = $_POST['usertype'];

    

    function validate_name($name)
    {
        if (empty($name) || strlen($name) < 2 || !ctype_alpha($name[0]))
        {
            return false;
        }

        for ($i = 1; $i < strlen($name); $i++)
        {
            if (!(ctype_alpha($name[$i]) || is_numeric($name[$i]) || $name[$i] == '_')) {
                return false;
            }
        }
        return true;
    }

    $check_f = validate_name($name);
    $check_l = validate_name($u_name);

    
    if ($check_f && $check_l && $check_phone && $check_pass && $check_email  && $check_dob && $check_gender)
    {
        $_SESSION['status'] = true;
        $info = ['id' => $id, 'pass' => $pass, 'confirm_pass' => $confirm_pass,];
        $_SESSION['user_info'] = $info;
        header('location: login.html');
    }
    
    else
    {
        header('location: reg_form.html');
    }
}
?>