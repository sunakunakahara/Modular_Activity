<?php
include "db.php";  

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $firstName  = trim($_POST["first_name"] ?? "");
    $lastName   = trim($_POST["last_name"] ?? "");
    $username   = trim($_POST["username"] ?? "");
    $city       = trim($_POST["city"] ?? "");
    $zip        = trim($_POST["zip"] ?? "");
    $agree      = isset($_POST["agree"]) ? 1 : 0;

    if ($firstName && $lastName && $username && $city && $zip && $agree) {

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, city, zip, agree) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $firstName, $lastName, $username, $city, $zip, $agree);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Form submitted and saved successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Database Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Please fill all fields.</div>";
    }
}
?>

<section class="section">
    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Input</h5>

                    <form class="row g-3" method="POST">

                        <div class="col-md-4">
                            <label class="form-label">First name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Last name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Zip</label>
                            <input type="text" name="zip" class="form-control" required>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="agree" required>
                                <label class="form-check-label">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit Form</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>
