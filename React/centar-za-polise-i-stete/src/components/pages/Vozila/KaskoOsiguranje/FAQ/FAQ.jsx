import React, { Fragment } from 'react';

import './FAQ.css';

const FAQ = () => {
  return (
    <Fragment>
      <section id="faq" className="faq section">
        <div className="container">
          <div className="row gy-4">
            <div className="col-lg-4" data-aos="fade-right" data-aos-delay="100">
              <div className="content px-xl-5">
                <h3>
                  <span>Često postavljana </span>
                  <strong>pitanja</strong>
                </h3>
                <p>Ovde možete pronaći odgovore na najčešća pitanja koja postavljaju naši korisnici. Ako imate dodatnih nedoumica, slobodno nas kontaktirajte – tu smo da vam pomognemo!</p>
              </div>
            </div>

            <div className="accordion col-lg-8" id="accordionExample" data-aos="fade-left" data-aos-delay="300">
              <div className="accordion-item">
                <h2 className="accordion-header" id="headingOne">
                  <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Na koji period je moguće zaključiti kasko osiguranje?
                  </button>
                </h2>
                <div id="collapseOne" className="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div className="accordion-body">
                    <p>Kasko osiguranje može se ugovoriti sa sledećim rokovima trajanja:</p>
                    <ul style={{ listStyle: `none`, padding: `0` }}>
                      <li>
                        <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i>
                        Kratkoročno (na godinu dana ili kraće),
                      </li>
                      <li>
                        <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i>
                        Višegodišnje sa određenim rokom trajanja (rok mora biti duži od godinu dana),
                      </li>
                      <li>
                        <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i>
                        Višegodišnje sa neodređenim rokom trajanja (rok ne može biti kraći od godinu dana).
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div className="accordion-item">
                <h2 className="accordion-header" id="headingTwo">
                  <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Koje se vrste vozila mogu zaštititi?
                  </button>
                </h2>
                <div id="collapseTwo" className="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div className="accordion-body">
                    <p>
                      Mogu se zaštititi sve vrste kopnenih motornih vozila standardne izrade, kao i priključna, specijalna i radna vozila, motocikli, šinska vozila, radne mašine i njihovi sastavni
                      delovi.
                    </p>
                  </div>
                </div>
              </div>
              <div className="accordion-item">
                <h2 className="accordion-header" id="headingThree">
                  <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Kako često dolazi do oštećenja na vozilu?
                  </button>
                </h2>
                <div id="collapseThree" className="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div className="accordion-body">
                    <p>Često se dešava da vozilo zateknemo oštećeno na parkingu, ako nemamo kasko moramo sami platiti štetu.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default FAQ;
