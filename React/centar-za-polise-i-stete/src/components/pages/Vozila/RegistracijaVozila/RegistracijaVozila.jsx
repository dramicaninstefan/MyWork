import { Fragment, useEffect } from 'react';

import classes from './RegistracijaVozila.module.css';

import ContactForm from '../../../UI/ContactForm/ContactForm';
import FAQ from '../../../UI/FAQ/FAQ';

import bgImage from '../../../../assets/img/registracija-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Koji su osnovni dokumenti potrebni za registraciju vozila?',
    answer: `
      <p>Potrebni dokumenti uključuju:</p>
      <ul style="list-style: none; ">
        <li>
          <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
          ličnu kartu
        </li>
        <li>
          <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
          saobraćajnu dozvolu
        </li>
        <li>
          <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
          važeću polisu osiguranja od autoodgovornosti
        </li>
        <li>
          <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
          potvrdu o tehničkom pregledu
        </li>
        <li>
          <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
          dokaz o plaćenom porezu i taksama
        </li>
      </ul>
    `,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Šta ako ne obavim registraciju vozila na vreme?',
    answer: 'Ako ne registrujete vozilo na vreme, rizikujete da dobijete novčanu kaznu, a vaše vozilo može biti uklonjeno sa puta do momenta kada obavite registraciju.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Da li mogu registrovati vozilo bez tehničkog pregleda?',
    answer: 'Ne, tehnički pregled je obavezan deo registracije i vozilo mora biti tehnički ispravno pre nego što se može registrovati.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 4,
    question: 'Šta se dešava ako vozilo ne prođe tehnički pregled?',
    answer: 'Ako vozilo ne prođe tehnički pregled, moraćete da popravite sve navedene nedostatke i ponovo obavite pregled pre nego što možete završiti registraciju.',
    show: '',
    collapsed: 'collapsed',
  },
];

const RegistracijaVozila = () => {
  useEffect(() => {
    document.body.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <main className="main">
        <section id="hero" className={`${classes.hero} section dark-background`}>
          <img src={bgImage} alt="" data-aos="fade-in" />

          <div className={`${classes.container} container`}>
            <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
              <div className="col-xl-8 col-lg-8 pt-5">
                <h2>Registracija vozila</h2>
                <p>
                  Kada je vreme za registraciju vozila, važno je biti spreman i osigurati da proces teče glatko, bez nepredviđenih problema. Pripremite sve potrebne dokumente i završite registraciju
                  na vreme kako biste izbegli nepotrebne troškove ili kazne.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4"> Koje korake uključuje registracija vozila?</h2>
          <ol>
            <li>
              <b>Priprema dokumentacije:</b> Potrebni su vam lična karta, saobraćajna dozvola, polisa osiguranja od autoodgovornosti, i potvrda o tehničkom pregledu.
            </li>
            <li>
              <b>Tehnički pregled:</b> Obavezan je pre registracije kako bi se osiguralo da je vozilo ispravno i bezbedno za vožnju.
            </li>
            <li>
              <b>Plaćanje poreza i taksi:</b> Uključuje plaćanje poreza na upotrebu vozila i drugih relevantnih taksi.
            </li>
            <li>
              <b>Podnošenje dokumentacije:</b> Kada imate svu dokumentaciju, predajete je nadležnom organu za registraciju vozila.
            </li>
            <li>
              <b>Preuzimanje registarskih tablica i nalepnice:</b> Nakon što je proces registracije završen, dobijate nove tablice (ako su potrebne) i nalepnicu za vetrobran koja potvrđuje validnost
              registracije.
            </li>
          </ol>

          <br />
          <br />

          <h2 className="pb-4">Koliko traje registracija vozila?</h2>
          <p>Registracija vozila se obično vrši na period od 12 meseci. Nakon tog perioda, potrebno je obnoviti registraciju kako bi vozilo ostalo legalno na putevima.</p>

          <br />
          <br />

          <h2 className="pb-4">Zašto je važno obaviti registraciju na vreme?</h2>
          <p>
            Nepravovremena registracija može rezultirati kaznama i zabranom korišćenja vozila na putevima. Osim toga, registrovano vozilo znači da ste ispunili sve zakonske obaveze i da vozite
            legalno, bez rizika od kazni ili komplikacija u slučaju saobraćajne kontrole.
          </p>

          <br />
          <br />

          <h2 className="pb-4">Kako obaviti registraciju vozila?</h2>
          <p>
            Registraciju možete obaviti lično u nadležnoj stanici za tehnički pregled, gde ćete moći da obavite i tehnički pregled, osiguranje i sve ostale neophodne korake na jednom mestu. U nekim
            slučajevima, agencije za registraciju nude i uslugu "sve na jednom mestu," što znači da možete obaviti sve formalnosti u jednoj poseti.
          </p>
        </section>

        <ContactForm />

        <FAQ data={faq} />
      </main>
    </Fragment>
  );
};

export default RegistracijaVozila;
