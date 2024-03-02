import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';
import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';

import classes from './PomocNaPutu.module.css';

import slika1 from '../../../../assets/pomoc-na-putu-400x390.jpg';

const PomocNaPutu = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Pomoć na putu</h2>
            <h1 className={classes['content-title']}>
              Pomoć na putu<span>.</span>
            </h1>
            <p className={classes['content-text']}>
              Krenuli ste na put, sami ili sa porodicom, kupili ste i putno osiguranja, sipali ste gorivo i krećete. Jako bitna stvar za putovanje, jer se nezgode-kvarovi dešavaju na putu, je pomoć na
              putu. Predlažemo Vam, jer je to najjeftinija varijanta za slučaj kvara i slično, da ugovorite i pomoć na putu. Mi ćemo Vam sve organizovati.
            </p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div className={classes.info2}>
          <div className={classes.content}>
            <h3 className={classes['content-title']}>
              <i className="fa-solid fa-shield"></i> Zašto bi kupili Pomoć na putu?
            </h3>
            <p className={classes['content-text']}>
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
          </div>
        </div>

        <div className={classes.info3}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Auto osiguranje</h2>
            <h1 className={classes['content-title']}>Šta dobijate paketom Komfort?</h1>
            <p className={classes['content-text']}>
              Asistenstske kuće su vam dostupne putem info linije koja radi 24/7 i organizuju vam pomoć adekvatnu situaciji u kojoj ste se našli. Najpre, postoji mogućnost da će uz pomoć stručnjaka
              koji dolaze na lice mesta Vaš automobil moći da bude popravljen odmah. Ukoliko je reč o pokretanju rada motora, zameni sijalica ili otklanjanju nekog manjeg kvara u vrednosti do 50 evra
              u Srbiji i 100 evra u Evropi.
              <br />
              <br />
              Pomoć na putu biće Vaš spasilac i u slučaju nedostatka goriva u slučaju kvara u Srbiji ili Evropi, kao i u slučaju gubitka, krađe ili oštećenja ključeva. U vrednosti od 80 pa do 150 evra
              biće vam pružena i usluga vuče vozila. Takođe uslugom Pomoć na putu obezbedićete sebi nastavak putovanja ili povratak u mesto prebivališta u protivvrednosti 70, odnosno 140 evra u
              inostranstvu. Komfort paket pokriva u nekim situacijama i prenoćište, povratak vozila iz inostranstva do iznosa od 200 evra, kao i troškove parkinga oštećenog vozila ili čak slanja
              delova u inostranstvo.
            </p>
          </div>
        </div>

        <div className={classes.info4}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Auto osiguranje</h2>
            <h1 className={classes['content-title']}>Šta dobijate paketom Ekskluziv?</h1>
            <p className={classes['content-text']}>
              Za samo 500 dinara, koliko je ovaj paket skuplji od Komforta, paket Ekskluziv omogućava jednu dodatnu i važnu uslugu a to je najam vozila u slučaju popravke. I to u iznosu od 70 evra u
              Srbiji i dvostruko većeg iznosa u Evropi. I to nije sve, ovim paketom, koji je samo četiri evra skuplji od Komforta, dobijate mogućnost plaćanja parkiranja za oštećeno vozilo u
              inostranstvu do 150 evra, dok je u slučaju manjeg paketa to samo do iznosa od 75 evra. Dodatna usluga u odnosu na Komfort paket je i postojanje mogućnosti slanja rezervnih delova na
              teritoriji Srbije i to i u slučaju nezgode i u slučaju kvara.
              <br />
              <br />
              Pomoć na putu važi godinu dana i za sedam dinara dnevno tokom tog perioda imate pokrivena čak ČETIRI osigurana slučaja
            </p>
          </div>
        </div>

        <div id="contact-form"></div>
        <ContactForm />

        <ViberUs />
        <CallUs />
      </main>

      <Footer />
    </Fragment>
  );
};

export default PomocNaPutu;
