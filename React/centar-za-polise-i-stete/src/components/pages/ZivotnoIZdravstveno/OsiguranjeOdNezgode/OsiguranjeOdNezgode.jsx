import { Fragment, useEffect } from 'react';

import classes from './OsiguranjeOdNezgode.module.css';

import ContactForm from '../../../UI/ContactForm/ContactForm';
import FAQ from '../../../UI/FAQ/FAQ';

import bgImage from '../../../../assets/img/nezgode-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Kako se podnosi zahtev za naknadu štete?',
    answer: `Obično je potrebno dostaviti medicinsku dokumentaciju, izveštaj o nezgodi i popuniti formular za zahtev za naknadu.`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Ko može da se osigura?',
    answer: 'Polisa osiguranja od nezgode dostupna je pojedincima, porodicama i grupama, u zavisnosti od osiguravajuće kuće i njihovih ponuda.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Koje su prednosti osiguranja od nezgode?',
    answer: 'Finansijska zaštita u slučaju ozbiljnih povreda, pomoć u pokrivanju medicinskih troškova, i dodatni novčani iznosi u slučaju trajnog invaliditeta ili smrti.',
    show: '',
    collapsed: 'collapsed',
  },
];

const OsiguranjeOdNezgode = () => {
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
                <h2>Osiguranje od nezgode</h2>
                <p>
                  Osiguranje od nezgode je vrsta polise koja pruža finansijsku zaštitu u slučaju da se suočite sa povredama ili smrtnošću usled nezgode. Ova vrsta osiguranja pokriva različite
                  situacije i okolnosti koje mogu izazvati ozbiljne posledice po vaše zdravlje ili bezbednost.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4">Šta pokriva osiguranje od nezgode?</h2>
          <p>Osiguranje od nezgode obično pokriva:</p>
          <ul>
            <li>
              <b>Medicinske troškove:</b> Troškove lečenja, bolničkog boravka, i rehabilitacije nastalih usled nezgode.
            </li>
            <li>
              <b>Naknade za invaliditet:</b> Novčane naknade u slučaju trajnog invaliditeta.
            </li>
            <li>
              <b>Smrtne naknade:</b> Iznosi koji se isplaćuju u slučaju smrti uzrokovane nezgodom.
            </li>
          </ul>

          <br />
          <br />

          <h2 className="pb-4">Vrste nezgoda koje su pokrivene</h2>
          <ul>
            <li>Saobraćajne nesreće</li>
            <li>Nesreće na radu</li>
            <li>Kućne nezgode</li>
            <li>Sportske povrede</li>
          </ul>

          <br />
          <br />

          <h2 className="pb-4">Kako se određuje visina premije?</h2>
          <p>Premija za osiguranje od nezgode zavisi od nekoliko faktora, uključujući:</p>
          <ul>
            <li>Starost osiguranika</li>
            <li>Profesiju i način života</li>
            <li>Tip aktivnosti u kojoj osiguranik učestvuje</li>
            <li>Nivo pokrića koji se bira</li>
          </ul>

          <p>
            <b> Izuzeci u pokriću</b>
            <br />
            Osiguranje od nezgode obično ne pokriva:
          </p>
          <ul>
            <li>Namerno samopovređivanje</li>
            <li>Povrede nastale pod uticajem alkohola ili droga</li>
            <li>Povrede u vezi sa ratnim ili terorističkim aktivnostima</li>
          </ul>

          <br />
          <br />

          <h2 className="pb-4">Kako se određuje visina premije?</h2>
          <p>Premija za osiguranje od nezgode zavisi od nekoliko faktora, uključujući:</p>
          <ul>
            <li>Starost osiguranika</li>
            <li>Profesiju i način života</li>
            <li>Tip aktivnosti u kojoj osiguranik učestvuje</li>
            <li>Nivo pokrića koji se bira</li>
          </ul>
        </section>

        <ContactForm />

        <FAQ data={faq} />
      </main>
    </Fragment>
  );
};

export default OsiguranjeOdNezgode;
