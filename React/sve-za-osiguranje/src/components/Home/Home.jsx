import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import Header from '../Header/Header';
import Footer from '../Footer/Footer';
import ContactForm from '../ContactForm/ContactForm';

import CallUs from '../UI/CallUs';
import ViberUs from '../UI/ViberUs';
import WhatsApp from '../UI/WhatsApp';
import SocialIcons from '../UI/SocialIcons';
import ToTop from '../UI/ToTop';

import classes from './Home.module.css';

import heroImage from '../../assets/hero-women-accountant.jpg';
import slika1 from '../../assets/slika1-800x800.jpg';
import slika2 from '../../assets/about-who-we-are.jpg';
import slika3 from '../../assets/slika3-400x400.jpg';
import slika4 from '../../assets/putno3-600x600.jpg';

const Home = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--hero-color" backgroundColorScroll="--white-color" />

      <div style={{ overflowX: 'hidden' }}>
        <section className={classes.hero}>
          <div className={classes['hero-content']}>
            <h1 className={classes['hero-content-title']}>Sve za osiguranje</h1>
            {/* <p className={classes['hero-content-text']}>
              Sve POLISE i ŠTETE u osiguranju, kod svih osiguravajućih kuća.
              <br />
              <br />
              Uporedite cene osiguranja kod svih osiguravajućih kuća, naplatite štetu iz osiguranja.
            </p> */}
            <p className={classes['hero-content-text']}>
              <b>11 ponuda</b> za osiguranje, bez “sitnih slova”!
              <br />
              <b>Potpuno besplatne ponude</b>, jer nas plaća osiguravajuća kuća kojoj donesemo posao.
              <br />
              <b>Uporedite cene</b> i dogovorite za sebe <b>polisu</b> osiguranja.
            </p>
            <a className={classes['hero-content-contact']} href="#contact-form">
              Kontaktirajte nas odmah
            </a>
          </div>
          <div className={classes['hero-image']}>
            <img src={heroImage} alt="heroImage" />
          </div>
        </section>
        <main className={classes.main}>
          <div className={classes.info1}>
            <h1 className={classes['title']}>Sve što Vam treba za osiguranje na jednom mestu</h1>
            <div className={classes['content']}>
              <h2 className={classes['content-title']}>POTPUNO BESPLATNO</h2>
              <p className={classes['text']}>
                Putem našeg portala ćete dobiti korisne savete o osiguranju, ponude za osiguranje, pomoć pri šteti, razno vezano za osiguranje (polise, sve osiguravajuće kuće, štete)
              </p>
              <a className={classes['contact']} href="#contact-form">
                Kontaktirajte nas odmah
              </a>
            </div>
          </div>
          <div className={classes.info2}>
            <div className={classes['image']}>
              <img src={slika1} alt="slika1" />
            </div>
            <div className={classes['content']}>
              <h1 className={classes['content-title']}>Odaberite najbolje ponude za osiguranje, rešite štetu koju imate.</h1>
              <p className={classes['content-text']}>Profesionalno i odgovorno ćemo Vam pomoći oko odabira najbolje ponude za Vaše osiguranje, kao i ako imate štetu, tu smo za Vas.</p>
              <p className={classes['content-free']}>
                <i className="fa-regular fa-square-check"></i>Besplatan savet
              </p>
            </div>
          </div>
          <div className={classes.info3}>
            <div className={classes.content}>
              <h1 className={classes['content-title']}>Zašto je osiguranje potrebno?</h1>
              <p className={classes['content-text']}>
                <b>Osiguranje je potreba za Vas i Vašu porodicu, za Vaš biznis i drugo.</b> Osiguranje je zaštita Vašeg života, Vaše imovine. Putem osiguranja Vi upravljate rizicima. Kupovinom polise
                osiguranja, Vi prenosite potencijalni, budući i od Vaše volje nezavistan rizik na osiguravajuću kuću, za šta Vi plaćate premiju, u zemenu za eventulnu štetu koju budete imali.
                Osiguranje je značano sa finansijskog stanovišta, jer time štitite svoju finansijsku sigurnost u momentima kada se najmanje nadate, kada se desi štetni događaj. Troškovi u tom momentu
                mogu da budu baš veliki. U tim momentima, osiguranje igra veliku, pa i glavnu ulogu, jer će nadoknaditi štetu koju ste imali, vratiće stvar u prvobitno stanje. Osiguranje je nastalo iz
                potrebe, ne iz nečijeg hira, jer se štetni događaji dešavaju. Zato, nemojte dozvoliti da Vas štetni događaj iznenadi, osigurajte se.
              </p>
            </div>
            <div className={classes.image}>
              <img src={slika2} alt="slika2" />
            </div>
          </div>
          <div className={classes.info4}>
            <div className={classes.wrapper}>
              <div className={classes.image}>
                <img src={slika3} alt="slika3" />
              </div>
              <div className={classes.content}>
                <h1 className={classes['content-title']}>Šta će se desiti ako nemate osiguranje?</h1>
                <p className={classes['content-text']}>
                  Biti neosiguran je velika kocka i može da donese velike posledice. Posledice prvenstveno Vama na štetu, a onda indirektno i Vašoj porodici. Moguće je da imate problem sa zakonom-da
                  platite kaznu, zbog nastale štete. Ali, ono što najgore može da Vam se desi, da sve to jako utiče na Vaše finansije, a najgori slučaj je kada utiče na vaše najmilije, na Vašu
                  porodicu. Vaša porodica postaje ranjiva, vaš biznis može da propadne zbog toga što nemate osiguranje. Sve se ovo može preduprediti polisom osiguranja.
                </p>
              </div>
            </div>
          </div>
          <div className={classes.info5}>
            <div className={classes.content}>
              <h1 className={classes['content-title']}>Postoje razne polise osiguranja:</h1>
              <ul className={classes['content-links']}>
                <li>
                  <Link to="/zivotno-osiguranje">Polisa za Životno Osiguranje</Link>
                </li>
                <li>
                  <Link to="/putno-osiguranje">Polisa za Putno osiguranje</Link>
                </li>
                <li>
                  <Link to="/kasko-osiguranje-vozila">Polisa za Kasko osiguranje</Link>
                </li>
                <li>
                  <Link to="/osiguranje-domacinstva">Polisa za Osiguranje imovine</Link>
                </li>
                <li>
                  <Link to="/dobrovoljno-zdravstveno-osiguranje">Polisa za Dobrovoljno Zdravstveno Osiguranje</Link>
                </li>
                <li>
                  <Link to="/osiguranje-od-nezgode">Polisa za Osiguranje od nezgode</Link>
                </li>
                <li>
                  <Link to="/autoodgovornost">Polisa za Osiguranje od odgovornosti</Link>
                </li>
              </ul>
            </div>
            <div className={classes.image}>
              <img src={slika4} alt="slika2" />
            </div>
          </div>
          <div className={classes.info6}>
            <h1 className={classes['info-title']}>Zašto da Vas mi savetujemo kako i gde da osigurate kasko za Vaše vozilo?</h1>
            <ol className={classes['info-list']}>
              <li>
                <b>Uštedećete novac</b> – jer mi znamo kako, na koji način, gde da najrentabilnije osigurate svoje vozilo
              </li>
              <li>
                <b>Uštedećete vreme</b> – na tržištu osiguranja posluje preko deset osiguravajućih kuća. Odlaskom u sve osiguavajuće kuće, izgubićete vreme. A vreme je novac.
              </li>
              <li>Bićete adekvatno obeštećeni kod štetnog događaja, jer ćete imati adkevatno pokriće na polisi i imaćete nas kao savetnika za prijavu i naplatu štete.</li>
              <li>
                <b>BESPLATAN SAVET</b> – potpuno besplatno, bez ikakvih skrivenih troškova je naša pomoć <b>MI ZASTUPAMO VAS I VAŠE INTERESE KOD OSIGURAVAJUĆIH KUĆA!</b>
              </li>

              <li>
                <b>Bez sitnih slova polisa</b> – mi ćemo Vam ih pročitati/protumačiti umesto Vas. Savetovaćemo Vas na koji deo Uslova da posebno obratite pažnju prilikom ugovaranja polise (najbitnije
                je dobro pročitati Isključenja na polisi!)
              </li>
              <li>
                <b>Štete</b> – ako imate štetu, mi ćemo Vam pomoći da taj događaj prevaziđete što lakše. U našem timu imamo i advokate, procenitelje šteta, sudske veštake…
              </li>
            </ol>
          </div>
          <div className={classes.info7}>
            <h1 className={classes['info-title']}>Iskustva korisnika</h1>
            <div className={classes.content}>
              <div className={classes['content-comment']}>
                <h2 className={classes.name}>Goran Malešević</h2>
                <p className={classes.comment}>
                  “Googlao sam po netu za kasko osiguranje. Izašao mi je sajt SVEZAOSIGURANJE i tu sam zavšrio sve na jednom mestu. Pomogli su mi toliko, da sam imao jednu obavezu manje. Pride, polisa
                  je baš po meri.”
                </p>
                <p className={classes.client}>
                  <b>Kasko osiguranje</b>, klijent Niš
                </p>
              </div>
              <div className={classes['content-comment']}>
                <h2 className={classes.name}>Stefan Kovačević</h2>
                <p className={classes.comment}>
                  “Trebalo mi je osiguranje za auto, pomoć na putu, te sam pretraživao na netu. Izašao mi je sajt SVEZAOSIGURANJE i tu sam sve završio. Imao sam više ponuđenih varijanti, uz njihov
                  savet, odabrao sam jednu. Odlični su.”
                </p>
                <p className={classes.client}>
                  <b>Kasko osiguranje</b>, klijent Beograd
                </p>
              </div>
              <div className={classes['content-comment']}>
                <h2 className={classes.name}>Darko Ilić</h2>
                <p className={classes.comment}>
                  “Želeo sam da osiguram kuću pred polazak na duži put, jer se dešavaju nesreće. Obratio sam se SVEZAOSIGURANJE i oni su me uputili u sve tajne za osiguranje, u sva sitna slova na
                  polisi i uslovima. Naravno, imali su najbolju preporuku za moje osiguranje, što sam i uradio.”
                </p>
                <p className={classes.client}>
                  <b>Osiguranje domaćinstva</b>, klijent Beograd
                </p>
              </div>
            </div>
          </div>
          <div id="contact-form"></div>

          <ContactForm />

          <SocialIcons />

          <WhatsApp />
          <ViberUs />
          <CallUs />

          <ToTop />
        </main>
      </div>
      <Footer />
    </Fragment>
  );
};

export default Home;
