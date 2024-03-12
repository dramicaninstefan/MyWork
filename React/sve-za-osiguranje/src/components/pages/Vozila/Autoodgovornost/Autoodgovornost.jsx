import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';
import WhatsApp from '../../../UI/WhatsApp';
import SocialIcons from '../../../UI/SocialIcons';
import ToTop from '../../../UI/ToTop';

import classes from './Autoodgovornost.module.css';

import slika1 from '../../../../assets/pomoc-na-putu-400x390.jpg';

const Autoodgovornost = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Autoodgovornost</h2>
            <h1 className={classes['content-title']}>
              Autoodgovornost<span>.</span>
            </h1>
            <p className={classes['content-text']}>Osiguranje od autoodgovornosti je Zakonom obavezno osiguranje. Vozila koja učestvuju u saobraćaju moraju imati polisu autoodgovornosti.</p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div className={classes.info2}>
          <div className={classes.content}>
            <h3 className={classes['content-title']}>
              <i className="fa-solid fa-shield"></i> Polisa autoodgovornosti?
            </h3>
            <p className={classes['content-text']}>
              Osiguranjem od autoodgvoornosti su pokrivene štete koje vaš vozilo napravi drugom vozilu ili trećim licima (pešacima, biciklistima i putnicima u drugom vozilu). Ovo osiguranje se ugovara
              svake godine, kada se redi registracija.
              <br />
              <br />
              U slučaju saobraćajne nezgode, osiguravajuće društvo koje je osiguralo vozilo koje je napravilo štetu, isplaćuje štetu koja je nastala. Nikada se ne isplaćuje šteta na vozilu koje je
              napravilo štetu. Šteta se isplaćuje i to bez obzira, da li ja vozilom upravljao vlasnik vozila ili neko drugo lice, jer polisa važi za vozilo. Za slučaj da vozilo napravi prekršaj u
              saobraćaju i tom prilikom napravi štetu, vrlo verovatno je da će osiguravajuća kuća isplatiti štetu oštećenom, ali će taj iznos refundirati od onog ko je upravljao vozilom. Polisa važi
              do isteka, godinu dana, pa čak i kada se promeni vlasnik.
              <br />
              <br />
              Preporuka je, ako želite da i vaš auto bude osiguran, da uradite i kasko osiguranje.
            </p>
          </div>
        </div>

        <div className={classes.info3}>
          <div className={classes['content']}>
            {/* <h2 className={classes['content-small-title']}>Osiguranje vozila</h2> */}
            <h1 className={classes['content-title']}>Česta pitanja o osiguranju od autoodgovornosti</h1>

            <h2 className={classes.title}>Šta je to bonus na polisi Autoodgovornost?</h2>
            <p className={classes['content-text']}>Bonus je popust na osiguranje od autoodgovornosti, koji dobijate kao nagradu zbog toga niste imali štetnih događaja u prethodnoj godini.</p>

            <h2 className={classes.title}>Šta je to malus?</h2>
            <p className={classes['content-text']}>
              Malus je kazna za vlasnika vozila, jer je u prethodnoj godini izazvao udes, zbog čega je osiguravajuća kuća isplatila određen iznos te štete. Zbog toga će i sledećih nekoliko godina ovo
              osiguranje biti skuplje. Naravno, svake godine kada nema
            </p>

            <h2 className={classes.title}>Bonus i malus su vezani za vozača ili za auto?</h2>
            <p className={classes['content-text']}>Bonus i malus vezani su za vozača. Ne vezuju se za vozilo i ne prenose se na novog vlasnika u slučaju prodaje vozila.</p>
          </div>
        </div>

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

export default Autoodgovornost;
