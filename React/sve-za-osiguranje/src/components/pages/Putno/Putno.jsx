import { Fragment } from 'react';

import Header from '../../Header/Header';
import Footer from '../../Footer/Footer';
import ContactForm from '../../ContactForm/ContactForm';

import CallUs from '../../UI/CallUs';
import ViberUs from '../../UI/ViberUs';
import WhatsApp from '../../UI/WhatsApp';
import SocialIcons from '../../UI/SocialIcons';
import ToTop from '../../UI/ToTop';

import classes from './Putno.module.css';

import slika1 from '../../../assets/putno1-400x390.jpg';
import slika2 from '../../../assets/putno3-600x600.jpg';

const Putno = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            {/* <h2 className={classes['content-small-title']}>Putno osiguranje</h2> */}
            <h1 className={classes['content-title']}>Polisa za Putno osiguranje</h1>
            <p className={classes['content-text']}>
              Krenuli ste na put u inostranstvo, zašto bi ste dozvoli nepredviđenim situacijama da Vam pokvare ugođaj, zaštite se polisom putno zdravstvenog osiguranja pre početka putovanja.
            </p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div className={classes.info2}>
          <div className={classes['image']}>
            <img src={slika2} alt="slika1" />
          </div>
          <div className={classes['content']}>
            <h1 className={classes['content-title']}>Koje pokriće obuhvata Putno osiguranje?</h1>
            <div className={classes['content-text']}>
              <ul>
                <li>troškovi neophodnog medicinskog tretmana (ambulantni, lekovi, bolničko lečenje, transport …)</li>
                <li>putna asistencija (razne savetodavne usluge u vezi putovanja …)</li>
                <li>pravna asistencija (organizovanje pravne pomoći u inostranstvu)</li>
              </ul>
            </div>
          </div>
        </div>

        <div className={classes.info3}>
          <p className={classes.text}>
            Neophodni medicinski tretman podrazumeva sledeće:
            <br />
            <br />
          </p>

          <ul>
            <li>ambulantni pregledi</li>
            <li>nabavke neophodnih lekova i medicinskog materijala</li>
            <li>hitne stomatološke intervencije</li>
            <li>medicinski prevoz i hospitalizacija u inostranstvu</li>
            <li>povratak bolesnika u zemlju prebivališta</li>
            <li>drugi troškovi koji su u vezi sa iznenadnom bolešću ili povredom.</li>
          </ul>

          <p className={classes.text}>
            <br />
            Moguće je ugovoriti i dodatni sportski rizik dok ste u inostranstvu. Premija je malo veća nego obično. Ali ste osigurani i za vreme bavljanje sportom (skijanja, ronjenje i slično).
          </p>
          <br />

          <h2 className={classes.title}>Koliko traje polisa putnog osiguranja?</h2>

          <p className={classes.text}>
            Moguće je ugovoriti osiguranje u maksimalnom trajanju od 365 dana. U zavisnosti od potrebe, kreira se polisa. Najbitnije je da se polisa uradi pre prelaska granice Republike Srbije, inače
            ne važi osiguranje. Osiguranje prestaje povratkom u zemlju.
            <br />
            Ugovoreno pokriće polise se sprovodi preko asistenske kompanije, putem call centra, koji imaju mrežu pružalaca zdravstvenih i drugih usluga na teritoriji celog sveta.
          </p>

          <h2 className={classes.title}>Kako se ugovara polisa putnog osiguranja?</h2>

          <p className={classes.text}>
            Ugovara se kao individualno, porodično ili grupno. Šta je potrebno da uradite u slučaju potrebe u inostanstvu?
            <br />
            Za slučaj da Vam je potrebna pomoć-asistencija, potrebno je da kontaktirate call centa asistenske kuće, čiji broj se nalazi na polisi, te će Vas oni usmeriti gde, u koju ustanovu treba da
            se javite sa polisom.
            <br />
            Za slučaj da ne uspevate ili nemate vremena da kontaktirate asistensku kuću pre pregleda, potražite relevantnu zdravstvenu ustanovu, pokažite polisu lekaru ili osoblju ustanove gde se
            prijavili, kako bi oni dalje prijavili osigurani slučaj <br />
            Obavezno pratite upute od strane osoblja i sačuvajte originalnu medicinsku dokumentaciju, radi eventulane refundacije sredstava kada se vratite u zemlju, ako budete imali.
            <br />
            <br />
            Zašto kupiti putno osiguranje? Zato što su nepredvidivi događaji mogući (bolest, nezgode i drugo), koji će Vam pokvariti putovanje
          </p>
        </div>

        <div className={classes.info2}></div>

        <div id="contact-form"></div>
        <ContactForm />

        <SocialIcons />

        <WhatsApp />
        <ViberUs />
        <CallUs />
        <ToTop />
      </main>

      <Footer />
    </Fragment>
  );
};

export default Putno;
