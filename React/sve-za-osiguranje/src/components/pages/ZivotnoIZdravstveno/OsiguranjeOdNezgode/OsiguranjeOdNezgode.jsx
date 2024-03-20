import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';
import WhatsApp from '../../../UI/WhatsApp';
import SocialIcons from '../../../UI/SocialIcons';
import ToTop from '../../../UI/ToTop';

import classes from './OsiguranjeOdNezgode.module.css';

import slika1 from '../../../../assets/kasko-osiguranje-400x390.jpg';

const OsiguranjeOdNezgode = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            {/* <h2 className={classes['content-small-title']}>Osiguranje od nezgode</h2> */}
            <h1 className={classes['content-title']}>Polisa za Osiguranje od nezgode</h1>
            <p className={classes['content-text']}>
              Osiguranje od nezgode služi za ublaživanje negativnih posledica nezgode, koja je nepredvidiva, koja može da prouzrokuje i velike finansijske troškove.
            </p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div className={classes.info2}>
          <h2 className={classes.title}>Osnovno kasko osiguranje</h2>

          <p className={classes.text}>
            Osiguranje od nezgode vam omogućava da uz mala ulaganja, pružite sebi i svojim voljenima finansijsku zaštitu.
            <br />
            Individualno osiguranje lica od posledica nesrećnog slučaja, pruža prvu neophodnu finansijsku pomoć. U skladu sa potrebama možete ugovoriti pokriće za: <br />
            <br />
          </p>

          <ul>
            <li>Smrti usled nesrećnog slučaja – nezgode</li>
            <li>Trajnog invaliditeta usled nesrećnog slučaja – nezgode</li>
            <li>Troškova lečenja usled nesrećnog slučaja – nezgode</li>
            <li>Dnevne naknade u slučaju prolazne nesposobnosti za rad usled nesrećnog slučaja -nezgode</li>
            <li>Gubitka zarade (kod obaveznog osiguranja)</li>
            <li>Troškova spasavanja (kod osiguranja članova planinarskog i speleološkog saveza)</li>
          </ul>

          <p className={classes.text}>
            <br />
            Kolektivno osiguranje zaposlenih je moguće u raznim kolektivima
            <br />
            <br />
            Kod osiguranja od nezgode, ugovaraju se odgovarajuća maksimalna pokrića-sume osiguranja po rizicima i u zavisnosti od nezgode, isplaćuje se deo ili ceo iznos od sume osiguranja.
          </p>
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

export default OsiguranjeOdNezgode;
