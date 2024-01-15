import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './NaknadaSteteZaFizickuIDusevnuBol.module.css';

const NaknadaSteteZaFizickuIDusevnuBol = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header />
      <main className={classes.main}>
        <div className={classes.hero}>
          <div className={classes.content}>
            <h2 className={classes['small-title']}>NAKNADA ŠTETE ZA FIZIČKI I DUŠEVNI BOL</h2>
            <h1 className={classes['title']}>
              NAKNADA ŠTETE ZA FIZIČKI <br /> I DUŠEVNI BOL<span>.</span>
            </h1>
          </div>
        </div>

        <div className={classes.info1}>
          <p className={classes.text}>
            NEMATERIJALNA ŠTETA je pravno priznata povreda nematerijalnog dobra, sa različitim pojavnim oblicima. Sledeći oblici nematerijalne štete postoje:
            <br />
            <br />
            <ul>
              <li>
                pretrpljeni i budući fizički bolovi obično se definiše kao zaštitini mehanizam ljudskog tela, koji se manifestuje refleksnim reagovanjem u slučaju povrede nekog tkiva. Dokazuje se pred
                sudom, veštačenjem posredstvom veštaka medicinske struke
              </li>
              <li>
                pretrpljeni i budući strah je najneprijatniji ljudski doživljaj, uslovljen saznanjem o neposrednoj ugrožavajućoj opasnosti. Po pravilu, lako je dokaziv i kod suda se dokazuje
                veštačenjem
              </li>
              <li>
                pretrpljeni i budući duševni bolovi zbog umanjenja opšte životne aktivnosti je vrsta nematerijalne štete koja nastaje kao posledica povrede tela.Visina i procenat umanjenja opšte
                životne aktivnosti pretežno zavise od sposobnosti veštaka da ovu naknadu personalizuje u skladu sa stanjem oštećenog lica
              </li>
              <li>pretrpljeni i budući duševni bolovi zbog naruženosti je uslovljena stepenom izmene spoljašnosti oštećenog lica i kod suda utvrđuje se veštačenjem</li>
              <li>pretrpljeni i budući duševni bolovi zbog smrti bliskog lica, kao vid štete ograničen je stepenom srodstva i po pravilu sud ga utvrđuje na osnovu slobodne ocene, bez veštačenja</li>
              <li>
                pretrpljeni i budući duševni bolovi zbog teškog invaliditeta bliskog lica, uslovljena je stepenom srodstva i stepenom invalidnosti bliskog lica. Vezana je za umanjenu opštu životnu
                aktivnost oštećenog lica.
              </li>
            </ul>
            <br />
            Naplata nematerijalne štete je moguća, ali i najteže dokaziva i naplativa.
            <br />
            U ovim slučajevima će Vam od velike koristi biti pomoć iskusnih profesionalaca iz oblasti osiguranje i prava.
            <br />
            <b>Zato nas pozovite da Vas posavetujemo kako da naplatite i ovu štetu.</b>
          </p>
        </div>

        <div id="contact-form"></div>
        <ContactForm />
      </main>

      <Footer />
    </Fragment>
  );
};

export default NaknadaSteteZaFizickuIDusevnuBol;
