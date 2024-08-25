<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>

<div>
    <h2 style="font-family: 'Montserrat', sans-serif;" class="naslov pt-3"> All orders </h2>
    <div class="prikaz-neostvarenih">
        <c:if test="${requestScope.Narudzbine.isEmpty()}">
            <div class="prazna-korpa">
                <p>No orders!</p>
            </div>
        </c:if>

        <c:if test="${!requestScope.Narudzbine.isEmpty()}">
            <!-- PRIKAZ NARUDZBINA -->

                <c:forEach var="narudzbina" items="${requestScope.Narudzbine}">
                    <%@include file="./neostvarenaNarudzbina.jsp"%>
                </c:forEach>

            <!-- KRAJ NARUDZBINA -->
        </c:if>
    </div>
</div>