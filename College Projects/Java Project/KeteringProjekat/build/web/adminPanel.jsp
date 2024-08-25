<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Yummy</title>
        <meta name="description" content="">
        <meta name="keywords" content="">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="assets/css/main.css" rel="stylesheet">

        <style>
            @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

            .vertical-center
            {
                text-align: center;
            }
            .administracija-link {

                max-width: 180px;

            }
        </style>
    </head>
    <body>

        <%@include file="includes/navbar.jsp"%>

        <div class="vertical-center">
            <c:if test="${UserRola == 1}">  
                <h2 style="font-family: 'Montserrat', sans-serif;" class="administracija-rola" style="text-align: center; font-size: 16px"><strong>Admin panel</strong></h2>


            </c:if>
            <c:if test="${UserRola == 2}">  
                <h2 class="administracija-rola" >Manager</h2>
                <br>
                <span class="pola-bordera"></span>
            </c:if>
            <button class="administracija-link" style="height: 40px; font-size: 16px;" onclick="location.href = 'Administracija?Zahtev=Korisnici'">Client</button>
            <button class="administracija-link" style="height: 40px; font-size: 16px;" onclick="location.href = 'Administracija?Zahtev=Narudzbine'">Orders</button>

            <h3> _______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ </h3> <br>
            <span class="pola-bordera"></span>                    
        </div> 

        <!-- Prikaz panela -->
        <c:if test = "${param.Zahtev == 'Narudzbine'}">
            <%@include file="includes/upravljanjeNarudzbinama.jsp"%>
        </c:if>
        <c:if test = "${param.Zahtev == 'Korisnici'}">
            <%@include file="includes/korisnici.jsp"%>
        </c:if>





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>
</html>
