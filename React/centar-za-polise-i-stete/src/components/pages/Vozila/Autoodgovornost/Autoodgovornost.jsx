import { Fragment, useEffect } from 'react';

import classes from './Autoodgovornost.module.css';

import ContactForm from '../../../UI/ContactForm/ContactForm';
import FAQ from '../../../UI/FAQ/FAQ';

import bgImage from '../../../../assets/img/autoodgovornost-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Šta je to bonus na polisi Autoodgovornost?',
    answer: 'Bonus je popust na osiguranje od autoodgovornosti, koji dobijate kao nagradu zbog toga niste imali štetnih događaja u prethodnoj godini.',
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Šta je to malus?',
    answer:
      'Malus je kazna za vlasnika vozila, jer je u prethodnoj godini izazvao udes, zbog čega je osiguravajuća kuća isplatila određen iznos te štete. Zbog toga će i sledećih nekoliko godina ovo osiguranje biti skuplje. Naravno, svake godine kada nema',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Bonus i malus su vezani za vozača ili za auto?',
    answer: 'Bonus i malus vezani su za vozača. Ne vezuju se za vozilo i ne prenose se na novog vlasnika u slučaju prodaje vozila.',
    show: '',
    collapsed: 'collapsed',
  },
];

const Autoodgovornost = () => {
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
                <h2>Autoodgovornost</h2>
                <p>Osiguranje od autoodgovornosti je Zakonom obavezno osiguranje. Vozila koja učestvuju u saobraćaju moraju imati polisu autoodgovornosti.</p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4">Polisa autoodgovornosti?</h2>
          <p>
            Osiguranjem od autoodgvoornosti su pokrivene štete koje vaš vozilo napravi drugom vozilu ili trećim licima (pešacima, biciklistima i putnicima u drugom vozilu). Ovo osiguranje se ugovara
            svake godine, kada se redi registracija.
            <br />
            <br />
            U slučaju saobraćajne nezgode, osiguravajuće društvo koje je osiguralo vozilo koje je napravilo štetu, isplaćuje štetu koja je nastala. Nikada se ne isplaćuje šteta na vozilu koje je
            napravilo štetu. Šteta se isplaćuje i to bez obzira, da li ja vozilom upravljao vlasnik vozila ili neko drugo lice, jer polisa važi za vozilo. Za slučaj da vozilo napravi prekršaj u
            saobraćaju i tom prilikom napravi štetu, vrlo verovatno je da će osiguravajuća kuća isplatiti štetu oštećenom, ali će taj iznos refundirati od onog ko je upravljao vozilom. Polisa važi do
            isteka, godinu dana, pa čak i kada se promeni vlasnik.
            <br />
            <br />
            Preporuka je, ako želite da i vaš auto bude osiguran, da uradite i kasko osiguranje.
          </p>

          <br />
          <br />

          <h2 className="pb-4">Čemu služi izveštaj o saobraćajnoj nezgodi (evropski izveštaj)?</h2>
          <p>Od 10. decembra 2009. godine, svi vozači obavezni su da u svom vozilu imaju primerak Izveštaja o saobraćajnoj nezgodi, koji se koristi (popunjava) u slučaju saobraćajne nezgode.</p>
          <ul>
            <li>
              Ovaj izveštaj je obavezan prilikom udesa kada nije obavezan dolazak policije na uviđaj, odnosno prilikom udesa bez povređenih i žrtava. Izuzetak je u slučaju kada jedan od učesnika
              zahteva prisustvo policije;
            </li>
            <li>Izveštaj o saobraćajnoj nezgodi služi pre svega za naplatu štete kod osiguranja;</li>
            <li>Izveštaj treba pažljivo popuniti prema instrukcijama koje su navedene u njemu i moraju ga potpisati svi vozači – učesnici udesa;</li>
            <li>
              Prilikom podnošenja zahteva za naplatu štete poželjno je i da dostavite fotografije vozila koja su učestvovala u nezgodi, kao i mesta na kome se nezgoda dogodila, ukoliko ste bili u
              prilici da ih zabeležite.
            </li>
          </ul>

          <br />
          <br />

          <h2 className="pb-4">Da li vam je potreban zeleni karton?</h2>
          <p>
            Za putovanje u inostranstvo potrebno je da posedujete zeleni karton, i to za zemlje: Makedonija, Rusija, Belorusija, Ukrajina, Moldavija, Turska, Izrael, Iran, Albanija, Tunis i Maroko.Na
            ovaj način obezbedili ste pokrivanje troškova za štete i povrede koje eventualno napravite svojim vozilom u inostranstvu.
          </p>
        </section>
        <ContactForm />
        <FAQ data={faq} />
      </main>
    </Fragment>
  );
};

export default Autoodgovornost;
