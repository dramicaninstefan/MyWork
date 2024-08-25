<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>

<div class="narudzbina status0">
    <div class='istorija-heading'>

        <p class="bold"> 
            <span style="color: black;">User:</span> 
            <span style="color: red;">${narudzbina.getKorisnik().getKorisnickoIme()}</span>
        </p>
        <h4> Ordered: </h4>
    </div>

    <div class='narudzbina-stavke'>
        <c:forEach var="stavka" items="${narudzbina.getStavkeNarudzbine().keySet()}">
            <div class="narudzbina-stavka">
                <p>${stavka.getNazivProizvoda()}: </p> <p>${stavka.getCenaPoPorciji()} $ x ${narudzbina.getStavkeNarudzbine().get(stavka)}</p>
            </div>                 
        </c:forEach>
    </div>
    <br>
    <div class="naruceno">
        <h4> Date: ${narudzbina.getDatumKreiranja()} </h4>
    </div>
    <div class='narudzbina-footer'>
        <div>               
            <p> Discount: ${narudzbina.getPopust()} %</p>
            <p> Total: ${narudzbina.getUkupnaCena()} RSD </p>
        </div>
        <div class="btn-narudzbina">
            <a href="Narudzbe?Zahtev=Ostvari&Narudzba=${narudzbina.getNarudzbinaID()}" class="btn btn-warning" >Realize</a>
            <a href="Narudzbe?Zahtev=Otkazi&Narudzba=${narudzbina.getNarudzbinaID()}" class="btn btn-dark" >Cancel</a>
        </div>
    </div>
</div> 

