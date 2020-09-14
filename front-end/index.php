<!DOCTYPE html>
<html>
<head>
	<title>Login & Registrasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont">
    <div class="form sign-in">
      <h2>Login</h2>
      <label>
        <span>Username</span>
        <input type="text" name="username" id="username">
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password" id="password">
      </label>
      <button class="btn-login submit" type="button">Login</button>
      <p class="forgot-pass">Lupa Password ?</p>

      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Belum memiliki akun ?</h2>
          <p>Daftar dan temukan banyak hal baru!</p>
        </div>
        <div class="img-text m-in">
          <h2>Sudah memiliki akun ?</h2>
          <p>Jika Anda sudah memiliki akun, silahkan Login.</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Register</span>
          <span class="m-in">Login</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Register</h2>
        <label>
          <span>Name</span>
          <input type="text" id="nama_lengkap">
        </label>
        <label>
          <span>Username</span>
          <input type="text" id="username_register">
        </label>
        <label>
          <span>Password</span>
          <input type="password" id="password_register">
        </label>
        <button type="button" class="btn-register submit">Register</button>
      </div>
    </div>
  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="script.js"></script>
    <script>
      $(document).ready(function() {

        $(".btn-login").click( function() {
        
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "../back-end/cek-login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "dashboard.php";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
    </script>
    
    <script>
      $(document).ready(function() {

        $(".btn-register").click( function() {
        
          var nama_lengkap = $("#nama_lengkap").val();
          var username = $("#username_register").val();
          var password = $("#password_register").val();

          if (nama_lengkap.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });

          } else if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            //ajax
            $.ajax({

              url: "../back-end/simpan-register.php",
              type: "POST",
              data: {
                  "nama_lengkap": nama_lengkap,
                  "username_register": username,
                  "password_register": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Register Berhasil!',
                    text: 'silahkan login!'
                  });

                  $("#nama_lengkap").val('');
                  $("#username_register").val('');
                  $("#password_register").val('');

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Register Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });
              }

            })

          }

        }); 

      });
    </script>

</body>
</html>