import { Fragment, useEffect } from 'react';

import classes from './Putno.module.css';

import ContactForm from '../../UI/ContactForm/ContactForm';
import InfiniteLooperPutno from '../../UI/InfiniteLooperPutno/InfiniteLooper';
import FAQ from '../../UI/FAQ/FAQ';

import bgImage from '../../../assets/img/putno-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Da li je putno osiguranje obavezno?',
    answer:
      'Putno osiguranje nije obavezno, ali je veoma preporučljivo, posebno ako putujete u inostranstvo. Bez osiguranja, možete se suočiti sa visokim troškovima u slučaju hitnih situacija ili drugih nepredviđenih događaja.',
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Da li putno osiguranje pokriva sportove i avanturističke aktivnosti?',
    answer:
      'To zavisi od polise. Neke polise pokrivaju osnovne sportske aktivnosti, dok druge mogu zahtevati dodatnu naknadu za pokriće specifičnih avanturističkih sportova kao što su skakanje padobranom, planinarenje ili skijanje.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Da li putno osiguranje pokriva gubitak prtljaga?',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
];

const Putno = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <main className="main">
        <section id="hero" className={`${classes.hero} section dark-background`}>
          <img src={bgImage} alt="" data-aos="fade-in" />

          <div className={`${classes.container} container`}>
            <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
              <div className="col-xl-8 col-lg-8 pt-5">
                <h2>Putno osiguranje</h2>
                <p>Krenuli ste na put u inostranstvo, zašto bi ste dozvoli nepredviđenim situacijama da Vam pokvare ugođaj, zaštite se polisom putno zdravstvenog osiguranja pre početka putovanja.</p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4">Koje pokriće obuhvata Putno osiguranje?</h2>
          <ul>
            <li>troškovi neophodnog medicinskog tretmana (ambulantni, lekovi, bolničko lečenje, transport, …)</li>
            <li>putna asistencija (razne savetodavne usluge u vezi putovanja, …)</li>
            <li>pravna asistencija (organizovanje pravne pomoći u inostranstvu)</li>
          </ul>
          <p>Neophodni medicinski tretman podrazumeva sledeće:</p>
          <ul>
            <li>ambulantni pregledi</li>
            <li>nabavke neophodnih lekova i medicinskog materijala</li>
            <li>hitne stomatološke intervencije</li>
            <li>medicinski prevoz i hospitalizacija u inostranstvu</li>
            <li>povratak bolesnika u zemlju prebivališta</li>
            <li>drugi troškovi koji su u vezi sa iznenadnom bolešću ili povredom.</li>
          </ul>
          <p>Moguće je ugovoriti i dodatni sportski rizik dok ste u inostranstvu. Premija je malo veća nego obično. Ali ste osigurani i za vreme bavljanje sportom (skijanja, ronjenje i slično).</p>

          <br />
          <br />

          <h2 className="pb-4">Koliko traje polisa putnog osiguranja?</h2>
          <p>
            Moguće je ugovoriti osiguranje u maksimalnom trajanju od 365 dana. U zavisnosti od potrebe, kreira se polisa. Najbitnije je da se polisa uradi pre prelaska granice Republike Srbije, inače
            ne važi osiguranje. Osiguranje prestaje povratkom u zemlju.
            <br />
            Ugovoreno pokriće polise se sprovodi preko asistenske kompanije, putem call centra, koji imaju mrežu pružalaca zdravstvenih i drugih usluga na teritoriji celog sveta.
          </p>

          <br />
          <br />

          <h2 className="pb-4">Kako se ugovara polisa putnog osiguranja?</h2>
          <p>
            Ugovara se kao individualno, porodično ili grupno. Šta je potrebno da uradite u slučaju potrebe u inostanstvu?
            <br />
            Za slučaj da Vam je potrebna pomoć-asistencija, potrebno je da kontaktirate call centa asistenske kuće, čiji broj se nalazi na polisi, te će Vas oni usmeriti gde, u koju ustanovu treba da
            se javite sa polisom.
            <br />
            Za slučaj da ne uspevate ili nemate vremena da kontaktirate asistensku kuću pre pregleda, potražite relevantnu zdravstvenu ustanovu, pokažite polisu lekaru ili osoblju ustanove gde se
            prijavili, kako bi oni dalje prijavili osigurani slučaj Obavezno pratite upute od strane osoblja i sačuvajte originalnu medicinsku dokumentaciju, radi eventulane refundacije sredstava kada
            se vratite u zemlju, ako budete imali.
            <br />
            <br />
            Zašto kupiti putno osiguranje? Zato što su nepredvidivi događaji mogući (bolest, nezgode i drugo), koji će Vam pokvariti putovanje
          </p>
        </section>
        <ContactForm />
        <FAQ data={faq} />
        <InfiniteLooperPutno />
      </main>
    </Fragment>
  );
};

export default Putno;
