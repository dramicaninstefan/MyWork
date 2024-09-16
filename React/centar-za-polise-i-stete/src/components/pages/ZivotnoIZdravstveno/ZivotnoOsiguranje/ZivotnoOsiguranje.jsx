import { Fragment } from 'react';

import classes from './ZivotnoOsiguranje.module.css';

import ContactForm from '../../../UI/ContactForm/ContactForm';
import FAQ from '../../../UI/FAQ/FAQ';

import bgImage from '../../../../assets/img/zivotno-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Koje vrste životnog osiguranja postoje?',
    answer: `
      Postoje različite vrste životnog osiguranja, uključujući trajno osiguranje (koje traje ceo život osiguranika) i vremenski ograničeno osiguranje (koje traje određeni period, kao što je 10, 20 ili 30 godina).`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Šta pokriva životno osiguranje?',
    answer: 'Životno osiguranje obično pokriva smrt osiguranika, ali neke polise mogu uključivati dodatna pokrića, poput kritičnih bolesti ili nesreća.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Da li se premija menja tokom trajanja polise?',
    answer: 'To zavisi od vrste osiguranja. Kod nekih polisa premija ostaje ista tokom celog perioda osiguranja, dok kod drugih može rasti sa godinama.',
    show: '',
    collapsed: 'collapsed',
  },
];

const ZivotnoOsiguranje = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <main className="main">
        <section id="hero" className={`${classes.hero} section dark-background`}>
          <img src={bgImage} alt="" data-aos="fade-in" />

          <div className={`${classes.container} container`}>
            <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
              <div className="col-xl-8 col-lg-8 pt-5">
                <h2>Životno Osiguranje</h2>
                <p>Životno osiguranje je štednja sa osiguranjem. Obezebeđuje finansijsku pomoć porodici u slučaju smrti, pokrivajući troškove, dugove i pružajući dugoročnu sigurnost.</p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4"> Zbog čega polisa životnog osiguranja?</h2>
          <p>
            Životno osiguranje je najbolji način da obezbedite/zašitite sebe i svoje voljene. Uz polisu životnog osiguranja, budućnost je predvidivija, imaćete mirniji život. Polisom životnog
            osiguranja, učinili ste odgovoran potez.
            <br />
            <br />
            Životno osiguranje je najatraktivniji oblik ulaganja u svetu, ulaganja u budućnost. Životno osiguranje Vam istovremeno omogućava da uštedite novac i da osigurate svoj život-da obezbedite
            svoje voljene za slučaj da se Vama nešto desi. Životno osiguranje je u svetu jedanod najzastupljeniji oblik štednje sa osiguranjem. Polisom životnog osiguranja, Vi postižete sledeće:
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
          <p>
            Premiju osiguranja za životno osiguranje birate sami, kao i dodatne rizike koje želite da ugovorite.
            <br />
            Životno osiguanje je, pre ili kasnije, potreba savremenog čoveka. Iz tih razloga, ne treba odugovlačiti sa odlukom za osiguranjem. Što se pre odlučite, to ćete dobiti povoljnije uslove za
            polisu
          </p>
        </section>

        <ContactForm />

        <FAQ data={faq} />
      </main>
    </Fragment>
  );
};

export default ZivotnoOsiguranje;
