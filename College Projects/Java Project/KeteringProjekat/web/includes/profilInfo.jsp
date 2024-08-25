<!-- PRIKAZUJE FORMU ZA IZMENU KORISNICKIH INFORMACIJA -->
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>
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

<div class="profil-prikaz">



    <form class="forma-prikaz" action="Profil" method="post">  
        <h2><strong>PROFILE</strong></h2><br>
        <label for="korisnickoIme"><strong>Username</strong></label> 

        <input class="input-prikaz" type="text" name="korisnickoIme" id="korisnickoIme" value="${User}" disabled/></br>

        <label for="ime"><strong>First name</strong></label> 

        <input class="input-prikaz" type="text" name="ime" id="ime" value="${Ime}" required/></br>

        <label for="prezime"><strong>Last name</strong></label> 

        <input class="input-prikaz" type="text" name="prezime" id="prezime" value="${Prezime}" required/></br>

        <label for="password"><strong>Password</strong></label> 

        <input class="input-prikaz" type="password" name="password" id="password" placeholder="Current password" required/></br>

        <label for="noviPassword"><strong>New Password</strong></label> 

        <input class="input-prikaz" type="password" name="noviPassword" id="noviPassword" placeholder="New password" required/></br>

        <label for="adresa"><strong>Address</strong></label> 

        <input class="input-prikaz" type="text" name="adresa" id="adresa" value="${Adresa}" required/></br>
        <div class="prikaz-button d-flex" >
            <input style="width:8rem; height: 3rem;" class="btn btn-primary " type="submit" value="Save" name="zahtev">       <br> <br> 

            <h2><a style="width:8rem; height: 3rem;" class="btn btn-danger" href="Profil?User=${User}&View=Izbrisi">Delete profile</a></h2>
        </div>



        <p class="Info-${param.Status}"> 
            <c:if test="${param.Status == 'uspeh'}">
                You have successfully edited your information!
            </c:if>

            <c:if test="${param.Status == 'greska'}">
                You entered the wrong password
            </c:if>

            <c:if test="${param.Status == 'con'}">
                An error occurred, try again!
            </c:if>
        </p> <!-- Ispisuje poruku o greski ili uspehu -->
    </form>
</div>
