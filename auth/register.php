<?php
require "../config/config.php";
require "../includes/header.php";


// Check if database connection is established
if (!isset($pdo)) {
  die("Database connection not established");
}

if (isset($_POST['register'])) {
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $confirm_password = trim($_POST["confirm_password"]);
  $userType = trim($_POST["user_type"]);

  if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($userType)) {
    echo "<div class='alert alert-danger bg-danger text-white'>Please fill in all fields.</div>";
  } else {
    if ($password == $confirm_password) {
      try {
        // Check if username or email already exists
        $check = $pdo->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
        $check->execute([
          ':username' => $username,
          ':email' => $email
        ]);

        if ($check->rowCount() > 0) {
          echo "<div class='alert alert-danger bg-danger text-white'>Username or email already exists.</div>";
        } else {
          // Insert new user
          $insert = $pdo->prepare("INSERT INTO users (username, email, password, userType) VALUES (:username, :email, :password, :userType)");
          $insert->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':userType' => $userType
          ]);

          if ($insert->rowCount() > 0) {
            echo "<div class='alert alert-success bg-success text-white'>Registration successful. You can now <a href='login.php' class='text-white'>login</a>.</div>";
          } else {
            echo "<div class='alert alert-danger bg-danger text-white'>Registration failed. Please try again.</div>";
          }
        }
        header("Location: ../login.php");
        exit();
      } catch (PDOException $e) {
        echo "<div class='alert alert-danger bg-danger text-white'>Error: " . $e->getMessage() . "</div>";
      }
    } else {
      echo "<div class='alert alert-danger bg-danger text-white'>Passwords do not match.</div>";
    }
  }
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
          <a href="<?php echo APP_URL ?>">Home</a> <span class="mx-2 slash">/</span>
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
              <label class="text-black" for="user_type">User Type</label>
              <select name="user_type" id="user_type" class="form-control" title="User Type">
                <option value="" disabled selected>--Select User Type--</option>
                <option value="student">Candidate</option>
                <option value="instructor">Company</option>
              </select>
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