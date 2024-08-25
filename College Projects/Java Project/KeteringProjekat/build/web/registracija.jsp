<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Yummi | Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            .input-prikaz {
                border-radius: 10px;
                border: 2px solid #ccc;
                padding: 8px 12px; /* Prilagodite ovo prema vašim preferencijama */
                font-size: 16px; /* Prilagodite veličinu fonta prema vašim preferencijama */
                width: 70% !important; /* Širina input polja */
                box-sizing: border-box; /* Dodajte padding i border u ukupnu širinu elementa */
                margin-bottom: 10px; /* Dodajte razmak ispod input polja */
            }
        </style>

    </head>
    <body >
        <section  class="">
            <div class="container-fluid">
                <div class="row vh-100">
                    <div class="col-sm-6 text-black d-flex flex-column justify-content-center align-items-center">

                        <div class="px-5 ms-xl-4">
                            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                            <span class="h1 fw-bold mb-0">Yummi.</span>
                        </div>

                        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                            <form action="Autentikacija" method="post" style="width: 23rem;">

                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="username" name="korisnickoIme" class="form-control form-control-lg" required />
                                    <label class="form-label" for="username">Username</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="firstName" name="ime" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="firstName">First name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="lastName" name="prezime" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="lastName">Last name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="address" name="adresa" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="address">Address</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <input class="btn btn-danger btn-lg btn-block" type="submit" value="Register"> 
                                    <input class="btn btn-danger btn-lg btn-block" type="reset" value="Clear">
                                </div>

                                <p class="greska">${msg}</p>

                                <p>Don't have an account? <a href="/KeteringProjekat/login.jsp" class="link-danger">Login here</a></p>
                                <p><a href="/KeteringProjekat/Pocetna" class="link-danger">Back to home</a></p>

                            </form>

                        </div>

                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block">
                        <img src="./assets/img/reservation.jpg"
                             alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>
</html>

