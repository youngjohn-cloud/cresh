<?php
    $pageTitle = "Student Registration";
    require_once("assets/header.php");

    // Initializing Variables
    $passError = "";
    $firstname = $middlename = $surname = $gender = $dob = $password = $cpassword = $student_address = $class = $department = "";

    // Form Validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["firstname"];
        $middlename = $_POST["middlename"];
        $surname = $_POST["surname"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $student_address = $_POST['student_address'];
        $class = $_POST['class'];
        $department = $_POST['department'];

        // Password Validation
        if($password == $cpassword) {
            if(preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@%$&?-_])[A-Za-z\d!@%$&?-_]{8,}/", $password)) {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                echo "$firstname, $middlename, $surname, $gender, $dob, $pass, $cpassword, $class, $department, $student_address";
            } else {
                $passError = "Password must contain at least 8 characters, including uppercase, lowercase, number, and special character";
            }
        } else {
            $passError = "Password do not match";
        }
        
    }

?>

<main class="m-5 p-5 bg-secondary">
    <form autocomplete="off" method="post" action="">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name" name="firstname" value="<?= $firstname?>" required/>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Middlename (Optional)" name="middlename" value="<?= $middlename?>"/>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Surname" name="surname" value="<?= $surname?>" required/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Gender:
                <input type="radio" name="gender" value="Male"/> Male
                <input type="radio" name="gender" value="Female" checked/> Female
                <input type="radio" name="gender" value="Others"/> Others
            </div>
            <div class="col">
                <div class="d-flex">
                    Date Of Birth:
                    <input type="date" class="form-control" name="dob" value="<?= $dob ?>" required/>
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col">
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= $password?>" required/>
                <span class="text-danger"><?= $passError?></span>
            </div>
            <div class="col">
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?= $cpassword?>" required/>
                <span class="text-danger"><?= $passError?></span>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <textarea placeholder="Home Address" name="student_address" class="form-control"><?= $student_address?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                Class:
                <select class="form-select" name="class" value="<?= $class?>" required>
                    <option value="Cresh">Cresh</option>
                    <option value="KG1">KG1</option>
                    <option value="KG2">KG2</option>
                    <option value="Nur1">Nur1</option>
                    <option value="Nur2">Nur2</option>
                    <option value="Pry1">Pry1</option>
                    <option value="Pry2">Pry2</option>
                    <option value="Pry3">Pry3</option>
                    <option value="Pry4">Pry4</option>
                    <option value="Pry5">Pry5</option>
                    <option value="Pry6">Pry6</option>
                    <option value="JSS1">JSS1</option>
                    <option value="JSS2">JSS2</option>
                    <option value="JSS3">JSS3</option>
                    <option value="SSS1">SSS1</option>
                    <option value="SSS2">SSS2</option>
                    <option value="SSS3">SSS3</option>
                </select>
            </div>
            <div class="col">
                Department:
                <select class="form-select" name="department" value="<?= $department?>" required>
                    <option value="null">No Selection</option>
                    <option value="Art">Art</option>
                    <option value="Science">Science</option>
                    <option value="Commercial">Commercial</option>
                    
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" value="Register Student" class="form-control"/>
            </div>
        </div>
    </form>
</main>