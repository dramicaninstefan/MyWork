<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>
<!-- PRIKAZ ISTORIJE -->
<style>
    .status0 {
        background-color: #ffffcc; /* Boja za "Priprema se" */
    }

    .status1 {
        background-color: #ccffcc; /* Boja za "Ostvarena" */
    }

    .status2 {
        background-color: #ffcccc; /* Boja za "Otkazana" */
    }
</style>

<div class="narudzbina status${narudzbina.getStatus()}">
    <div class='istorija-heading'>

        <p style="text-align: center;"> 
            <c:if test="${narudzbina.getStatus() == 0}">
                <strong style="font-size: 30px;">In preparation</strong>
            </c:if>
            <c:if test="${narudzbina.getStatus() == 1}">
                <strong style="font-size: 30px;">Done</strong>
            </c:if>
            <c:if test="${narudzbina.getStatus() == 2}">
                <strong style="font-size: 30px;">Canceled</strong>
            </c:if>
        </p>
        <h4> Orders: </h4>
    </div>

    <div class='narudzbina-stavke'>
        <c:forEach var="stavka" items="${narudzbina.getStavkeNarudzbine().keySet()}">
            <div class="narudzbina-stavka">
                <p>${stavka.getNazivProizvoda()}: </p><p>${stavka.getCenaPoPorciji()} $ x ${narudzbina.getStavkeNarudzbine().get(stavka)}</p>
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
            <p> Total: ${narudzbina.getUkupnaCena()} $ </p>
        </div>

        <c:if test="${narudzbina.getStatus() == 1 || narudzbina.getStatus() == 2}">
            <a href="Istorija?Zahtev=Ponovi&Narudzba=${narudzbina.getNarudzbinaID()}" class="btn btn-success">Reorder</a>
        </c:if>
        <c:if test="${narudzbina.getStatus() == 0}">
            <a href="Istorija?Zahtev=Otkazi&Narudzba=${narudzbina.getNarudzbinaID()}" class="btn btn-danger" >Cancel</a>
        </c:if>
    </div>
</div> 


<!-- KRAJ PRIKAZA ISTORIJE -->