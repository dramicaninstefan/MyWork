import { Fragment, useEffect } from 'react';

import classes from './Domacinstvo.module.css';

import ContactForm from '../../UI/ContactForm/ContactForm';
import FAQ from '../../UI/FAQ/FAQ';

import bgImage from '../../../assets/img/domacinstvo-hero-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Kako se osigurava imovina?',
    answer:
      'Putno osiguranje nije obavezno, ali je veoma preporučljivo, posebno ako putujete u inostranstvo. Bez osiguranja, možete se suočiti sa visokim troškovima u slučaju hitnih situacija ili drugih nepredviđenih događaja.',
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Šta znači osiguranje na sumu osiguranja?',
    answer:
      'Osiguranje imovine na određenu sumu osiguranja znači da osiguranik plaća premiju osiguranja kako bi osigurao imovinu do određenog iznosa, koji je naznačen kao suma osiguranja. Međutim, odnos između sume osiguranja i stvarne vrednosti imovine igra ključnu ulogu u određivanju naknade štete u slučaju gubitka ili oštećenja imovine. <br/><br/>Evo kako to funkcioniše:<br/><br/>Kada je suma osiguranja jednaka stvarnoj vrednosti osiguranog predmeta: U ovom slučaju, ako dođe do gubitka ili oštećenja imovine, osiguranik će dobiti naknadu štete u iznosu koji odgovara stvarnoj šteti ili gubitku.<br/><br/>Kada je suma osiguranja niža od stvarne vrednosti osiguranog predmeta (podosiguranje): U situaciji kada je suma osiguranja manja od stvarne vrednosti imovine, osiguranik se suočava s podosiguranjem. To znači da osiguranik nije potpuno pokrio vrednost imovine. U slučaju štete, osiguranik će biti nadoknađen samo proporcionalno iznosu pokrivenosti, odnosno odnosu između sume osiguranja i stvarne vrednosti imovine. Na primer, ako je imovina vredna 100.000 dolara, a suma osiguranja je 50.000 dolara, osiguranik će biti pokriven samo za 50% štete.<br/><br/>Suma osiguranja je maksimalni iznos koji osiguravajuća kompanija može platiti u slučaju štete ili gubitka. To je ograničenje pokrića koje osiguranik ima prema polisi osiguranja.<br/><br/>Ukratko, suma osiguranja treba da odražava stvarnu vrednost imovine kako bi osiguranik bio adekvatno zaštićen u slučaju gubitka ili oštećenja. Podosiguranje može dovesti do nepotpunog pokrića i finansijskih gubitaka za osiguranika u slučaju štete.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Šta je podosiguranje?',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 4,
    question: 'Šta znači osiguranje na ,,prvi rizik”?',
    answer:
      'Osiguranje na "prvi rizik" je pristup koji omogućava osiguraniku da odabere pokriće za određene rizike sa limitiranim iznosom pokrića, koji može biti manji od ukupne vrednosti osigurane imovine. Ovaj pristup se često koristi za specifične situacije ili rizike gde se očekuje da će šteta biti ograničena na određene delove imovine.<br/><br/>Na primer, ako osiguranik živi u području gde su poplave česte, ali je verovatno da će poplava uticati samo na podrumske prostorije i prizemlje, osiguranje na "prvi rizik" omogućava da se pokriće ograniči na te delove imovine.<br/><br/>Prednost ovog pristupa je ušteda u premiji, jer osiguranik plaća premiju samo za pokriće koje je specifično odabrano za određeni rizik i sa određenim limitom pokrića. Osim toga, ovaj pristup ne primenjuje načelo podosiguranja, što znači da osiguravajuća kompanija plaća naknadu štete do iznosa ugovorene sume na "prvi rizik", bez obzira na stvarnu vrednost štete.<br/><br/>Važno je da osiguranik pažljivo proceni potencijalne rizike i moguću štetu prilikom odabira sume osiguranja na "prvi rizik". Ovo osiguranje se često koristi za specifične situacije gde je verovatnoća nastanka štete ograničena na određene delove imovine ili događaje.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 5,
    question: 'Kako se određuje vrednost sume osiguranja za osiguranja nekretnina?',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 6,
    question: 'Šta je franšiza?',
    answer:
      'Franšiza predstavlja iznos koji osiguranik plaća kao učešće u svakom štetnom događaju. Ovaj iznos se odbija od ukupne naknade koju osiguravajuća kompanija plaća osiguraniku u slučaju štete.<br /><br />Evo kako funkcioniše franšiza:<br /><br />Ako je iznos štete manji od franšize: U tom slučaju, osiguranik neće dobiti nikakvu naknadu iz osiguranja jer šteta ne premašuje iznos franšize. Osiguranik snosi troškove popravke ili zamene oštećene imovine.<br /><br />Ako je iznos štete veći od franšize: Kada je iznos štete veći od franšize, osiguranik će dobiti naknadu od osiguravajuće kompanije, ali će iznos naknade biti umanjen za iznos franšize. Na primer, ako je iznos štete 10.000 dolara, a franšiza iznosi 1.000 dolara, osiguranik će dobiti naknadu od 9.000 dolara (10.000 dolara štete minus 1.000 dolara franšize).<br /><br />Franšiza se često koristi kako bi se osiguravajuće kompanije zaštitile od manjih zahteva za naknadu štete koji bi mogli biti skupi za procesuiranje. Takođe, osiguranici mogu odabrati višu franšizu kako bi smanjili premiju osiguranja, ali bi u tom slučaju morali da snose veći deo troškova u slučaju štete.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 7,
    question: 'Ko može ugovoriti osiguranje imovine?',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 8,
    question: 'Načelo obeštećenja',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 9,
    question: 'Vinkulacija u korist banke?',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 10,
    question: 'Da li postoji ograničenje broja prijavljenih šteta?',
    answer:
      'Da, mnoge polise putnog osiguranja pokrivaju gubitak, krađu ili oštećenje prtljaga. Osiguranje može nadoknaditi troškove za zamenu izgubljenih stvari ili pokriti troškove za nabavku osnovnih potrepština dok čekate povratak prtljaga.',
    show: '',
    collapsed: 'collapsed',
  },
];

const Domacinstvo = () => {
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
                <h2>Osiguranje domaćinstva</h2>
                <p>Osiguranje domaćinstva štiti Vaš dom od požara, poplava, krađe, odgovornosti i drugih rizika, , pokrivajući troškove popravke i drugo.</p>
              </div>
            </div>
          </div>
        </section>
        <section className="container pb-0" data-aos="fade-up">
          <p>
            Imovina, bilo da je privatna (kuće, stanovi), poslovna (poslovni prostor, zalihe, oprema), izloženi su velikom broju rizika. Ukoliko bi nešto od pobrojanih bilo ugroženo, može da izazove
            ozbiljne direktne ili indirektne finansijske gubitke i ugroziti opstanak porodice/firme.
            <br />
            Da li je potebno da taj rizik preuzimate na sebe?
            <br />
            Osiguravajuće kuće se bave preuzimanjem rizika za ovakve situacije, te je najsvrsishodnije i najbolje taj rizik prepustiti profesionalcima-osiguavajuj kući. Na taj način bi se odgovorno
            ponašali prema imovini.
            <br />
            Neki od rizika za koje je moguće ugovoritu osiguranje imovine :
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
          <p>
            Prepuštanjem rizika na osiguravajuću kuću – osiguranjem, Vi ćete platiti određenu premiju, a za uzvrat ćete dobiti mogućnost da potencijalno velike i neočekivane troškove štete naplatite
            kod te osiguravajuće kuće.
          </p>

          <br />
          <br />

          <h2 className="pb-4">Polisa za Osiguranje od odgovornosti</h2>
          <p>
            Sve što radite, ili ste propustili da uradite, predstavlja potencijalni izvor opasnosti za treća lica i njihovu imovinu. Da li Vam je potrebno osiguranje od odgovornosti?
            <br />
            Može se ugovoriti osiguranje svoje odgovornosti iz svakodnevnog života (kao nosilac domaćinstva, vlasnik kuće ili stana). Takođe, ukoliko su Vaši radnici ili mašina odgovorni za povredu,
            oštetili ili uništili imovinu trećem licu, možete biti odgovorni ukoliko postoji Vaša krivica za nastalu štetu.
            <br />
            Šteta koju ste načinili može da bude baš velika. Te otuda odštetni zahtevi koja treća lica mogu postaviti prema Vama mogu biti izuzetno veliki.
            <br />
            Pored isplate odštete trećim licima u slučaju opravdanog zahteva za naknadu štete društvo za osiguranje pruža Vam kompletnu pravnu zaštitu za:
          </p>
          <ul>
            <li>utvrđivanje odgovornosti Osiguranika za nastalu štetu</li>
            <li>vođenje spora u ime Osiguranika</li>
          </ul>
          <p>
            Sudska praksa je obično na strani slabijeg i neće se dvoumiti u pogledu Vaše odgovornosti kada je reč o telesnim povredama trećih lica, raznih kategorija. Čak i kada ništa niste učinili,
            možete biti odgovorni, jer ste, npr trebali da učinite i na taj način ste stvorili izvor opasnosti koji nekome može naneti štetu.
          </p>
          <p>
            <b>Koje vrste osiguranja od odgovornosti postoje?</b>
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
          <p>
            <b>Zašto osigurati odgovornost?</b>
          </p>
          <p>Ma koliko god se trudili, ne možemo uvek predvidi šta se sve može dogoditi… Budite odgovorni i ugovorite polisu osiguranja od odgovornosti.</p>
        </section>
      </main>

      <ContactForm />

      <FAQ data={faq} />
    </Fragment>
  );
};

export default Domacinstvo;
