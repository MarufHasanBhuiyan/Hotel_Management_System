function togglerAdmin() {
    document.getElementById("admin").style.display = "block";
    document.getElementById("user").style.display = "none";


}

function togglerUser() {
    document.getElementById("user").style.display = "block";
    document.getElementById("admin").style.display = "none";
}
document.getElementById("fullname").addEventListener("input", () => {
    let fullname = document.getElementById("fullname").value;
    let x = 0;
    let flag = 0;
    for (let i = 0; i < fullname.length; i++) {
        if ((fullname[i] >= 'a' && fullname[i] <= 'z') ||
            (fullname[i] >= 'A' && fullname[i] <= 'Z') ||
            (fullname[i] >= '0' && fullname[i] <= '9')) {
            x = 0;

        }
        else {
            x = 1;
        }

        if (x == 1) {
            document.getElementById("efullname").innerHTML = "*Fullname can only contain letters and numbers <br>";
            document.getElementById("efullname").style.color = "red";
            flag = 1;
        }
        else {
            document.getElementById("efullname").innerHTML = "";
        }

    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }
});



document.getElementById("dob").addEventListener("input", () => {
    let dob = new Date(document.getElementById("dob").value);
    let today = new Date();
    let flag = 0;
    let age = today.getFullYear() - dob.getFullYear();
    if (dob > today) {
        document.getElementById("edob").innerHTML = "*Date of Birth cannot be in the future <br>";
        document.getElementById("edob").style.color = "red";
        flag = 1;
    }
    else {
        if (today < new Date(today.getFullYear(), dob.getMonth(), dob.getDate())) {
            age--;
        }
        if (age < 18) {
            document.getElementById("edob").innerHTML = "*You must be at least 18 years old <br>";
            document.getElementById("edob").style.color = "red";
            flag = 1;
        }
        else {
            document.getElementById("edob").innerHTML = "";
        }
    }
    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }
});



document.getElementById("mobile").addEventListener("input", () => {
    let mobile = document.getElementById("mobile").value;
    let flag = 0;
    let phoneregex = /^[+]880\s[0-9]{11}$/;
    if (phoneregex.test(mobile)) {
        document.getElementById("emobile").innerHTML = "";
    }
    else {

        document.getElementById("emobile").innerHTML = "*Phone number must be in the format +880 XXXXXXXXXXX <br>";
        document.getElementById("emobile").style.color = "red";
        flag = 1;
    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }
});


document.getElementById("email").addEventListener("input", () => {
    let email = document.getElementById("email").value;
    let flag = 0;
    let emailregex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(\.[a-zA-Z]{2,})*$/;
    if (emailregex.test(email)) {
        document.getElementById("eemail").innerHTML = "";
    }
    else {
        document.getElementById("eemail").innerHTML = "*Please enter a valid email address <br>";
        document.getElementById("eemail").style.color = "red";
        flag = 1;
    }

    if (flag === 1) {
        document.getElementById("regbtn").disabled = true;
    } else {
        document.getElementById("regbtn").disabled = false;
    }
});



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

