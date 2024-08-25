<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./adminLogin.css">
    <title>Admin panel | Login</title>
</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-primary text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <form action="auth.php" class="mb-md-5 mt-md-4 pb-5" method="POST">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-dark-50 mb-5">Unesite Vaš email i šifru!</p>

              <div class="form-outline form-white mb-4">
                <label class="form-label mb-2" for="email">Email</label>
                <input type="email" id="email" name="email"  class="form-control form-control-lg" required />
              </div>

              <div class="form-outline form-white mb-4">
                <label class="form-label mb-2" for="password">Šifra</label>
                <input type="password" id="password" name="password"  class="form-control form-control-lg" required/>
              </div>

              <button class="btn btn-outline-light btn-lg px-5 mt-5" type="submit">Uloguj se</button>

            </form>

           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>