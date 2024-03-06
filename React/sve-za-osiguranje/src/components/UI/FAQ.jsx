import { useState } from 'react';

import classes from './FAQ.module.css';

const FAQ = () => {
  // Q&A
  const [question1, setQuestion1] = useState(false);
  const [question2, setQuestion2] = useState(false);
  const [question3, setQuestion3] = useState(false);
  const [question4, setQuestion4] = useState(false);
  const [question5, setQuestion5] = useState(false);
  const [question6, setQuestion6] = useState(false);
  const [question7, setQuestion7] = useState(false);
  const [question8, setQuestion8] = useState(false);
  const [question9, setQuestion9] = useState(false);
  const [question10, setQuestion10] = useState(false);

  // handle question 1
  const handleQuestion1 = () => {
    setQuestion1((current) => !current);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 2
  const handleQuestion2 = () => {
    setQuestion1(false);
    setQuestion2((current) => !current);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 3
  const handleQuestion3 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3((current) => !current);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 4
  const handleQuestion4 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4((current) => !current);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 5
  const handleQuestion5 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5((current) => !current);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 6
  const handleQuestion6 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6((current) => !current);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 7
  const handleQuestion7 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7((current) => !current);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 8
  const handleQuestion8 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8((current) => !current);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 9
  const handleQuestion9 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9((current) => !current);
    setQuestion10(false);
  };

  // handle question 10
  const handleQuestion10 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10((current) => !current);
  };

  return (
    <ul className={classes.list}>
      <li className={classes.question} onClick={handleQuestion1}>
        Kako se osigurava imovina? <i style={question1 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question1 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Imovina se osigurava na vrednost same imovine. Ne osnovu vrednosti se određuje i premija osiguranja - cena.
        <br />
        Obično se osiguranje radi na 2 načina:
        <ul>
          <li>osiguranje na sumu osiguranja sa primenom načela podosiguranja, i</li>
          <li>osiguranje na „prvi rizik“</li>
        </ul>
        Svaki od načina ima svoje prednosti.
      </li>

      <li className={classes.question} onClick={handleQuestion2}>
        Šta znači osiguranje na sumu osiguranja? <i style={question2 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question2 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Osiguranje imovine na određenu sumu osiguranja znači da osiguranik plaća premiju osiguranja kako bi osigurao imovinu do određenog iznosa, koji je naznačen kao suma osiguranja. Međutim, odnos
        između sume osiguranja i stvarne vrednosti imovine igra ključnu ulogu u određivanju naknade štete u slučaju gubitka ili oštećenja imovine.
        <br />
        <br />
        Evo kako to funkcioniše:
        <br />
        <br />
        Kada je suma osiguranja jednaka stvarnoj vrednosti osiguranog predmeta: U ovom slučaju, ako dođe do gubitka ili oštećenja imovine, osiguranik će dobiti naknadu štete u iznosu koji odgovara
        stvarnoj šteti ili gubitku.
        <br />
        <br />
        Kada je suma osiguranja niža od stvarne vrednosti osiguranog predmeta (podosiguranje): U situaciji kada je suma osiguranja manja od stvarne vrednosti imovine, osiguranik se suočava s
        podosiguranjem. To znači da osiguranik nije potpuno pokrio vrednost imovine. U slučaju štete, osiguranik će biti nadoknađen samo proporcionalno iznosu pokrivenosti, odnosno odnosu između sume
        osiguranja i stvarne vrednosti imovine. Na primer, ako je imovina vredna 100.000 dolara, a suma osiguranja je 50.000 dolara, osiguranik će biti pokriven samo za 50% štete.
        <br />
        <br />
        Suma osiguranja je maksimalni iznos koji osiguravajuća kompanija može platiti u slučaju štete ili gubitka. To je ograničenje pokrića koje osiguranik ima prema polisi osiguranja.
        <br />
        <br />
        Ukratko, suma osiguranja treba da odražava stvarnu vrednost imovine kako bi osiguranik bio adekvatno zaštićen u slučaju gubitka ili oštećenja. Podosiguranje može dovesti do nepotpunog pokrića
        i finansijskih gubitaka za osiguranika u slučaju štete.
      </li>

      <li className={classes.question} onClick={handleQuestion3}>
        Šta je podosiguranje? <i style={question3 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question3 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Podosiguranje se dešava kada je suma osiguranja manja od stvarne vrednosti osiguranog predmeta u trenutku kada se desi osigurani događaj, kao što je gubitak ili oštećenje imovine. To znači da
        osiguranik nije potpuno pokrio vrednost svoje imovine sa odgovarajućom sumom osiguranja, što može dovesti do problema prilikom naknade štete u slučaju osiguranog događaja.
        <br />
        <br />
        U situaciji podosiguranja, osiguranik može biti isplaćen samo proporcionalno iznosu pokrića, odnosno u skladu sa odnosom između sume osiguranja i stvarne vrednosti imovine. Ovaj princip
        proporcionalnosti primenjuje se kako bi se osigurao fer odnos između premije koju plaća osiguranik i iznosa koji će biti isplaćen u slučaju štete.
        <br />
        <br />
        Evo koraka koji su primenjeni u primeru:
        <br />
        <br />
        <ul>
          <li>Suma osiguranja: 750.000 dinara</li>
          <li>Stvarna vrednost osiguranog predmeta: 1.000.000 dinara</li>
          <li>Procenjena šteta: 600.000 dinara</li>
        </ul>
        <br />
        Pravilo proporcije naknade štete u ovom slučaju kaže da osiguraniku treba nadoknaditi deo štete proporcionalno odnosu između sume osiguranja i stvarne vrednosti imovine.
        <br />
        <br />
        Primena formule za izračun naknade štete u ovom primeru bila bi:
        <br />
        <br />
        NAKNADA ŠTETE = SUMA OSIGURANJA x IZNOS PROCENJENE ŠTETE / STVARNA VREDNOST
        <br />
        <br />
        Zamena vrednosti iz primera:
        <br />
        <br />
        NAKNADA ŠTETE = 750.000 dinara x 600.000 dinara / 1.000.000 dinara
        <br /> NAKNADA ŠTETE = 450.000 dinara
        <br />
        <br />
        Dakle, osiguraniku će biti isplaćeno 450.000 dinara, što predstavlja 75% od procenjene štete od 600.000 dinara. Ostatak štete, u ovom slučaju 150.000 dinara, ide na teret osiguranika zbog
        podosiguranja.
        <br />
        <br />
        Ovo pokazuje kako podosiguranje može značajno uticati na iznos naknade štete koju osiguranik prima u slučaju gubitka ili oštećenja imovine.
      </li>

      <li className={classes.question} onClick={handleQuestion4}>
        Šta znači osiguranje na ,,prvi rizik”? <i style={question4 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question4 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Osiguranje na &quot;prvi rizik&quot; je pristup koji omogućava osiguraniku da odabere pokriće za određene rizike sa limitiranim iznosom pokrića, koji može biti manji od ukupne vrednosti
        osigurane imovine. Ovaj pristup se često koristi za specifične situacije ili rizike gde se očekuje da će šteta biti ograničena na određene delove imovine.
        <br />
        <br />
        Na primer, ako osiguranik živi u području gde su poplave česte, ali je verovatno da će poplava uticati samo na podrumske prostorije i prizemlje, osiguranje na &quot;prvi rizik&quot; omogućava
        da se pokriće ograniči na te delove imovine.
        <br />
        <br />
        Prednost ovog pristupa je ušteda u premiji, jer osiguranik plaća premiju samo za pokriće koje je specifično odabrano za određeni rizik i sa određenim limitom pokrića. Osim toga, ovaj pristup
        ne primenjuje načelo podosiguranja, što znači da osiguravajuća kompanija plaća naknadu štete do iznosa ugovorene sume na &quot;prvi rizik&quot;, bez obzira na stvarnu vrednost štete.
        <br />
        <br />
        Važno je da osiguranik pažljivo proceni potencijalne rizike i moguću štetu prilikom odabira sume osiguranja na &quot;prvi rizik&quot;. Ovo osiguranje se često koristi za specifične situacije
        gde je verovatnoća nastanka štete ograničena na određene delove imovine ili događaje.
      </li>

      <li className={classes.question} onClick={handleQuestion5}>
        Kako se određuje vrednost sume osiguranja za osiguranja nekretnina?{' '}
        <i style={question5 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question5 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Procena sume osiguranja za nekretninu obično se vrši na osnovu građevinske vrednosti nekretnine. Građevinska vrednost obuhvata troškove obnove ili rekonstrukcije nekretnine u slučaju štetnog
        događaja, kao što su požar, poplava, ili drugi rizici koji mogu oštetiti ili uništiti nekretninu.
        <br />
        <br />
        Evo nekoliko koraka koji se obično primenjuju pri određivanju sume osiguranja za nekretninu:
        <br />
        <br />
        1. **Procena građevinske vrednosti:** Građevinska vrednost se određuje na osnovu troškova obnove ili rekonstrukcije nekretnine. To uključuje troškove materijala, radne snage, građevinskih
        dozvola i drugih faktora koji su neophodni za vraćanje nekretnine u prvobitno stanje.
        <br />
        <br />
        2. **Procena zamene:** Ova procena obično uključuje troškove zamene ili rekonstrukcije slične nekretnine u istoj lokaciji i sa sličnim karakteristikama.
        <br />
        <br />
        3. **Uzimanje u obzir dodatnih troškova:** Pored troškova obnove ili rekonstrukcije, može biti potrebno uzeti u obzir i dodatne troškove kao što su troškovi privremenog smeštaja, troškovi
        rušenja oštećenih delova, i slično.
        <br />
        <br />
        4. **Konsultacija sa stručnjacima:** Za preciznu procenu građevinske vrednosti i određivanje odgovarajuće sume osiguranja, preporučljivo je konsultovati se sa stručnjacima, kao što su
        procenitelji nekretnina, građevinski inženjeri ili arhitekte.
        <br />
        <br />
        Nakon procene, osiguranik može odabrati odgovarajuću sumu osiguranja koja bi bila dovoljna za pokriće troškova obnove ili rekonstrukcije nekretnine u slučaju štetnog događaja. Ovo je ključno
        kako bi osiguranik bio adekvatno zaštićen i kako bi se sprečile finansijske teškoće u slučaju oštećenja ili uništenja nekretnine.
      </li>

      <li className={classes.question} onClick={handleQuestion6}>
        Šta je franšiza? <i style={question6 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question6 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Franšiza predstavlja iznos koji osiguranik plaća kao učešće u svakom štetnom događaju. Ovaj iznos se odbija od ukupne naknade koju osiguravajuća kompanija plaća osiguraniku u slučaju štete.
        <br />
        <br />
        Evo kako funkcioniše franšiza:
        <br />
        <br />
        Ako je iznos štete manji od franšize: U tom slučaju, osiguranik neće dobiti nikakvu naknadu iz osiguranja jer šteta ne premašuje iznos franšize. Osiguranik snosi troškove popravke ili zamene
        oštećene imovine.
        <br />
        <br />
        Ako je iznos štete veći od franšize: Kada je iznos štete veći od franšize, osiguranik će dobiti naknadu od osiguravajuće kompanije, ali će iznos naknade biti umanjen za iznos franšize. Na
        primer, ako je iznos štete 10.000 dolara, a franšiza iznosi 1.000 dolara, osiguranik će dobiti naknadu od 9.000 dolara (10.000 dolara štete minus 1.000 dolara franšize).
        <br />
        <br />
        Franšiza se često koristi kako bi se osiguravajuće kompanije zaštitile od manjih zahteva za naknadu štete koji bi mogli biti skupi za procesuiranje. Takođe, osiguranici mogu odabrati višu
        franšizu kako bi smanjili premiju osiguranja, ali bi u tom slučaju morali da snose veći deo troškova u slučaju štete.
      </li>

      <li className={classes.question} onClick={handleQuestion7}>
        Ko može ugovoriti osiguranje imovine? <i style={question7 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question7 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Osiguranje imovine može ugovoriti fizičko ili pravno lice koje ima interese zaštite imovine od različitih rizika. Evo nekoliko primera ko ko može ugovoriti osiguranje imovine: <br />
        <br />
        1. **Fizička lica**: Svako fizičko lice koje poseduje imovinu, kao što su kuće, stanovi, automobili, nakit ili druga vredna imovina, može ugovoriti osiguranje kako bi zaštitilo tu imovinu od
        rizika kao što su požari, krađe, ili oštećenja usled prirodnih katastrofa. <br />
        <br />
        2. **Pravna lica**: Pravna lica, uključujući preduzeća, firme, udruženja ili organizacije, takođe mogu ugovoriti osiguranje imovine. To može uključivati osiguranje poslovnih prostora,
        inventara, vozila ili drugih sredstava koja su neophodna za poslovanje. <br />
        <br />
        3. **Vlasnici nepokretne imovine**: Vlasnici kuća, stanova, poslovnih prostora ili zemljišta često ugovaraju osiguranje kako bi zaštitili svoju imovinu od štetnih događaja. <br />
        <br />
        4. **Finansijske institucije**: Finansijske institucije, kao što su banke, mogu ugovoriti osiguranje na imovinu koja je deo njihovih operacija, kao što su zgrade, oprema ili vozni park. <br />
        <br />
        5. **Stanodavci**: Vlasnici iznajmljenih stanova ili poslovnih prostora često ugovaraju osiguranje kako bi zaštitili svoju imovinu od oštećenja ili gubitka uzrokovanog od strane stanara.{' '}
        <br />
        <br />
        Ukratko, bilo ko ko poseduje imovinu ili ima interese zaštite od određenih rizika može ugovoriti osiguranje imovine kako bi se zaštitio od finansijskih gubitaka uzrokovanih štetnim događajima.
      </li>

      <li className={classes.question} onClick={handleQuestion8}>
        Načelo obeštećenja <i style={question8 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question8 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Načelo obeštećenja je osnovno načelo osiguranja koje se odnosi na osiguravajuću obavezu da nadoknadi štetu osiguraniku u skladu sa uslovima ugovora o osiguranju.
        <br />
        <br />
        Ovo načelo podrazumeva da osiguranik treba da bude finansijski nadoknađen za štetu koju pretrpi usled događaja pokrivenog polisom osiguranja. Obeštećenje treba da bude dovoljno da osiguranik
        vrati svoju imovinu u stanje u kojem je bila pre štetnog događaja.
        <br />
        <br />
        Ključni aspekti načela obeštećenja uključuju:
        <br />
        <br />
        1. **Cilj nadoknade**: Glavni cilj je da se osiguranik stavi u isti finansijski položaj u kojem bi bio da nije bilo štetnog događaja. Ovo može uključivati popravku ili zamenu oštećene imovine,
        ili isplatu novčane nadoknade.
        <br />
        <br />
        2. **Procena štete**: Obeštećenje se zasniva na realnoj proceni štete koju je pretrpeo osiguranik. Ovo može uključivati procenu vrednosti imovine pre i posle štetnog događaja, kao i troškove
        popravke ili zamene.
        <br />
        <br />
        3. **Primena uslova polise**: Obeštećenje se isplaćuje u skladu sa uslovima polise osiguranja, uključujući iznos pokrića, franšizu, i druge relevantne odredbe.
        <br />
        <br />
        4. **Isplata u razumnom roku**: Osiguravajuća kompanija treba da obezbedi isplatu obeštećenja u razumnom roku nakon što je štetni događaj prijavljen i šteta procenjena.
        <br />
        <br />
        Načelo obeštećenja je ključno za funkcionisanje sistema osiguranja i pruža osiguranicima sigurnost da će biti zaštićeni od finansijskih gubitaka uzrokovanih štetnim događajima.
      </li>

      <li className={classes.question} onClick={handleQuestion9}>
        Vinkulacija u korist banke? <i style={question9 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question9 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Vinkulacija u korist banke je pravna procedura koja se koristi u osiguranju kako bi se obezbedila sigurnost ili garancija za zajmove ili kredite koje je osiguranik uzeo od banke.
        <br />
        <br />
        Kada se osiguranje vinkulira u korist banke, osiguravajuća polisa se koristi kao garancija za zajam ili kredit koji je osiguranik dobio od banke. To znači da banka ima pravo da bude primaoc
        isplate od osiguravajuće kompanije u slučaju nastanka osiguranog događaja, umesto osiguranika.
        <br />
        <br />
        Evo nekoliko ključnih pojmova vezanih za vinkulaciju u korist banke:
        <br />
        <br />
        1. **Osiguranik**: Osoba koja je ugovorila osiguranje i koja ima polisu osiguranja na svoje ime.
        <br />
        <br />
        2. **Banka**: Finansijska institucija koja daje zajmove ili kredite osiguraniku.
        <br />
        <br />
        3. **Osiguravajuća kompanija**: Kompanija koja pruža osiguranje i isplaćuje naknadu u slučaju nastanka osiguranog događaja.
        <br />
        <br />
        4. **Vinkulacija**: Pravna procedura kojom se osiguranje povezuje sa bankarskim kreditom ili zajmom.
        <br />
        <br />
        5. **Korisnik kredita**: Osiguranik koji je uzeo zajam ili kredit od banke.
        <br />
        <br />
        Vinkulacija u korist banke pruža bankama dodatnu sigurnost prilikom odobravanja kredita ili zajmova, jer im omogućava da imaju pravo na isplatu iz osiguranja u slučaju da korisnik kredita ne
        bude u mogućnosti da izmiri svoje obaveze. Ova praksa često se koristi u hipotekarnim kreditima ili drugim vrstama kredita gde je imovina osigurana.
      </li>

      <li className={classes.question} onClick={handleQuestion10}>
        Da li postoji ograničenje broja prijavljenih šteta? <i style={question10 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question10 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Osiguravajuće kompanije obično imaju određene uslove i ograničenja u vezi sa brojem prijavljenih šteta u određenom vremenskom periodu. Ova ograničenja su uvedena kako bi se sprečile
        zloupotrebe ili preterana upotreba polisa osiguranja.
        <br />
        <br />
        Evo nekoliko mogućih ograničenja koja osiguravajuće kompanije mogu primeniti:
        <br />
        <br />
        1. **Godišnje ograničenje**: Osiguravajuća kompanija može postaviti ograničenje na broj prijavljenih šteta u toku jedne godine. Na primer, osiguranik može imati pravo na samo dve ili tri
        prijavljene štete u toku jedne godine.
        <br />
        <br />
        2. **Ograničenje po polisi**: Svaka polisa osiguranja može imati ograničenje u vezi sa brojem prijavljenih šteta. Ovo ograničenje može biti specificirano u uslovima polise.
        <br />
        <br />
        3. **Ograničenje po vrsti štete**: Osim ograničenja u broju prijavljenih šteta, osiguravajuća kompanija može postaviti ograničenja u vezi sa vrstom štete koja se može prijaviti u određenom
        vremenskom periodu.
        <br />
        <br />
        4. **Ograničenje u isplati**: Čak i ako osiguravajuća kompanija prihvati prijavljenu štetu, postoji
        <br />
        <br />
        mogućnost da postoji ograničenje u iznosu isplate koji će biti izvršen po toj šteti. 5. **Ograničenje na osnovu istorije šteta**: Ograničenja se takođe mogu primeniti na osnovu istorije
        prethodno prijavljenih šteta ili ponašanja osiguranika.
        <br />
        <br />
        Ova ograničenja mogu varirati u zavisnosti od politike i pravila svake osiguravajuće kompanije, kao i vrste polise osiguranja. Ograničenja su obično deo uslova polise osiguranja i važno je da
        osiguranik pažljivo pročita uslove polise kako bi razumeo svoja prava i obaveze.
      </li>
    </ul>
  );
};

export default FAQ;
