import React, { Fragment, useEffect } from 'react';
import { Link } from 'react-router-dom';

const AboutUsPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <div className="page-title dark-background">
        <div className="position-relative">
          <h1>O Nama</h1>
          <nav className="breadcrumbs">
            <ol>
              <li>
                <Link to="/">Početna</Link>
              </li>
              <li className="current">O Nama</li>
            </ol>
          </nav>
        </div>
      </div>

      <section id="about" className="about section">
        <div className="container">
          <div className="row gy-4">
            <div className="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/about.jpg" className="img-fluid" alt="" />
            </div>
            <div className="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
              <h3>Mesto gde užitak postaje svakodnevica.</h3>
              <p className="fst-italic">Dobrodošli u prostor gde kafa, prijatelji i opuštena atmosfera čine savršenu kombinaciju.</p>
              <ul>
                <li>
                  <i className="bi bi-check2-all"></i> <span>Kafa pripremljena sa strašću, za ljubitelje vrhunskog ukusa.</span>
                </li>
                <li>
                  <i className="bi bi-check2-all"></i> <span>Prijatan ambijent za sve vaše trenutke – od jutarnje pauze do večernjih razgovora.</span>
                </li>
                <li>
                  <i className="bi bi-check2-all"></i>
                  <span>Posvećeni smo kvalitetu, autentičnom ukusu i osmehu svakog gosta.</span>
                </li>
              </ul>
              <p>Naše mesto je tu da vam pruži toplinu doma i poseban kutak za beg od svakodnevnog stresa. Pridružite nam se i otkrijte zašto smo omiljeni kutak u gradu.</p>
            </div>
          </div>
          <div className="row mt-5">
            <p>
              Ovo je više od mesta gde se pije kafa – ovde se stvaraju uspomene, deli smeh i grade prijateljstva. Cilj je svakom gostu pružiti osećaj topline i komfora, uz kvalitetne napitke i
              pažljivo odabrane poslastice.
              <br />
              <br />
              Svaka šoljica kafe dolazi s posebnom pažnjom – od izbora najkvalitetnijih zrna do brižno pripremljenih napitaka, svaki gutljaj treba da bude užitak. Ambijent je osmišljen da opusti i
              inspiriše, bilo da tražite mirno mesto za rad, kutak za razgovor ili trenutak za sebe.
              <br />
              <br />
              Pored vrhunske kafe, u ponudi su raznovrsni čajevi, prirodni sokovi, kao i izbor domaćih i internacionalnih slatkiša i grickalica. Meni se svakodnevno obogaćuje i prilagođava ukusima i
              željama gostiju.
              <br />
              <br />
              Ponos je biti deo lokalne zajednice, doprinositi njenom razvoju kroz saradnju sa domaćim proizvođačima i organizaciju raznih događaja. Osmeh i prijateljska atmosfera uvek su prisutni,
              jer verujemo da je kafić mnogo više od samog prostora – on je deo svakodnevnog života.
              <br />
              <br />
              Dobrodošli u mesto gde se kafa pije srcem!
            </p>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default AboutUsPage;
