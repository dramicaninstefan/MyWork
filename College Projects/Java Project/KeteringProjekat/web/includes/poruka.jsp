<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core"%>

<c:if test="${param.Status == 'uspeh'}">
    <div class="poruka">
        <p id="hvala" style="font-family: 'Montserrat Black', sans-serif;">Thank you!<br>You will receive ${param.Poeni} points!</p>
    </div>
</c:if>
<c:if test="${param.Status == 'greska'}">
    <div class="poruka">
        <p id="hvala" style="font-family: 'Montserrat Black', sans-serif;">An error occurred, please try again</p>
    </div>
</c:if>




