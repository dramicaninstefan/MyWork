<%@page contentType="text/html" pageEncoding="UTF-8"%>

<div class="col-lg-4 menu-item pb-5">
    <img class="card-img-top proizvod-slika" src="${proizvod.getSlikaPath()}" onerror="this.src='./img/svg/minilogo.svg';" alt="...">
    <h4 class="pt-5">${proizvod.getNazivProizvoda()}</h4>
    <p class="ingredients">
        ${proizvod.getOpis()}
    </p>
    <p class="price">
        ${proizvod.getCenaPoPorciji()} $
    </p>
    <form action="Narucivanje" method="post">
        <div class="row">
            <div class="col-6">
                <input class="form-control kolicina-input" placeholder="Količina" type="number" name="kolicina" min="1" value="1" required>
                <input type="hidden" name="proizvodID" value="${proizvod.getProizvodID()}">
            </div>
            <div class="col-6 d-flex justify-content-end">
                <input type="submit" class="btn btn-danger" name="zahtev" value="Add to cart!">
            </div>
        </div>
    </form>

</div><!-- Menu Item -->

<style>
    .proizvod-slika {
        object-fit: cover;
        height: 200px;
    }
    .proizvod-body {
        padding: 15px;
    }
    .proizvod-footer {
        padding: 10px 15px;
    }
    .kolicina-input {
        max-width: 100px;
    }
</style>
