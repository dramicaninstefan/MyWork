import { Fragment, useEffect } from 'react';

import classes from './DobrovoljnoZdravstvenoOsiguranje.module.css';

import ContactForm from '../../../UI/ContactForm/ContactForm';
import FAQ from '../../../UI/FAQ/FAQ';

import bgImage from '../../../../assets/img/zdravstveno-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Koliko košta dobrovoljno zdravstveno osiguranje?',
    answer: `Cena polise zavisi od obima pokrića, starosti osiguranika, njegovog zdravstvenog stanja i izabranog paketa usluga. Premija se može prilagoditi prema vašim potrebama i mogućnostima.`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Da li mogu birati lekare i zdravstvene ustanove?',
    answer:
      'Da, mnoge polise dobrovoljnog zdravstvenog osiguranja omogućavaju vam da birate lekare i ustanove u okviru mreže osiguravača, a neki paketi omogućavaju i odlazak kod lekara van mreže uz delimično ili potpuno pokriće troškova.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Koja je razlika između obaveznog i dobrovoljnog zdravstvenog osiguranja?',
    answer: 'Obavezno zdravstveno osiguranje pokriva osnovne zdravstvene usluge koje pruža država, dok dobrovoljno osiguranje pruža dodatna pokrića i usluge koje nisu uključene u osnovno osiguranje.',
    show: '',
    collapsed: 'collapsed',
  },
];

const DobrovoljnoZdravstvenoOsiguranje = () => {
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
                <h2>Dobrovoljno Zdravstveno Osiguranje</h2>
                <p>
                  Dobrovoljno zdravstveno osiguranje pruža vam dodatnu sigurnost i pristup kvalitetnim zdravstvenim uslugama koje nisu obuhvaćene obaveznim zdravstvenim osiguranjem. Ova vrsta
                  osiguranja omogućava vam da brzo i efikasno rešavate zdravstvene probleme, bez dugih čekanja i komplikacija.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4">Šta pokriva dobrovoljno zdravstveno osiguranje?</h2>
          <ul>
            <li>
              <b>Ambulantni pregledi</b> – Brz i jednostavan pristup lekarima specijalistima bez dugih lista čekanja.
            </li>
            <li>
              <b>Laboratorijske analize i dijagnostika</b> – Pokriva troškove potrebnih analiza i dijagnostičkih procedura.
            </li>
            <li>
              <b>Bolničko lečenje</b> – Uključuje troškove hospitalizacije, operacija i postoperativnog lečenja.
            </li>
            <li>
              <b>Preventivni pregledi</b> – Omogućava vam da redovno kontrolišete svoje zdravlje kroz preventivne preglede.
            </li>
            <li>
              <b>Tretmani i terapije</b> – Pokriva različite terapijske tretmane, kao što su fizikalna terapija, rehabilitacija, i drugo.
            </li>
          </ul>

          <br />
          <br />

          <h2 className="pb-4">Koje su prednosti dobrovoljnog zdravstvenog osiguranja?</h2>
          <ul>
            <li>
              <b>Brz pristup lekarima i specijalistima </b> – Ne morate čekati na pregled, što može biti ključno u hitnim situacijama.
            </li>
            <li>
              <b>Širok spektar pokrića</b> – Osiguranje obuhvata troškove lečenja koji mogu biti veoma visoki ako nisu pokriveni obaveznim osiguranjem.
            </li>
            <li>
              <b>Fleksibilnost</b> – Polisa se može prilagoditi vašim potrebama, omogućavajući vam da birate nivo pokrića i usluge koje su vam najvažnije.
            </li>
            <li>
              <b>Pokrivenost širom sveta</b> – U zavisnosti od vrste polise, moguće je imati osiguranje koje važi i u inostranstvu.
            </li>
          </ul>

          <br />
          <br />

          <h2 className="pb-4">Kako se ugovara dobrovoljno zdravstveno osiguranje?</h2>
          <p>
            Dobrovoljno zdravstveno osiguranje može se ugovoriti individualno, porodično ili grupno, u zavisnosti od vaših potreba. Procedura je jednostavna: potrebno je odabrati plan osiguranja,
            popuniti prijavu, i izvršiti uplatu premije. Nakon toga, dobijate polisu koja vam pruža pokriće prema ugovorenim uslovima.
          </p>

          <br />
          <br />

          <h2 className="pb-4">Zašto je važno imati dobrovoljno zdravstveno osiguranje?</h2>
          <p>
            Nepredviđene zdravstvene situacije mogu se dogoditi u bilo kom trenutku. Sa dobrovoljnim zdravstvenim osiguranjem, imate pristup najboljoj mogućoj nezi, bez obzira na komplikacije koje
            mogu nastati. To vam daje mir i sigurnost, znajući da ste zaštićeni u svim situacijama.
          </p>
        </section>

        <ContactForm />

        <FAQ data={faq} />
      </main>
    </Fragment>
  );
};

export default DobrovoljnoZdravstvenoOsiguranje;
