<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>
<html lang="en">

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
        </style>

    </head>

    <body class="index-page">

        

        <main class="main">
            
            <%@ include file="/includes/navbar.jsp"%>

            <%@ include file="./includes/Hero.jsp"%>

            <%@ include file="./includes/AboutUs.jsp"%>

            <%@ include file="./includes/WhyUs.jsp"%>

            <!-- Stats Section -->
            <section id="stats" class="stats section dark-background">

                <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

            </section><!-- /Stats Section -->


            <!-- Menu Section -->
            <section id="menu" class="menu section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Our Menu</h2>
                    <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                        <div class="tab-pane fade active show" id="menu-All">

                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>Meal Map</h3>
                            </div>

                            <div class="row gy-5">

                                ${msg}
                                <c:forEach var="proizvod" items="${proizvodi}">     
                                    <%@include file="/includes/proizvod.jsp" %>                    
                                </c:forEach>

                            </div>
                        </div><!-- End Starter Menu Content -->


                    </div>

                </div>

            </section><!-- /Menu Section -->    

            <%@ include file="./includes/ContactForm.jsp"%> 

        </main>

        <%@include file="/includes/footer.jsp"%>



        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <!--<div id="preloader"></div>-->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>



    </body>

</html>
