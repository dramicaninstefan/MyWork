import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';
import WhatsApp from '../../../UI/WhatsApp';
import SocialIcons from '../../../UI/SocialIcons';
import ToTop from '../../../UI/ToTop';

import classes from './KaskoOsiguranje.module.css';

import slika1 from '../../../../assets/kasko-osiguranje-400x390.jpg';
import slika2 from '../../../../assets/autodogovornost-600x586.jpg';

const KaskoOsiguranje = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            {/* <h2 className={classes['content-small-title']}>Kasko osiguranje vozila</h2> */}
            <h1 className={classes['content-title']}>Kasko osiguranje</h1>
            <p className={classes['content-text']}>
              Kasko osiguranje je najsigurniji način da zaštite vaše vozilo, usled saobraćajnih nezgoda, krađe, požara i mnogo drugih rizika koje pokriva kasko polisa. Vaše vozilo je osigurano non
              stop, i tokom vožnje i na parkingu, svuda. Ako nemate vremena da se bavite ugovaranjem osiguranja, ili pak niste sigurni u svoje znanje na temu kasko osiguranja, na pravom ste mestu, gde
              Vam višedecenijski profesionalni savetnik može pomoći. Pomoćićemo Vam da odabereta najbolju ponudu za Vas, vaše vozilo, sa maksimalni popustima koji se primenjuju u osiguravajućoj kući.
              <br />
              <br />
              <b>Preko 25 ponuda</b> za kasko osiguranje, od <b>11 osiguravajućih kuća</b>, i to bez “sitnih slova”!
              <br />
              <b>Potpuno besplatne ponude</b>, jer nas plaća osiguravajuća kuća kojoj donesemo posao.
              <br />
              <b>Uporedite cene</b> i dogovorite za sebe <b>polisu</b> kasko osiguranja.
            </p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div className={classes.info4}>
          <h2 className={classes.title}>
            Da bi ste dobili preko 25 ponuda, od 11 osiguravajućih kuća, <b>potrebno je sledeće</b>:
          </h2>
          <br />
          <p className={classes.text}>
            <br />
            1. <b>Podaci o vozilu</b> – zbog određivanja kataloške vrednosti vozila –pokrića polise,
            <br />
            2. <b>Podaci o vlasniku</b> – zbog provere vlasnika u bazi osiguravajuće kuće (da li je ili nije naplaćivao štete) i najbitnije
            <br />
            3. <b>Trenutna tržišna vrednost</b> (faktura ili oglas sličnog vozila sa cenom na tržištu)
            <br />
            <br />
            <b>Ako Vam se i desi šteta</b>, na Vašoj smo strani! Mi ćemo Vam sve organizovati, da što bolje prođete u realizaciji naplate!
            <br />
            <br />
            Možemo Vam obezbediti preko 25 ponuda za kasko osiguranje, od 11 osiguravajućih kuća, i to bez “sitnih slova”, sa adekvatnim pokrićem za slučaj štete!
            <br />
            <br />
            Potpuno BESPLATNE su ponude, jer nas plaća osiguravajuća kuća kojoj donesemo posao. Cena-premija je minimum ista kao da ste išli direktno u osiguravajuće kuće, a obično je i niža…, samo
            što ste sa naše strane dobili sve na jednom mestu i niste morali da trošite Vaše vreme, a i živce. Dobićete sa naše strane preporuku za najbolju ponudu, konačna odluka je Vaša. Na Vašoj
            smo strani!!!
          </p>
          <br />
        </div>

        {/* <div className={classes.info2}>
          <div className={classes.content}>
            <h3 className={classes['content-title']}>
              <i className="fa-solid fa-shield"></i> Kasko osiguranje
            </h3>
            <p className={classes['content-text']}>
              Kasko osiguranje je najsigurniji način da zaštite vaše vozilo, usled saobraćajnih nezgoda, krađe, požara i mnogo drugih rizika koje pokriva kasko polisa. Vaše vozilo je osigurano non
              stop, i tokom vožnje i na parkingu, svuda. Ako nemate vremena da se bavite ugovaranjem osiguranja, ili pak niste sigurni u svoje znanje na temu kasko osiguranja, na pravom ste mestu, gde
              Vam višedecenijski profesionalni savetnik može pomoći. Pomoćićemo Vam da odabereta najbolju ponudu za Vas, vaše vozilo, sa maksimalni popustima koji se primenjuju u osiguravajućoj kući.
            </p>
          </div>
        </div> */}

        <div className={classes.info4}>
          <h2 className={classes.title}> Nekoliko razloga zašto biste mogli dogovoriti kasko osiguranje preko nas:</h2>
          <br />
          <p className={classes.text}>
            1. <b>Pouzdanost i sigurnost:</b> Kada osiguravate svoje vozilo pomoću nas, možete imati poverenje u našu reputaciju i pouzdanost. Garantujemo da ćemo biti tu za Vas i u slučaju bilo
            kakvih potreba za naknadnom (štetom) ili pomoći.
            <br />
            <br />
            2. <b>Širok raspon pokrića:</b> Naše kasko osiguranje može pokrivati razne vrste šteta, uključujući sudare, krađe, požare, poplave i druge nezgode. Pružamo širok raspon pokrića kako bi smo
            Vam omogućili miran san, znajući da je Vaše vozilo osigurano.
            <br />
            <br />
            3. <b>Prilagođene opcije osiguranja:</b> Razumemo da svaki vlasnik ima svoje jedinstvene potrebe i proračun. Stoga nudimo prilagođene opcije osiguranja, koje odgovaraju Vašim zahtevima i
            budžetu.
            <br />
            <br />
            5. <b>Konkurentne cene:</b> Nudimo konkurentne cene kasko osiguranja koje su prilagođene Vašim potrebama. Trudimo se pružiti odgovarajuće pokriće po razumnoj ceni-premiji.
            <br />
            <br />
            4. <b>Brza i jednostavna obrada šteta:</b> U slučaju štete na vozilu, naš tim stručnjaka osigurava brzu i jednostavnu obradu zahteva. Naš cilje je da Vam minimiziramo neugodnost i
            osiguramo da brzo vratiti vozilo u vozno stanje.
            <br />
            <br />
            6. <b>Profesionalna podrška i usluga za korisnike:</b> Naš tim stručnjaka za osiguranje uvek je tu da odgovori na Vaša pitanja i pruži Vam podršku koja Vam je potrebna. Vaše zadovoljstvo
            našim uslugama prioritet je za nas.
            <br />
            <br />
            Sve u svemu, dogovaranje kasko osiguranja preko nas može Vam pružiti mir uma i zaštitu koja je važna za Vaše vozilo i Vas kao vozača.
          </p>
          <br />
        </div>

        <div className={classes.info3}>
          <div className={classes['image']}>
            <img src={slika2} alt="slika2" />
          </div>
          <div className={classes['content']}>
            {/* <h2 className={classes['content-small-title']}>Osiguranje vozila</h2> */}
            <h1 className={classes['content-title']}>Šta je kasko osiguranje vozila i zašto da odaberete ovo osiguranje za svoje vozilo?</h1>
            <p className={classes['content-text']}>
              Kasko polisa Vam pruža pokriće bez obzira na krivca i načina na koji je došlo do oštećenja (delimičnog ili totalno) ili krađe vozila. Naravno, sve sa Vaše strane mora biti u skladu sa
              saobraćajnim propisima i zakonom u saobraćaju.
            </p>
          </div>
        </div>

        <div className={classes.info4}>
          <p className={classes.text}>
            Najbolja kasko polisa je ona polisa, koja pruža adekvatno pokriće za vozilo, uz naravno, adekvatnu premiju. Ovo dobijate poređem ponuda, koje se sastaje iz tih parametara i još nekih.
            <br />
            <br />
            Dosta ljudi meša polise obaveznog osiguranja od autoodgovornosti (AO) i kasko osiguranje. Ovo prvo je obavezno osiguranje kada registrujemo vozilo, dok ovo drugo-kasko osiguranje nije
            obavezno osiguranje.
            <br />
            AO isplaćuje štete koje Vi, Vašim vozilom napravite u saobraćaju nekom vozilu i licima. Pokriće AO polise utvrđuje Vlada, na predlog Narodne banke Srbije i iznosi:
            <br />
            1. za štetu na licima, po jednom štetnom događaju, bez obzira na broj oštećenih lica 1.000.000 evra;
            <br />
            2. za štetu na stvarima, po jednom štetnom događaju, bez obzira na broj oštećenih lica 200.000 evra. Polisa obaveznog osiguranja od autoodgovornosti je vezana isključivo za vozilo, ne za
            vozača. Što znači da će svaka šteta koju vozilo napravi, bez obzira na to ko upravlja vozilom, biti plaćena preko ove polise.
            <br />
            Šta pokriva kasko osiguranje vozila?
            <br />
            Kasko pokriva tri načina osiguranja vozila:
          </p>
          <br />

          <ol>
            <li>Osnovno kasko osiguranje</li>
            <li>Dopunsko kasko osiguranje</li>
            <li>Delimično kasko osiguranje</li>
          </ol>

          <h2 className={classes.title}>Osnovno kasko osiguranje</h2>

          <ul>
            <li>saobraćajne nezgode (sudara, udara, prevrnuća, iskliznuća…) bez obzira na krivicu osiguranika,</li>
            <li>pada ili udara nekog predmeta,</li>
            <li>požara,</li>
            <li>eksplozije</li>
            <li>iznenadnog termičkog ili hemijskog delovanja spolja,</li>
            <li>udara groma,</li>
            <li>oluje,</li>
            <li>grada,</li>
            <li>snežne lavine,</li>
            <li>pada letelice,</li>
            <li>manifestacija i demonstracija,</li>
            <li>obesti trećih lica i drugih rizika,</li>
            <li>kao i štete na vozilu koje su neposredno prouzrokovane od divljači i domaćih životinja.</li>
          </ul>

          <h2 className={classes.title}>Dopunsko kasko osiguranje</h2>

          <p className={classes.text}>Ukoliko želite, Vaše vozilo dodatno možete da osigurate i od rizika krađe vozila i utaje. Kasko polisa se može ugovoriti i kao delimično osiguranje.</p>

          <h2 className={classes.title}>Delimično kasko osiguranje</h2>

          <p className={classes.text}>
            Za ovo osiguranje se odlučuju, uglavnom, vlasnici starijih vozila. Prvo iz razloga jer neke osiguravajuće kuće imaju gornju granicu starosti vozila koja hoće da kasko osiguraju. A i u
            nekim situacijama, isplati se delimično osiguranje. Bonus–malus sistem kod kasko osiguranja Ovaj sistem popusta na premiju je napavljen da stimuliše vozača-osiguranika, da bude odgovoran
            prema osiguranom vozilu, da ne pravi saobračajne nezgode, tj da ne prijavljuje štetu na vozilu, jer u tom slučaju svake godine stiče se pravo na popust na premiju. To znači, da će Vam
            premija, iz godine u godinu biti sve niža jer je vozilo niže vrednosti iz godine u godinu i na to Vam još sleduje bonus-popust. Popust može ići i do 50%. Međutim, i pored toga što ste
            savestan vozač, npr prirodne nepogode se ne mogu preduprediti svojim ponašanjem u saobraćaju i u tom slučaju, kasko osiguranje pruža zaštitu. Kasko osiguranje za pravna lica Pravna lica, u
            zavisnosti od broja vozila koja osiguravaju, stiču pravo na određene veće popuste na celu flotu, pa i do 20%.
          </p>
          <h2 className={classes.title}>Česta pitanja vezano za kasko osiguranje</h2>

          <p className={classes.text}>
            <b>Zašto bih kasko osigurao vozilo, kada se ne bojim krađe, jer imam određene oblike zaštite na vozilu?</b>
            <br />
            U redu, krađa je vrlo verovatno da se neće desiti, zbog postojanja oblika zaštite. Treba uzeti u obzir da je tehnologija napredovala u sferi oblika zaštite, ali i u sferi prevazilaženja
            tih istih oblika zaštite. Svakako, bez obzira na to što ste pažljiv vozač, u saobraćaju je mnogo nepažljivih, bahatih i drugih vozača, koji Vam mogu napraviti štetu na vozilu
            <br />
            <br />
            <b>
              Koliko često se dešavaju udesi na automobilima?
              <br /> Odgovor je: jako često.
            </b>
            <br />
            Neretko se desi da zateknemo svoje vozila na parkingu sa raznim oštećenjima, dali od drugog vozila ili nekog lica. U tom slučaju, ako nemam kasko polisu, štetu snosite sami, iz svog džepa.
            A ako imate polisu, prijavljujete štetu osiguravajućoj kući i oni plaćaju štetu.
            <br />
            <br />
            <b>Koliko se vozila ukrade godišnje u Srbiji?</b>
            <br /> U Srbiji se, u proseku, godišnje ukrade preko 3.000 vozila
            <br />
            <br />
            <b>Kako često dolazi do oštećenja na vozilu?</b>
            <br /> Često se dešava da vozilo zateknemo oštećeno na parkingu ili drugom mestu, naročito u gradu gde je gužva. Ako nemamo kasko polisu, štetu moramo sami da platimo.
            <br />
            <br />
            <b>Bonus i malus, da li su vezani za auto ili vozača?</b>
            <br /> Bonus i malus vezani su za vozača. Bonus je moguće preneti iz jedne kuće u drugu. Nije moguće preneti bonus sa jedne polise, sa jednog vozila na drugog vlasnika.
            <br />
            <br />
            <b>Ako imate još pitanja, pišite nam na mejl, zovi te nas.</b>
            <br />
            Možete nas pozvati i u momentu štete, kako bi Vas posavetovali šta i kako da uradite, posebno pre davanja izjave policiji-ako je to slučaj. Jer često redosled reči u rečenici, zarezi,
            tačka na kraju rečenice, mogu da promene smisao Izjave i da Vam odmogne prilikom naplate štete. Mi smo tu za Vas.
          </p>
        </div>

        <div id="contact-form"></div>
        <ContactForm />

        <SocialIcons />

        <WhatsApp />
        <ViberUs />
        <CallUs />
        <ToTop />
      </main>

      <Footer />
    </Fragment>
  );
};

export default KaskoOsiguranje;
