<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ketering Slu?ba</title>
        <link rel="icon" href="./img/svg/minilogo.svg" type="image/icon type">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="./css/customStyles.css"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

        <style>
            @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");


            .fullwidth-content {
                width: 100%;
                margin: 0;
                padding: 0;
                box-sizing: border-box;

            }
        </style>

        <link href="css/customStyles.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid fullwidth-content">
            <%@include file="includes/navbar.jsp"%>
            <section>
                <c:if test = "${param.View == 'Profil'}">
                    <%@include file="includes/profilInfo.jsp"%>
                </c:if>
                <c:if test = "${param.View == 'Korpa'}">
                    <%@include file="includes/korpa.jsp"%>
                </c:if>
                <c:if test = "${param.View == 'Izbrisi'}">
                    <%@include file="includes/izbrisi.jsp"%>
                </c:if>
                <c:if test = "${param.View == 'Poruka'}">
                    <%@include file="includes/poruka.jsp"%>
                </c:if>

            </section>

        </div>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>
</html>