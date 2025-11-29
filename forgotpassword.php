<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<link rel="stylesheet" href="css/forgotpassword.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.getElementById("password").addEventListener("input", () => {
    let password = document.getElementById("password").value;
    let c = 0, s = 0, n = 0, f = 0;
    let flag = 0;   

    
    document.getElementById("epassword").innerHTML = "";
    document.getElementById("passwordcapital").innerHTML = "";
    document.getElementById("passwordsmall").innerHTML = "";
    document.getElementById("passwordnumber").innerHTML = "";
    document.getElementById("passwordspecial").innerHTML = "";

   
    for (let i = 0; i < password.length; i++) {
        if (password[i] >= 'a' && password[i] <= 'z') {
            s = 1;
        }
        else if (password[i] >= 'A' && password[i] <= 'Z') {
            c = 1;
        }
        else if (password[i] >= '0' && password[i] <= '9') {
            n = 1;
        }
        else if (password[i] == ' ') {
            continue;
        }
        else {
            f = 1;
        }
    }

   
    document.getElementById("passwordcapital").innerHTML = c ? "✔️ Capital Letter " : "❌ Capital Letter ";
    document.getElementById("passwordsmall").innerHTML = s ? "✔️ Small Letter " : "❌ Small Letter ";
    document.getElementById("passwordnumber").innerHTML = n ? "✔️ Number " : "❌ Number ";
    document.getElementById("passwordspecial").innerHTML = f ? "✔️ Special Character <br>" : "❌ Special Character <br>";

    
    if (password.length === 0) {
        document.getElementById("epassword").innerHTML = "*Password cannot be empty<br>";
        document.getElementById("epassword").style.color = "red";
        flag = 1;
    }
    else if (password.length < 8) {
        document.getElementById("epassword").innerHTML = "*Password must be at least 8 characters long<br>";
        document.getElementById("epassword").style.color = "red";
        flag = 1;
    }
    else {
        if (c && s && n && f) {
            if (password.length >= 12) {
                document.getElementById("epassword").innerHTML = "✅ Very Strong Password<br>";
                document.getElementById("epassword").style.color = "green";
            }
            else if (password.length >= 10) {
                document.getElementById("epassword").innerHTML = "✅ Strong Password<br>";
                document.getElementById("epassword").style.color = "green";
            }
            else if (password.length >= 8) {
                document.getElementById("epassword").innerHTML = "✅ Moderate Password<br>";
                document.getElementById("epassword").style.color = "orange";
            }
        }
        else {
            document.getElementById("epassword").innerHTML = "❌ Weak Password - Missing requirements<br>";
            document.getElementById("epassword").style.color = "red";
            flag = 1;
        }
    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }

});

document.getElementById("confirmpassword").addEventListener("input", () => {
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirmpassword").value;
    let flag = 0;
    if(confirm_password.length === 0) {
        document.getElementById("econfirmpassword").innerHTML = "*Confirm Password cannot be empty<br>";
        document.getElementById("econfirmpassword").style.color = "red";
        flag = 1;
    }


   else if (password === confirm_password) {
        document.getElementById("econfirmpassword").innerHTML = "✅ Passwords match<br>";
        document.getElementById("econfirmpassword").style.color = "green";
    }
    else {
        document.getElementById("econfirmpassword").innerHTML = "*Passwords do not match<br>";
        document.getElementById("econfirmpassword").style.color = "red";
        flag = 1;
    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }

});

</script>
</head>

<?php
include "nav.html";
include "connection.php"; 

$email = "";
$pet = "";
$showNewPasswordForm = false;


if(isset($_POST['submit_email'])) {

    $email = $_POST['xyz'];
    $pet   = $_POST['abc'];

    $query = "SELECT * FROM adminsignup WHERE email='$email' AND pet='$pet'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $showNewPasswordForm = true;
    } else {
        echo "<script>
                swal('Failed!', 'Email or Pet Name is incorrect!', 'error');
              </script>";
    }
}


if(isset($_POST['submit_new_password'])) {

    $email = $_POST['xyz'];
    $new_pass = $_POST['new_password'];

    $update = "UPDATE adminsignup SET password='$new_pass' WHERE email='$email'";
    if(mysqli_query($con, $update)) {
        echo "<script>
                swal('Success!', 'Password Updated Successfully!', 'success')
                .then(() => { window.location.href = 'login.php'; });
              </script>";
    } else {
        echo "<script>
                swal('Error!', 'Failed to update password!', 'error');
              </script>";
    }
}
?>


<body>


<?php if(!$showNewPasswordForm) { ?>
<form action="" method="post">
    <fieldset>
        <legend>Forgot Your Password?</legend>
        <label for="xyz">Email</label>
        <input type="email" placeholder="Enter Your Email" name="xyz" id="xyz" required value="<?php echo htmlspecialchars($email); ?>">
        <label for="abc">Pet Name</label>
        <input type="text" placeholder="Enter Your Pet Name" name="abc" id="abc" required value="<?php echo htmlspecialchars($pet); ?>">
        <button type="submit" name="submit_email">Submit</button>
    </fieldset>
</form>
<?php } ?>


<?php if($showNewPasswordForm) { ?>
<form action="" method="post" onsubmit="return validatePassword()">
    <fieldset>
        <legend>Set New Password</legend>
        <input type="hidden" name="xyz" value="<?php echo htmlspecialchars($email); ?>">
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="password" placeholder="Enter New Password" required>
       <span id="epassword"></span>
                                <span id="passwordsmall"></span>
                                <span id="passwordcapital"></span>
                                <span id="passwordnumber"></span>
                                <span id="passwordspecial"></span>
                                <span id="passwordstrength"></span>
        
     <label for="confirmpassword">Confirm Password</label>
        <input  name="confirmpassword" id="confirmpassword" type="password" placeholder="Confirm Password" required>
        <span id="econfirmpassword"></span>

        <button type="submit" name="submit_new_password" id="regbtn" disabled>Update Password</button>
    </fieldset>
</form>
<?php } ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script >
document.getElementById("password").addEventListener("input", () => {
    let password = document.getElementById("password").value;
    let c = 0, s = 0, n = 0, f = 0;
    let flag = 0;   

    
    document.getElementById("epassword").innerHTML = "";
    document.getElementById("passwordcapital").innerHTML = "";
    document.getElementById("passwordsmall").innerHTML = "";
    document.getElementById("passwordnumber").innerHTML = "";
    document.getElementById("passwordspecial").innerHTML = "";

   
    for (let i = 0; i < password.length; i++) {
        if (password[i] >= 'a' && password[i] <= 'z') {
            s = 1;
        }
        else if (password[i] >= 'A' && password[i] <= 'Z') {
            c = 1;
        }
        else if (password[i] >= '0' && password[i] <= '9') {
            n = 1;
        }
        else if (password[i] == ' ') {
            continue;
        }
        else {
            f = 1;
        }
    }

   
    document.getElementById("passwordcapital").innerHTML = c ? "✔️ Capital Letter " : "❌ Capital Letter ";
    document.getElementById("passwordsmall").innerHTML = s ? "✔️ Small Letter " : "❌ Small Letter ";
    document.getElementById("passwordnumber").innerHTML = n ? "✔️ Number " : "❌ Number ";
    document.getElementById("passwordspecial").innerHTML = f ? "✔️ Special Character <br>" : "❌ Special Character <br>";

    
    if (password.length === 0) {
        document.getElementById("epassword").innerHTML = "*Password cannot be empty<br>";
        document.getElementById("epassword").style.color = "red";
        flag = 1;
    }
    else if (password.length < 8) {
        document.getElementById("epassword").innerHTML = "*Password must be at least 8 characters long<br>";
        document.getElementById("epassword").style.color = "red";
        flag = 1;
    }
    else {
        if (c && s && n && f) {
            if (password.length >= 12) {
                document.getElementById("epassword").innerHTML = "✅ Very Strong Password<br>";
                document.getElementById("epassword").style.color = "green";
            }
            else if (password.length >= 10) {
                document.getElementById("epassword").innerHTML = "✅ Strong Password<br>";
                document.getElementById("epassword").style.color = "green";
            }
            else if (password.length >= 8) {
                document.getElementById("epassword").innerHTML = "✅ Moderate Password<br>";
                document.getElementById("epassword").style.color = "orange";
            }
        }
        else {
            document.getElementById("epassword").innerHTML = "❌ Weak Password - Missing requirements<br>";
            document.getElementById("epassword").style.color = "red";
            flag = 1;
        }
    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }

});

document.getElementById("confirmpassword").addEventListener("input", () => {
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirmpassword").value;
    let flag = 0;
    if(confirm_password.length === 0) {
        document.getElementById("econfirmpassword").innerHTML = "*Confirm Password cannot be empty<br>";
        document.getElementById("econfirmpassword").style.color = "red";
        flag = 1;
    }


   else if (password === confirm_password) {
        document.getElementById("econfirmpassword").innerHTML = "✅ Passwords match<br>";
        document.getElementById("econfirmpassword").style.color = "green";
    }
    else {
        document.getElementById("econfirmpassword").innerHTML = "*Passwords do not match<br>";
        document.getElementById("econfirmpassword").style.color = "red";
        flag = 1;
    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }

});
</script>
</body>
</html>
