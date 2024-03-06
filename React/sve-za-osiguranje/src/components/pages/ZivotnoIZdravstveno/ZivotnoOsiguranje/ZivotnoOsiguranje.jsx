import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';
import WhatsApp from '../../../UI/WhatsApp';
import SocialIcons from '../../../UI/SocialIcons';
import ToTop from '../../../UI/ToTop';

import classes from './ZivotnoOsiguranje.module.css';

import slika1 from '../../../../assets/zivotno-osiguranje-400x390.jpg';
import slika2 from '../../../../assets/zivotno-osiguranje2-600x600.jpg';

const ZivotnoOsiguranje = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Životno osiguranje</h2>
            <h1 className={classes['content-title']}>
              Polisa za Životno Osiguranje<span>.</span>
            </h1>
            <p className={classes['content-text']}>Polisa životnog osiguranja je štednja sa osiguranjem!</p>
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
            <h1 className={classes['content-title']}>Zbog čega polisa životnog osiguranja?</h1>
            <p className={classes['content-text']}>
              Životno osiguranje je najbolji način da obezbedite/zašitite sebe i svoje voljene. Uz polisu životnog osiguranja, budućnost je predvidivija, imaćete mirniji život. Polisom životnog
              osiguranja, učinili ste odgovoran potez.
            </p>
          </div>
        </div>

        <div className={classes.info3}>
          <p className={classes.text}>
            Životno osiguranje je najaatraktivniji oblik ulaganja u svetu, ulaganja u budućnost. Životno osiguranje Vam istovremeno omogućava da uštedite novac i da osigurate svoj život-da obezbedite
            svoje voljene za slučaj da se Vama nešto desi. Životno osiguranje je u svetu jedanod najzastupljeniji oblik štednje sa osiguranjem.
            <br />
            Polisom životnog osiguranja, Vi postižete sledeće:
            <br />
            <br />
          </p>

          <ol>
            <li>
              Finansijsku sigurnost, za sebe, svoje voljene – razne neprdvidive situacije su moguće da Vas zapadnu, od raznih povreda, bolesti, pa i onog najgoreg-smrti. U tim situacija, imaćete
              finansijsku sigurnost.
            </li>
            <li>
              Dugoročnu štednju – sve vreme uplaćivanja premije, Vi akumulirate određena sredstva, koje koristite nakon iseka osiguranja. Možete ih koristiti za razne prilike, poput školovanja,
              kupovine stana, automobila, a možete ih koristiti za dodanu penziju.
            </li>
            <li>Dobit – sve vreme uplaćivanja premije, vaš novac se „oplođava“, pripisuje mu se dobit od poslovanja.</li>
            <li>Finansijska pomoć u određenim situacijama – u periodu kada Vam je najpotrebnije, u određenom periodu osiguranja, imate pravo na pomoć u vidu pozajamice sa polise.</li>
            <li>Instrument garancije – skoro svaki kredit u banci zahteva određeni oblik zaštite-garancije. U tom smislu, polisa životnog osiguranja Vam može poslužiti u te svrhe.</li>
          </ol>

          <p className={classes.text}>
            <br />
            Premiju osiguranja za životno osiguranje birate sami, kao i dodatne rizike koje želite da ugovorite.
            <br />
            Životno osiguanje je, pre ili kasnije, potreba savremenog čoveka. Iz tih razloga, ne treba odugovlačiti sa odlukom za osiguranjem. Što se pre odlučite, to ćete dobiti povoljnije uslove za
            polisu.
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

export default ZivotnoOsiguranje;
