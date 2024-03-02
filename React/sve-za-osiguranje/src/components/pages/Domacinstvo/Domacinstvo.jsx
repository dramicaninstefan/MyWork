import { Fragment } from 'react';

import Header from '../../Header/Header';
import Footer from '../../Footer/Footer';
import ContactForm from '../../ContactForm/ContactForm';
import CallUs from '../../UI/CallUs';
import ViberUs from '../../UI/ViberUs';

import classes from './Domacinstvo.module.css';

import slika1 from '../../../assets/domacinstvo-400x390.jpg';

const Domacinstvo = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Osiguranje imovine</h2>
            <h1 className={classes['content-title']}>
              Polisa za Osiguranje imovine<span>.</span>
            </h1>
            <p className={classes['content-text']}>
              Sigurnost imovine je jedna od osnovnih ljudskih potreba, što predstavlja ekonomsku nužnost i odlika je brige o svojoj sigurnosti, kako privatno, tako i poslovno.
            </p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div className={classes.info2}>
          <p className={classes.text}>
            Imovina, bilo da je privatna (kuće, stanovi), poslovna (poslovni prostor, zalihe, oprema), izloženi su velikom broju rizika.
            <br />
            Ukoliko bi nešto od pobrojanih bilo ugroženo, može da izazove ozbiljne direktne ili indirektne finansijske gubitke i ugroziti opstanak porodice/firme.
            <br />
            Da li je potebno da taj rizik preuzimate na sebe?
            <br />
            Osiguravajuće kuće se bave preuzimanjem rizika za ovakve situacije, te je najsvrsishodnije i najbolje taj rizik prepustiti profesionalcima-osiguavajuj kući. Na taj način bi se odgovorno
            ponašali prema imovini.
            <br />
            Neki od rizika za koje je moguće ugovoritu osiguranje imovine :
            <br />
            <br />
          </p>

          <ul>
            <li>pozar</li>
            <li>udar groma</li>
            <li>eksplozija</li>
            <li>oluja</li>
            <li>grad</li>
            <li>poplava i bujica</li>
            <li>izlivanje vode iz instalacija</li>
            <li>provalna krađa i razbojništov</li>
            <li>lom stakala</li>
            <li>lom mašina</li>
            <li>računara</li>
            <li>pokretne tehnike</li>
            <li>objekata u izgradnji/montaži</li>
            <li>robe u transportu</li>
            <li>prekida rada usled požara (šomaž) i</li>
            <li>drugi nepredviđeni događaji</li>
          </ul>

          <p className={classes.text}>
            <br />
            Prepuštanjem rizika na osiguravajuću kuću – osiguranjem, Vi ćete platiti određenu premiju, a za uzvrat ćete dobiti mogućnost da potencijalno velike i neočekivane troškove štete naplatite
            kod te osiguravajuće kuće.
          </p>
          <br />
        </div>

        <div className={classes.info3}>
          <h2 className={classes.title}>Q&A</h2>
        </div>

        <div className={classes.info4}>
          <h2 className={classes.title}>Polisa za Osiguranje od odgovornosti</h2>

          <p className={classes.text}>
            Sve što radite, ili ste propustili da uradite, predstavlja potencijalni izvor opasnosti za treća lica i njihovu imovinu.
            <br />
            Da li Vam je potrebno osiguranje od odgovornosti?
            <br />
            Može se ugovoriti osiguranje svoje odgovornosti iz svakodnevnog života (kao nosilac domaćinstva, vlasnik kuće ili stana).
            <br />
            Takođe, ukoliko su Vaši radnici ili mašina odgovorni za povredu, oštetili ili uništili imovinu trećem licu, možete biti odgovorni ukoliko postoji Vaša krivica za nastalu štetu.
            <br />
            Šteta koju ste načinili može da bude baš velika. Te otuda odštetni zahtevi koja treća lica mogu postaviti prema Vama mogu biti izuzetno veliki.
            <br /> Pored isplate odštete trećim licima u slučaju opravdanog zahteva za naknadu štete društvo za osiguranje pruža Vam kompletnu pravnu zaštitu za:
            <br />
            <br />
          </p>

          <ul>
            <li>utvrđivanje odgovornosti Osiguranika za nastalu štetu</li>
            <li>vođenje spora u ime Osiguranika</li>
          </ul>

          <p className={classes.text}>
            <br />
            Sudska praksa je obično na strani slabijeg i neće se dvoumiti u pogledu Vaše odgovornosti kada je reč o telesnim povredama trećih lica, raznih kategorija. Čak i kada ništa niste učinili,
            možete biti odgovorni, jer ste, npr trebali da učinite i na taj način ste stvorili izvor opasnosti koji nekome može naneti štetu.
            <br />
            <br />
            <b>Koje vrste osiguranja od odgovornosti postoje?</b>
            <br />
            <br />
          </p>

          <ul>
            <li>
              Osiguranje od opšte odgovornosti – osigurava se zakonska građanska odgovornost Osiguranika za štete usled smrti, povrede tela ili zdravlja, kao i oštećenja ili uništenja stvari trećeg
              lica.
            </li>
            <li>Odgovornost fizičkih lica – namenjeno je svima, koji su zabrinuti za štete, koje mogu naneti u svojstvu privatnog lica i to svojim komšijama, prijateljima, slučajnim prolaznicima.</li>
            <li>
              Produktna odgovornost – ovo je osiguranje od odgovornosti iz upotrebe proizvoda | produktna odgovornost štiti Vas od štete nanete korisnicima Vaših proizvoda, odnosno usluga i obezbeđuje
              Vam konkurentsku prednost.
            </li>
            <li>
              Profesionalna odgovornost – osiguranje od odgovornosti iz upotrebe proizvoda | produktna odgovornost štiti Vas od štete nanete korisnicima Vaših proizvoda, odnosno usluga i obezbeđuje
              Vam konkurentsku prednost.
            </li>
            <li>
              Odgovornost vozara (CMR) – Roba koja je osigurana u prevozu, ne oslobađa vozara i ostala lica odgovornosti za štetu, od njihove obaveze da plate naknadu za pričinjenu štetu. Transport
              robe je posao koji je najfrekventniji na svetu. Roba se prevozi raznim prevoznim sredstvima (brodovi, avioni, kamioni, kombinovani…), od tačke A do tačke B i bez obzira na obazrivost
              prevoznika i pakovanje, dešavaju se oštećenja. Osiguranje u transportu služi da smanji ove rizike i neprediviđene troškove koji mogu da nastanu usled oštećena robe.
            </li>
          </ul>

          <p className={classes.text}>
            <br />
            <b>Zašto osigurati odgovornost?</b>
            <br />
            <br />
            Ma koliko god se trudili, ne možemo uvek predvidi šta se sve može dogoditi… Budite odgovorni i ugovorite polisu osiguranja od odgovornosti.
          </p>
        </div>

        <div id="contact-form"></div>
        <ContactForm />

        <CallUs />
        <ViberUs />
      </main>

      <Footer />
    </Fragment>
  );
};

export default Domacinstvo;
