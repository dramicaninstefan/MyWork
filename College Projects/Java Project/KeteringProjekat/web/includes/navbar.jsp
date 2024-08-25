<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="Pocetna" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Yummy</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="Pocetna" class="active">Home<br></a></li>

                <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a class="dropdown-item" href="Pocetna?program=slani#menu">Main Dishes</a></li>
                        <li><a class="dropdown-item" href="Pocetna?program=slatki#menu">Desserts</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
                <c:if test="${UserRola < 3}">
                    <li>
                        <a href="adminPanel.jsp">Admin panel</a>
                    </li>
                </c:if>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="d-flex flex-row justify-content-between align-items-center">

            <c:if test = "${User != null}">
                <li class="list-unstyled nav-item">
                        <a class="nav-link dodaj-font" href="#" tabindex="-1" aria-disabled="true"><strong>Poeni: ${sessionScope.Poeni}</strong></a>
                    </li>
                <li class="list-unstyled nav-item">
                    <a  class="nav-link btn-getstarted order-1" href="Profil?User=${User}&View=Korpa"><i class="bi bi-basket2-fill"></i></a>                     
                </li>
                <c:if test="${Narudzbina != null}">
                    <li class="list-unstyled nav-item">
                        <p class="brojac">${Narudzbina.getStavkeNarudzbine().size()}</p>
                    </li>
                </c:if>  

                <li class="list-unstyled  nav-item dropdown">
                    
                    <a class="mx-4 btn btn-danger btn-lg nav-link dropdown-toggle dodaj-font" href="#" id="navbarDropdownProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ${User}
                    </a>
                    <ul class="list-unstyled  dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownProfil">
                        <li><a class="list-unstyled dropdown-item" href="Profil?User=${User}&View=Profil">Profile</a></li>
                        <li><a class="list-unstyled dropdown-item" href="Istorija?Zahtev=Pregled"">Orders</a></li>
                        <li><a class="list-unstyled dropdown-item" href="Autentikacija">Logout</a></li>
                    </ul>
                </li>               
            </c:if>

            <div class="navbarbuttons d-flex justify-content-between align-items-center ">
                <c:if test = "${User == null}">
                    <ul class="d-flex justify-content-center align-items-center m-0 list-unstyled ">
                        <li class="px-2 "><a href="login.jsp">Login</a></li> 
                        <span>|</span>
                        <li class="px-2"><a href="registracija.jsp">Register</a></li>
                    </ul>
                </c:if>
                <a href="./components/cart.jsp"></a>
            </div>
        </div>


    </div>
</header>
