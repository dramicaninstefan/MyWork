<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
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

            .info-message a {
                text-decoration: none;
                color: white;
            }

            .info-message a:hover {
                text-decoration: underline;
            }

            .prazna-korpa {
                text-align: center;
                margin: 50px auto;
                padding: 20px;
                border: 2px solid #ccc;
                border-radius: 8px;
                max-width: 400px;
                background-color: #f9f9f9;
            }

        </style>

    </head>

    <body>
        <!-- Postavljanje div-a koji će zauzimati celu širinu stranice -->

        <%@include file="includes/navbar.jsp"%>

        <section style="font-family: 'Montserrat Black', sans-serif;">
            <c:if test="${requestScope.Narudzbine.isEmpty()}">
                <div class="prazna-korpa">
                    <p class="info-message">No orders! </p> 
                    <p> <a href="Pocetna" class="btn btn-dark">Back to home</a></p>
                </div>
            </c:if>


            <c:if test="${!requestScope.Narudzbine.isEmpty()}">
                <!-- PRIKAZ NARUDZBINA -->
                <div class="istorija-prikaz">
                    <c:forEach var="narudzbina" items="${requestScope.Narudzbine}">
                        <%@include file="includes/narudzbina.jsp"%>
                    </c:forEach>
                </div>
                <!-- KRAJ NARUDZBINA -->
            </c:if>
        </section>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>
</html>
