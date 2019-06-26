<?php
    function validateDataForm($formData){
        $formData = trim(stripslashes(htmlspecialchars(strip_tags($formData))));
        return $formData;
    }

    function getName($fname, $sname){
        return $sname." ".$fname;
    }

    function checkpassword($password1,$password2){
        if ($password1 !== $password2){
            return false;
        }else {
            return true;
        }
    }

    function createAdminId($fname,$lname){
        $id = substr($fname,0,2) . substr($lname,0,2) . date('is');
        return $id;
    }

    function createStudentId($fname,$lname){
        $id = substr($fname,0,2) . date('is')  . substr($lname,0,2) ;
        return $id;
    }

    function createExaminerId($fname,$lname){
        $id = date('is') . substr($fname,0,2) . substr($lname,0,2);
        return $id;
    }
    function getDetails($details,$password){
        $user = $details->fullname;
        $usersId = $details->id;
        $faculty = $details->faculty;
        $department = $details->department;
        $hashpassword = $details->password;
        
        if (password_verify($password,$hashpassword)) {
            session_start();
            echo '44';
            $_SESSION['LoggedInUserName'] = $user;
            $_SESSION['LoggedInUserId'] = $usersId;
            $_SESSION['LoggedInUserFaculty'] = $faculty;
            $_SESSION['LoggedInUserDepartment'] = $department;

            var_dump($_SESSION);

            return true;
        }else {
            $LoginError = "<p><small>Wrong userId or Password. Please Try again.</small></p>";
            return false;
        }


    }