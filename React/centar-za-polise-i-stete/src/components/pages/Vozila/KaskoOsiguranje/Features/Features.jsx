import React, { Fragment } from 'react';

import classes from './Features.module.css';

// import kasko1 from '../../../../../assets/img/kasko1.jpg';

const Features = () => {
  return (
    <Fragment>
      <section className={`${classes.kasko} section`}>
        <div className="container">
          <div className="row gy-4">
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 mb-4`} data-aos="fade-up">
              <h2 className="pb-4">Šta je kasko osiguranje i da li vam je potrebno?</h2>
              <p>
                Kasko osiguranje je <b>vrsta dobrovoljnog osiguranja vozila</b> koja pokriva štetu na vašem automobilu, bez obzira na to ko je odgovoran, uključujući krađu, požar, sudare i oštećenja
                nastala na parkingu. <br />
                <br />
                Dok nas obavezno osiguranje štiti od posledica tuđih grešaka u saobraćaju, kasko je tu i za štete na parkingu kada ne znamo krivca, ali i određene štete tokom vožnje kada smo mi krivi,
                kao i za krađe. Budući da osiguranje nije nešto što možete nabaviti nakon što se šteta dogodi, važno je razmišljati o njemu na vreme.
                <br />
                <br />
                Razlika između obaveznog osiguranja od autoodgovornosti i kasko osiguranja, koje spada u dobrovoljno osiguranje vozila, je značajna. Sa potpunom polisom kasko osiguranja, vozila su
                zaštićena bez obzira na to ko je odgovoran za delimičnu štetu, totalnu štetu ili potpuni gubitak vozila (krađu).
                <br />
                <br />
                Najbolje kasko osiguranje je ono koje nudi <b>idealan balans između cena i pokrića </b> i prilagođeno je vašem modelu vozila. Važno je uporediti ponude različitih osiguravajućih kuća,
                kako biste pronašli kasko osiguranje cena u potpunom skladu sa vašim potrebama.
                <br />
                <br />
                Kod nas to možete uraditi jednostavno popunjavanjem kratkog upitnika sa osnovnim podacima o vozilu. Nakon poređenja ponuda i konsultacija sa našim stručnjacima, lako ćete doneti mudru
                odluku o izboru osiguranja i osigurati se od mnogobrojnih rizika.
              </p>
            </div>
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 mb-4`}>
              <h2 className="pb-4">Šta pokriva kasko osiguranje?</h2>
              <p>Kasko osiguranje podrazumeva osiguranje vozila njihove dodatne opreme (ukoliko se to posebno ugovori) od osiguranih opasnosti – rizika kao što su:</p>
              <ol>
                <li>UDAR – neko ili nešto je udarilo u vaš auto i nanelo štetu</li>
                <li>SUDAR – sudarili ste se svojom krivicom, ali niste načinili saobraćajni prekršaj</li>
                <li>KRAĐA – ukrali su vam auto</li>
              </ol>
              <p>
                Pokrivena su delimična oštećenja, kao i potpuno uništenje vozila pri kom dolazi do tzv. “totalne štete”. <br />
                <br />
                U skladu sa vašim potrebama i mogućnostima možete odabrati osnovno ili potpuno kasko, ili samo delimično osiguranje za vaše vozilo. <br />
                <br />
                Za delimično kasko osiguranje uglavnom se odlučuju vlasnici starijih vozila, dok je osnovno i potpuno kasko osiguranje, izbor vlasnika novijih vozila.
              </p>
            </div>
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 mb-4`} id="osnovno">
              <h2 className="pb-4">Osnovno kasko osiguranje podrazumeva sledeće rizike:</h2>
              <ol>
                <li>
                  Saobraćajne rizike
                  <ol>
                    <li>Saobraćajne nezgode (udar, sudar, prevrnuće, iskliznuće, survavanje i slično)</li>
                    <li>Pada ili udara nekog predmeta</li>
                  </ol>
                </li>
                <li>
                  Požarne rizike
                  <ol>
                    <li>Požar</li>
                    <li>Termičko ili hemijsko delovanje spolja</li>
                    <li>Eksplozije</li>
                  </ol>
                </li>
                <li>
                  Grupa prirodnih rizika
                  <ol>
                    <li>Grom</li>
                    <li>Oluja</li>
                    <li>Grad (tuča)</li>
                    <li>Poplava, bujica i visoka voda</li>
                  </ol>
                </li>
                <li>
                  Grupa rizika vandalizma
                  <ol>
                    <li>Demonstracije</li>
                    <li>Manifestacije</li>
                    <li>Zlonamerni postupci ili obest trećih lica</li>
                  </ol>
                </li>
                <li>
                  Grupa ostalih rizika
                  <ol>
                    <li>Pad letilice</li>
                    <li>Oštećenje tapacirunga u vozilu</li>
                    <li>Namerno prouzrokovane štete na vozilu, u cilju sprečavanja veće štete</li>
                    <li>Neposredne štete na vozilu od divljači i domaćih životinja</li>
                  </ol>
                </li>
              </ol>
            </div>
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 mb-4`} id="delimicno">
              <h2 className="pb-4">Delimično kasko osiguranje</h2>
              <ol>
                <li>Lom i oštećenje stakala</li>
                <li>Troškovi vuče ili prevoza putničkog vozila do mesta prebivališta</li>
                <li>Lom i oštećenje farova na vozilu</li>
                <li>Drugo</li>
              </ol>
            </div>
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 `} id="dopunsko">
              <h2 className="pb-4">Dopunska osiguranja</h2>
              <ol>
                <li>
                  <b>Dopunski rizik krađe</b> - podrazumeva oduzimanje tuđeg vozila u celini ili dela vozila u cilju pribavljanja protivpravne imovinske koristi za sebe ili drugog, učinjeno na način
                  kako je propisano krivičnim delima krađe, teške krađe, razbojničke krađe i razbojništva
                </li>
                <li>
                  <b>Dopunski rizik utaje </b> - podrazumeva se prisvajanje predmeta osiguranja datog u finansijski lizing, operativni lizing (dugoročni zakup) ili je iznajmljeno radi vožnje od strane
                  subjekta registrovanog za iznajmljivanje (rent a car), u nameri da se prisvajanjem iznajmljenog predmeta osiguranja sebi ili drugom pribavi protivpravna imovinska korist.
                </li>
              </ol>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Features;
