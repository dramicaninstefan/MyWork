<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>

<h2 style="font-family: 'Montserrat', sans-serif;" align="center"> Add new user </h2>
    <form action="Korisnici" method="post" class="korisnik-stavka bg-danger">
            <input type="text" name="korisnicko" placeholder="Username">
            <input type="text" name="ime" placeholder="First name">
            <input type="text" name="prezime" placeholder="Last name">
            <input type="text" name="adresa" placeholder="Address">
            <input type="number" min="0" value="0" name="poeni" placeholder="0">
            <select class='nov-rola'>
                <option id="1">Admin</option>               
                <option id="2">Manager</option>               
                <option id="3">Client</option>
            </select>
            <input type="hidden" class="nov-rolaID" name="rola" value="3">
            <input type="pass" name="password" placeholder="password">
            <input type="submit" class="btn btn-success btn-dodaj" name="zahtev" value="Add">
        </form>

<br><h2 style="font-family: 'Montserrat', sans-serif;" align="center"> All users </h2>
<div class='panel edit-korisnika bg-danger'>
    
    <div class='header-korisnika '>
        <p>Username</p>
        <p>First name</p>
        <p>Last name</p>
        <p>Address</p>
        <p>Points</p>
        <p>Role</p>
        <p>Password</p>
        <p>Actions</p>
    </div>
   
    <div class='lista-korisnika bg-danger'>
     
        <c:forEach var="korisnik" items="${requestScope.korisnici}">
            <div class='korisnik-stavka bg-light'>
                <p id="korisnicko${korisnik.getKorisnickoIme()}"contentEditable="true">${korisnik.getKorisnickoIme()}</p>
                <p id="ime${korisnik.getKorisnickoIme()}" contentEditable="true">${korisnik.getIme()}</p>
                <p id="prezime${korisnik.getKorisnickoIme()}" contentEditable="true">${korisnik.getPrezime()}</p>
                <p id="adresa${korisnik.getKorisnickoIme()}" contentEditable="true">${korisnik.getAdresa()}</p>
                <p id="poeni${korisnik.getKorisnickoIme()}" contentEditable="true">${korisnik.getPoeni()}</p>
                <select name='rola' id='rola${korisnik.getKorisnickoIme()}'>
                    <option id="${korisnik.getRola().getRolaID()}"> ${korisnik.getRola().getNazivRole()} </option>
                    <option disabled >--------</option>
                    <option id="1"> Admin </option>
                    <option id="2"> Manager </option>
                    <option id="3"> Client </option>
                </select>
                <p id="password${korisnik.getKorisnickoIme()}" contentEditable="true" ></p>
                <div>
                    <a id="${korisnik.getKorisnickoIme()}" class='btn btn-warning btn-izmeni-kor'>Change</a>
                    <a href='Korisnici?Zahtev=Izbrisi&Korisnik=${korisnik.getKorisnickoIme()}' class='btn btn-danger'>Delete</a>
                   
                </div>
            </div>
        </c:forEach>

    </div>

</div>