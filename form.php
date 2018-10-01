<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CSRF - Synchronizer Token Pattern</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row">
        <div class="col-md-6">
          <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
              <div class="brand">
                <img src="img/home.png">
              </div>
              <div class="card fat">
                <div class="card-body">
                  <h4 class="card-title">Update Location</h4>
                  <form method="POST" action="update.php">
                   
                    <div class="form-group">
                      <label>New Location</label>

                      <input id="location" type="text" class="form-control" name="location" value="Pittugala, Malabe" required>
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" id="hiddenToken" name="hiddenToken">
                     </div>

                    <div class="form-group no-margin">
                      <button type="submit" class="btn btn-primary btn-block">
                        Update
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
              <div class="card fat" style="margin-top:200px">
                <div class="card-body">
                  <h3> Welcome !! </h3>
                  <p style="margin-top:20px"> This is a sample form which contains a hidden input field to store the CSRF token to verify the process of submission. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer">
        Copyright &copy; CSRF Synchronizer Token Pattern
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
  $(function() {
    // 4) Ajax call via a javascript, which invokes the endpoint for obtaining the CSRF token
    // created for the session
    $.ajax({
      type: 'POST',
      url: 'get_token.php',
      success: function(result) {
        const res = JSON.parse(result);
        console.log(res.token);
        // 5) Add a new hidden field that has the value of the received CSRF token
        document.getElementById('hiddenToken').value = res.token;
      }
    });
  });
</script>
</body>
</html>