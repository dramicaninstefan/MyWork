import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';
import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';

import classes from './NaknadaSteteKasko.module.css';

const NaknadaSteteKasko = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--hero-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.hero}>
          <div className={classes.content}>
            <h2 className={classes['small-title']}>NAKNADA ŠTETE – KASKO OSIGURANJE</h2>
            <h1 className={classes['title']}>
              NAKNADA ŠTETE KASKO OSIGURANJE<span>.</span>
            </h1>
          </div>
        </div>

        <div className={classes.info1}>
          <p className={classes.text}>
            Auto-kasko osiguranje predstavlja osiguravajuću zaštitu od uništenja i oštećenja vozila u slučaju saobraćajne nezgode, požara, pada ili udara nekog predmeta, udara groma, oluje, grada,
            snežne lavine, poplave, eksplozije, iznenadnog termičkog ili hemijskog delovanja spolja, zemljotresa, manifestacija ili demonstracija, i krađe uz dopunsko ugovaranje. Ovde je situacija
            mnogo jasnija jer se radi o šteti nastaloj na vašem vozilu. Šteta će biti nadoknađena bez obzira na to da li ste vi izazvali udes ili neko drugi.
            <br />
            Međutim, i kod ovog osiguranje, neretko dođe do neželjenih reakcija od strane osiguravajuće kuće (odbijanje prava na naplatu štete, umanjenje obračuna naknade za štetu i drugo). Sve to
            može da bude jako neprijatno i nerešivo za običnog čoveka. U tim slučajevima, kontaktirajte nas da Vam pomognemo.
            <br />
            <br />
            <br />
            <b>NAPLATA ŠTETE NA VOZILU OD LEDENICA:</b>
            <br />
            <br />
            Većina građana kojima je na automobil pao sneg sa krova zgrade, led, ledenice, ili se prelomila i pala neka grana drveta kraj koga je bio parkirano vozilo, ne uspe da nadoknadi pričinjenu
            štetu, a ima prvo na naknadu štete. Obično je to iz razloga neznanja građana. A neretko i “bezobrazluk” osiguravajućih kuća ili vlasnika objekta.
            <br />
            Neretko je i loša organizacija oko prijave štete od strane oštećenog građanina uzrok za kasnije odbijanje odštetnog zahteva.
            <br />
            Zato je dobro, čim Vam se desi ovakav slučaj, da nas pozovet da Vas instruišemo šta i kako je potrebno da uradite, da kasnije ne biste imali problema oko naplate štete.
            <br />
            Ono što trebate znati u tom slučaju je:
            <br />
            – Potrebno je da, kada uočite štetu na vozilu, pozovete saobraćajnu policiju koja treba da izvrši uviđaj i sačiniti zapisnik
            <br />
            – Nije potrebno kasko osiguranje da bi ste naplatili štetu na vozilu.
            <br />
            – ukoliko imate zaključeno osiguranje stakala uz polisu autoodgovornosti, imate pravo na naplatu štete, ali je i u ovom slučaju potrebno da pozovete policiju da sačini zapisni.
            <br />
            – Za slučaj da je vozilo oštećeno ispred poslovnog objekta štetu nadoknađuje vlasnik tog objekta
            <br />
            <br />
            <b>NAKNADA ŠTETE OD PADA DRVETA NA AUTO – ZELENILO BEOGRAD</b>
            <br />
            <br />
            Ukoliko je pala grana sa drveta koje je u nadležnosti javnog komunalnog preduzeća, onda je neophodno da građani pozovu policiju da prijave slučaj, kako bi kasnije ostvarili pravo na
            naknadu štete. Ovakve štete se naknađuju od javnog komunalnog preduzeća koje održava drvored.
            <br />U ovim slučajevima, obratite se nama da Vam pomognemo oko naplate materijalne, pa i nematerijalne štete.
            <br />
            <br />
            <b>NAKNADA ŠTETE U SLUČAJU OŠTEĆENJA VOZILA NA PARKINGU</b>
            <br />
            <br />
            Šta uraditi u slučaju da ste ostavili automobil na parkingu, a kada ste se vratili zatekli ste ulubljeno vozilo? Počinilac se, naravno, izgubio, napustio mesto nezgode, a šteta nije mala.
            Pitanje je: da li je moguće u ovakvim slučajevima naplatiti štetu i kome se obratiti kako biste ostvarili svoja prava?
            <br />
            Vlasnik vozila koji ima kasko polisu osiguranje, će bez problema naplatiti načinjenu štetu, treba samo da se obrati svojoj osiguravajućoj kući koja će mu isplatiti naknadu za nastalu
            štetu.
            <br />
            Ukoliko pak nemate kasko, moguće je da naplatite štetu. Neophodno je da pozove policiju pre pomeranja vozila i policija će napraviti zapisnik i naložiti pregledanje snimaka okolnih kamera
            na javnom parkingu. Na osnovu toga bi se utvrdilo koje je vozilo napravilo štetu, a onda bi se vlasnik oštećenog vozila obratio osiguravajućoj kući u kojoj to vozilo ima polisu osiguranja
            autoodgovornosti.
            <br />
            Ukoliko se ispostavi da vozilo koje je napravilo štetu nije osigurano, za naknadu štete bi se trebalo obratiti Garantnom fondu, koji se nalazi pri Udruženju osiguravača. Garantni fond
            inače isplaćuje materijalne štete (nastale na stvarima) i nematerijalne (za povrede ljudi) koje napravi neosigurano vozilo.
          </p>
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

export default NaknadaSteteKasko;
