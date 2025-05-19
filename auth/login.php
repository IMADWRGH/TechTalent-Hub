<?php
require "../config/config.php";
require "../includes/header.php";

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (empty($email) or empty($password)) {
    echo "<script>alert('Email and password are required');</script>";
  } else {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $select = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
      if (password_verify($password, $select['password'])) {
        echo"LOGGED IN";
        header("Location: ../index.html");
        exit();
      }
    } else {

      echo "<script>alert('Invalid email or password');</script>";
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
        <h1 class="text-white font-weight-bold">Log In</h1>
        <div class="custom-breadcrumbs">
          <a href="#">Home</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Log In</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="login.php" method="post" class="p-4 border rounded">
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="email">Email</label>
              <input
                type="email"
                id="email"
                required
                class="form-control"
                placeholder="Email address"
                name="email" />
            </div>
          </div>
          <div class="row form-group mb-4">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="text-black" for="password">Password</label>
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Password"
                name="password"
                required />
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input
                name="submit"
                id="submit"
                type="submit"
                value="Log In"
                class="btn px-4 btn-primary text-white" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php require "../includes/footer.php"; ?>