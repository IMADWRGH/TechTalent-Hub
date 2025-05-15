<?php
require "../includes/header.php"; ?>
<?php
require "../config/config.php";

$username = $email = $password = $confirm_password = "";
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $confirm_password = trim($_POST["confirm_password"]);

  if (empty($username)) {
    $errors[] = "Username is required.";
  } elseif (strlen($username) < 3) {
    $errors[] = "Username must be at least 3 characters long.";
  }

  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  if (empty($password)) {
    $errors[] = "Password is required.";
  } elseif (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters long.";
  }

  if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
  }

  // Check if username or email already exists
  if (empty($errors)) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $errors[] = "Username or email already taken.";
    }
    $stmt->close();
  }

  // If no errors, proceed to register the user
  if (empty($errors)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
      $success = "Registration successful! You can now <a href='login.php'>log in</a>.";
      $username = $email = $password = $confirm_password = "";
    } else {
      $errors[] = "An error occurred. Please try again.";
    }
    $stmt->close();
  }

  $conn->close();
}
?>

<section
  class="section-hero overlay inner-page bg-image"
  style="background-image: url('../images/hero_1.jpg')"
  id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Register</h1>
        <div class="custom-breadcrumbs">
          <a href="#">Home</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Register</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-5">
        <form action="register.php" method="POST" class="p-4 border rounded">
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="fname">Username</label>
              <input
                type="text"
                id="fname"
                class="form-control"
                placeholder="Username"
                name="username" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="email">Email</label>
              <input
                type="text"
                id="email"
                class="form-control"
                placeholder="Email address"
                name="email" />
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Password</label>
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Password"
                name="password" />
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Re-Type Password</label>
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Re-type Password"
                name="confirm_password" />
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input
                name="register"
                id="register"
                type="submit"
                value="Sign Up"
                class="btn px-4 btn-primary text-white" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php require "../includes/footer.php"; ?>