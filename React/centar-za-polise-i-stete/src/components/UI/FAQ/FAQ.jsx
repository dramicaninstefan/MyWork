import React, { Fragment } from 'react';

import './FAQ.css';

const FAQ = (props) => {
  const { data } = props;

  return (
    <Fragment>
      <section id="faq" className="faq section">
        <div className="container">
          <div className="row gy-4">
            <div className="col-lg-3" data-aos="fade-right" data-aos-delay="100">
              <div className="content ">
                <h3>
                  <span>Često postavljana </span>
                  <strong>pitanja</strong>
                </h3>
                <p>Ovde možete pronaći odgovore na najčešća pitanja koja postavljaju naši korisnici. Ako imate dodatnih nedoumica, slobodno nas kontaktirajte – tu smo da vam pomognemo!</p>
              </div>
            </div>

            <div className="accordion col-lg-9" id="accordionExample" data-aos="fade-left" data-aos-delay="300">
              {data.map((item) => {
                return (
                  <div key={item.id} className="accordion-item">
                    <h2 className="accordion-header" id={`heading` + item.id}>
                      <button
                        className={`accordion-button ${item.collapsed}`}
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target={`#collapse` + item.id}
                        aria-expanded="true"
                        aria-controls={`collapse` + item.id}
                      >
                        {item.question}
                      </button>
                    </h2>
                    <div id={`collapse` + item.id} className={`accordion-collapse collapse ${item.show}`} aria-labelledby={`heading` + item.id} data-bs-parent="#accordionExample">
                      <div className="accordion-body">
                        <div dangerouslySetInnerHTML={{ __html: item.answer }} />
                      </div>
                    </div>
                  </div>
                );
              })}
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default FAQ;
