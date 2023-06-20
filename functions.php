<?php
function check_login($con)
{
    if(isset($_SESSION['Student_Code'])){
        
        $id = $_SESSION['Student_Code'];
        $query = "SELECT * FROM student WHERE Student_Code = '$id' LIMIT 1";
    
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

function check_doctor_login($con)
{
    if(isset($_SESSION['Doctor_Code'])){
        
        $id = $_SESSION['Doctor_Code'];
        $query = "SELECT * FROM doctors WHERE Doctor_Code = '$id' LIMIT 1";
    
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login_doctor.php");
    die;
}

function check_affairs_login($con)
{
    if(isset($_SESSION['code'])){
        
        $id = $_SESSION['code'];
        $query = "SELECT * FROM affairs WHERE code = '$id' LIMIT 1";
    
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $aff_data = mysqli_fetch_assoc($result);
            return $aff_data;
        }
    }

    //redirect to login
    header("Location: login_affairs.php");
    die;
}