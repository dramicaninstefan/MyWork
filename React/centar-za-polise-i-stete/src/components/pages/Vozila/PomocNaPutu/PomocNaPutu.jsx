import { Fragment, useEffect } from 'react';

import classes from './PomocNaPutu.module.css';

import ContactForm from '../../../UI/ContactForm/ContactForm';
import FAQ from '../../../UI/FAQ/FAQ';

import bgImage from '../../../../assets/img/pomocnaputu-hero-bg.png';

const faq = [
  {
    id: 1,
    question: 'Šta pokriva usluga pomoći na putu?',
    answer: 'Pomoć na putu obično pokriva usluge poput šlepovanja, zamene guma, dopune goriva, otključavanja vozila, i startovanja baterije',
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Kako mogu pozvati pomoć na putu?',
    answer: 'U slučaju potrebe, možete pozvati broj telefona koji vam je dodeljen prilikom osiguranja ili koristiti aplikaciju osiguravajuće kuće ako je dostupna.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Da li je pomoć na putu dostupna 24/7?',
    answer: 'Većina usluga pomoći na putu je dostupna 24 sata dnevno, 7 dana u nedelji, tokom cele godine.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 4,
    question: 'Koliko brzo mogu očekivati dolazak pomoći?',
    answer: 'Vreme dolaska zavisi od lokacije i trenutnih uslova, ali većina usluga se trudi da stigne na lokaciju u roku od 30 do 60 minuta.',
    show: '',
    collapsed: 'collapsed',
  },
];

const PomocNaPutu = () => {
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
                <h2>Pomoć na putu</h2>
                <p>
                  Krenuli ste na put, sami ili sa porodicom, kupili ste i putno osiguranja, sipali ste gorivo i krećete. Jako bitna stvar za putovanje, jer se nezgode-kvarovi dešavaju na putu, je
                  pomoć na putu. Predlažemo Vam, jer je to najjeftinija varijanta za slučaj kvara i slično, da ugovorite i pomoć na putu. Mi ćemo Vam sve organizovati.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <h2 className="pb-4"> Zašto bi kupili Pomoć na putu?</h2>
          <p>
            Glavno pitanje je, zašto bi ste rizikovali da Vam propadne put, zbog troška od par desetina eura, zavisno od paketa koji odaberete. Pomoć na putu važi i u zemlji i u inostranstvu, 365,
            24/7. Pomoć se organizuje preko asistentske kuće.
            <br />
            <br />
            Paketi pomoći na putu su različiti, sa različitim pokrićima i cenom koštanja.
            <br />
            <br />
            Postavlja se pitanje, zašto biste rizikovali da godišnji odmor dovodite u pitanje zbog sume od svega 20 evra. Jer toliko upravo košta usluga Pomoć na putu. I to, za razliku od putnog
            osiguranja koje se kupuje samo za vreme trajanja odmora u inostranstvu, Pomoć na putu biće vaš veran pratilac 365 dana u godini i u zemlji i van nje.
            <br />
            <br />
            Korišćenjem usluge Pomoć na putu možete da osigurate pomoć u slučaju nezgode i u slučaju kvara i to u Srbiji i Evropi. Putem našeg webshopa na raspolaganju su vam dva paketa – Komfort po
            ceni od 2.363 dinara i Ekskluziv, koji za godinu dana korišćenja košta 2.835 dinara
          </p>

          <br />
          <br />

          <h2 className="pb-4">Šta dobijate paketom Komfort?</h2>
          <p>
            Asistenstske kuće su vam dostupne putem info linije koja radi 24/7 i organizuju vam pomoć adekvatnu situaciji u kojoj ste se našli. Najpre, postoji mogućnost da će uz pomoć stručnjaka koji
            dolaze na lice mesta Vaš automobil moći da bude popravljen odmah. Ukoliko je reč o pokretanju rada motora, zameni sijalica ili otklanjanju nekog manjeg kvara u vrednosti do 50 evra u
            Srbiji i 100 evra u Evropi.
            <br />
            <br />
            Pomoć na putu biće Vaš spasilac i u slučaju nedostatka goriva u slučaju kvara u Srbiji ili Evropi, kao i u slučaju gubitka, krađe ili oštećenja ključeva. U vrednosti od 80 pa do 150 evra
            biće vam pružena i usluga vuče vozila. Takođe uslugom Pomoć na putu obezbedićete sebi nastavak putovanja ili povratak u mesto prebivališta u protivvrednosti 70, odnosno 140 evra u
            inostranstvu. Komfort paket pokriva u nekim situacijama i prenoćište, povratak vozila iz inostranstva do iznosa od 200 evra, kao i troškove parkinga oštećenog vozila ili čak slanja delova
            u inostranstvo.
          </p>

          <br />
          <br />

          <h2 className="pb-4">Šta dobijate paketom Ekskluziv?</h2>
          <p>
            Za samo 500 dinara, koliko je ovaj paket skuplji od Komforta, paket Ekskluziv omogućava jednu dodatnu i važnu uslugu a to je najam vozila u slučaju popravke. I to u iznosu od 70 evra u
            Srbiji i dvostruko većeg iznosa u Evropi. I to nije sve, ovim paketom, koji je samo četiri evra skuplji od Komforta, dobijate mogućnost plaćanja parkiranja za oštećeno vozilo u
            inostranstvu do 150 evra, dok je u slučaju manjeg paketa to samo do iznosa od 75 evra. Dodatna usluga u odnosu na Komfort paket je i postojanje mogućnosti slanja rezervnih delova na
            teritoriji Srbije i to i u slučaju nezgode i u slučaju kvara.
            <br />
            <br />
            Pomoć na putu važi godinu dana i za sedam dinara dnevno tokom tog perioda imate pokrivena čak ČETIRI osigurana slučaja
          </p>
        </section>

        <ContactForm />

        <FAQ data={faq} />
      </main>
    </Fragment>
  );
};

export default PomocNaPutu;
