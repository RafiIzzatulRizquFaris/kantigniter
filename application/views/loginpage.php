<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </head>

  <body class="login-body">
    <div
      class="container"
      style="
        min-height: 100%;
        min-height: 100vh;
        display: inline-block;
        text-align: center;
        align-items: center;
        vertical-align: middle;
      "
    >
      <div class="card border-0 shadow my-5 my-auto mt-5">
        <div class="card-body my-5" style="display: inline-block;">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <img
                  src="<?php echo base_url('assets/loginill.png'); ?>"
                  alt=""
                  class="img-responsive"
                  style="width: 500px; height: 500;"
                />
              </div>
              <div class="col-md-6 border-dark border-left">
                <!-- <img src="loginill.png" alt="" width=500> -->
                <!-- Default form login -->
                <form class="text-center p-5" action="<?php echo site_url('Action/login') ?>" method="POST">
                  <p class="h4 mb-4">Masuk</p>

                  <!-- Username -->
                  <input
                    type="text"
                    class="form-control mb-4"
                    placeholder="Username"
                    name="username"
                  />

                  <!-- Password -->
                  <input
                    type="password"
                    id="defaultLoginFormPassword"
                    class="form-control mb-4"
                    placeholder="Password"
                    name="password"
                  />

                  <!-- Sign in button -->
                  <button class="btn btn-info btn-block my-4" type="submit">
                    Masuk
                  </button>

                  <!-- Register -->
                  <p>
                    Not a member?
                    <a href="<?php echo site_url('Register/index'); ?>">Register</a>
                  </p>
                </form>
                <!-- Default form login -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
