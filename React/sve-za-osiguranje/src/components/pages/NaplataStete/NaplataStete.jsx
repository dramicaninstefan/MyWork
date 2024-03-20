import { Fragment } from 'react';

import Header from '../../Header/Header';
import Footer from '../../Footer/Footer';
import ContactForm from '../../ContactForm/ContactForm';

import CallUs from '../../UI/CallUs';
import ViberUs from '../../UI/ViberUs';
import WhatsApp from '../../UI/WhatsApp';
import SocialIcons from '../../UI/SocialIcons';
import ToTop from '../../UI/ToTop';

import classes from './NaplataStete.module.css';

const NaplataStete = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--hero-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.hero}>
          <div className={classes.content}>
            <h1 className={classes['title']}>NAKNADA ŠTETE OD OSIGURANJA</h1>
            <p className={classes.text}>
              Mi smo garant u sigurnoj NAPLATI ŠTETE OD OSIGURANJA
              <br />
              <br />
              Da bi smo Vas zastupali u postpupku naplate štete iz osiguranja, potrebno je sledeće:
              <br />
              1. Vaši lični podaci, iz lične karte,
              <br />
              2. Potpisana punomoć za zastupanje u postupku naplate štete
              <br />
              3. Ostala dokumenta
              <br />
              <br />
              Najbolje je da nas kontaktirate i dogovorimo detalje.
            </p>
            <div className={classes['contact']}>
              <a className={classes['contact-btn']} href="#contact-form">
                Kontaktirajte nas odmah
              </a>
              <div className={classes['social']}>
                <a href="viber://chat/?number=%2B381638489439" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.viber}`}>
                  <i className="fa-brands fa-viber"></i>
                </a>
                <a href="https://wa.me/+381638489439" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.whatsup}`}>
                  <i className="fa-brands fa-whatsapp"></i>
                </a>
                <a href="mailto: svezaosiguranje@gmail.com" rel="noreferrer" className={`${classes.icons} ${classes.email}`}>
                  <i className="fa-solid fa-envelope"></i>
                </a>
              </div>
            </div>
            <div className={classes['social-mobile']}>
              <a href="tel:+381608060001" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.call}`}>
                <i className="fa-solid fa-phone"></i>
              </a>
              <a href="viber://chat/?number=%2B381638489439" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.viber}`}>
                <i className="fa-brands fa-viber"></i>
              </a>
              <a href="https://wa.me/+381638489439" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.whatsup}`}>
                <i className="fa-brands fa-whatsapp"></i>
              </a>
              <a href="mailto: svezaosiguranje@gmail.com" rel="noreferrer" className={`${classes.icons} ${classes.email}`}>
                <i className="fa-solid fa-envelope"></i>
              </a>
            </div>
          </div>
        </div>

        <div className={classes.info1}>
          <h2 className={classes.title}>PRIJAVA I NAKNADA ŠTETE.</h2>

          <p className={classes.text}>
            Ukoliko ste pretrpeli štetu na svom vozilu, ukoliko ste povređeni u saobraćajnoj nezgodi kao vozač, suvozač, putnik ili pešak na javnoj površini, a niste adekvatno naplatili štetu, na
            usluzi smo Vam, da Vam svojim znanjem, stručnošću pomognemo.
            <br />
            <br />
            Postupak naplate štete:
            <br />
            <br />
          </p>

          <ul>
            <li>utvrđivanje prava da li imate prava-pravnog osnova za naknadu štete</li>
            <li>rekonstrukcija štetnog događaja uz svestrano i sveobuhvatno sagledavanje svih uzroka koji su prethodili i doprineli Vašem štetnom događaju</li>
            <li>angažovanje veštaka, ukoliko je potrebno, koji utvrđuje koliki je iznos štete.</li>
            <li>podnošenja odštetnog zahteva osiguravajućem društvu, sa potrebnom dokumentacijom i dokazima, na koji je ono u obavezi da odgovori u zakonskom roku.</li>
            <li>
              Odštetnim zahtevom za naplatu štete na vozilu, oštećeni, u zavisnosti od okolnosti, može zahtevati i naknadu za pretrpljen strah i bol, naknadu troškova lečenja, izgubljene zarade za
              vreme privremene sprečenosti za rad, troškove tuđe nege i pomoći, troškove sahrane i ostale troškove prouzrokovane saobraćajnom nezgodom
            </li>
            <li>
              Od dokaza trebalo bi priložiti, za manje štete Evropksi izveštaj, a za veće štete i zapisnik nadležnog organa MUP-a o izvršenom uviđaju saobraćajne nesreće; zatim i nalaze lekara, izjave
              svedoka, zapisnik o oštećenju vozila, fotografije oštećenog vozila, i svu prikupljenu dokumentaciju kojom se dokazuje pričinjena šteta.
            </li>
            <li>u slučaju da se ne naplati traženi iznos štete “mirnim” putem, u vansudskom postupku, pokreće se sudski postupak u cilju naplate adekvatnog iznosa štete.</li>
          </ul>

          <p className={classes.text}>
            <br />
            <br />
            <b>Nesporni deo štete</b>
            <br />
            <br />
            Oštećeni ima pravo da prihvati ponuđenu naknadu od osiguravajućeg društva kao nesporni deo štete, čime ne gubi pravo na prigovor i potraživanje spornog dela naknade.
            <br />
            <br />
            <b>Uslovi za naknadu štete u saobracaju drugom licu</b>
            <br />
            <br />
          </p>

          <p className={classes.text}>
            U sledećim slučajevima, osiguravajuća kuća će ući u postupak priznanja štete od strane svog klijenta, po osnovu osiguranja od autoodgovornosti:
            <br />
            <br />
          </p>

          <ul>
            <li>Vozač mora posedovati vozačku dozvolu,</li>
            <li>Vozač ne sme upravljati vozilom pod dejstvom alkohola, ili drugih nedozvoljenih supstanci,</li>
            <li>Vozač ne sme počiniti saobraćajnu nezgodu nemerno,</li>
            <li>Vozač ne sme napustiti mesto nezgode samovoljno,</li>
            <li>Vozač ne sme upotrebljavati vozilom u druge svrhe, kao što je to naznačeno u saobraćajnoj, i</li>
            <li>Vozilo mora biti tehnički ispavno, ako je učestvovalo u saobraćajnoj nezgodi.</li>
          </ul>

          <p className={classes.text}>
            <br />
            <b> Vozač mora biti kriv za izazvanu saobraćajnu nezgodu.</b>
            <br />
            <br />U sledećim slučajevima, osiguravajuća kuća će ući u postupak priznanja štete od strane svog klijenta, po osnovu osiguranja od autoodgovornosti:
            <br />
            <br />
          </p>

          <ul>
            <li>ako vozač nije koristio motorno vozilo u skladu sa njegovom namenom;</li>
            <li>ako vozač nije imao vozačku dozvolu za upravljanje motornim vozilom određene kategorije;</li>
            <li>ako je vozaču oduzeta vozačka dozvola ili je isključen iz saobraćaja;</li>
            <li>ako je vozač upravljao motornim vozilom pod uticajem alkohola, opojnih droga, odnosno zabranjenih lekova ili drugih psihoaktivnih supstanci;</li>
            <li>ako je vozač štetu prouzrokovao sa namerom;</li>
            <li>ako je šteta nastala zbog toga što je motorno vozilo bilo tehnički neispravno, a ta je okolnost vozaču vozila bila poznata;</li>
            <li>ako je vozač posle saobraćajne nezgode napustio mesto događaja.</li>
          </ul>
        </div>

        <div className={classes.info2}>
          <h2 className={classes.title}>NAPLATA-NAKNADA ŠTETE NA VOZILU</h2>

          <p className={classes.text}>
            Naplata štete na vozilu podrazumeva naplatu štete na vozilu nastalu u saobraćajnoj nezgodi. Činjenica je da je sve više vozila na putevima, te sa tim dolazi i do više saobraćajnih nezgoda.
            <br />
            Pored naplate štete nastala na vozilu, moguće je naplatiti štetu i na licima koji su pretrpeli bilo kakvu štetu-povredu u saobraćajnoj nezgodi.
            <br />
            <br />
            <br />
            <b>Ukoliko doživite saobraćajnu nezgodu, obavezno nas kontaktirajte kako bi Vam pomogli da Vašu štetu nadoknadite na najbolji mogući način.</b>
            <br />
            <br />
            <br />
            Pravo na naplatu štete na bazi polise osiguranja od autoodgovornosti ima svaki oštećeni u saobraćajnoj nezgodi, ukoliko vozilo koje je prouzrokovalo nezgdu poseduje polisu od
            autoodgovornosti.
            <br />
            Osiguranje od autoodgovornosti propisano je zakonom i obaveza svakog vlasnika vozila je da ima ovu polisu. Ono pokriva odgovornost vlasnika polise za štete pričinjene nad drugim licima i
            ima za cilj, kako da zaštiti vlasnika-osiguranika u slučaju saobraćajne nezgode od nepredviđenih troškova, tako i da zaštiti oštećenog-tako što će mu isplatiti naknadu štete koju mu je
            prouzrokovala saobraćajna nezgoda.
            <br />
            <br />
            <b>Kako naplatiti štetu od udesa od osiguravajuće kuće</b>
            <br />
            <br />
          </p>

          <p className={classes.text}>
            Često osiguravajuće kuće ne priznaju štete koje su načinili njihovi klijenti, ističu doprinos šteti oštećenog, ili jednostavno pokušavaju da umanje svoju obavezu.
            <br />U takvim slučajevima, obratit se nama za savet, kako bi ste na najbolji način naplatili štetu.
          </p>
        </div>

        <div className={classes.info3}>
          <h1 className={classes.title}>NAKNADA ŠTETE – KASKO OSIGURANJE</h1>

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

        <div className={classes.info4}>
          <h1 className={classes.title}>OSIGURANJE PUTNIKA U JAVNOM PREVOZU</h1>

          <p className={classes.text}>
            Kao putnici u gradskom prevozu znamo da moramo da platimo kartu.
            <br />
            Ali, da li znate koja su vaša prava u slučaju nezgode u javnom prevozu?
            <br />
            Zakon o obaveznom osiguranju u saobraćaju reguliše osiguranje putnika u slučaju nezgode u javnom prevozu. Zakonom su regulisani slučajevi koji su pokriveni osiguranjem, kao i visina
            osigurane sume i način naplate štete.
            <br />U slučaju da dođe do nezgode neposredno, građani koji koriste prevoz mogu da zahtevaju naknadu štete na osnovu ugovora o osiguranju.
          </p>
        </div>

        <div className={classes.info5}>
          <h1 className={classes.title}>NAKNADA ŠTETE ZA FIZIČKI I DUŠEVNI BOL</h1>

          <p className={classes.text}>
            NEMATERIJALNA ŠTETA je pravno priznata povreda nematerijalnog dobra, sa različitim pojavnim oblicima. Sledeći oblici nematerijalne štete postoje:
            <br />
            <br />
          </p>

          <ul>
            <li>
              pretrpljeni i budući fizički bolovi obično se definiše kao zaštitini mehanizam ljudskog tela, koji se manifestuje refleksnim reagovanjem u slučaju povrede nekog tkiva. Dokazuje se pred
              sudom, veštačenjem posredstvom veštaka medicinske struke
            </li>
            <li>
              pretrpljeni i budući strah je najneprijatniji ljudski doživljaj, uslovljen saznanjem o neposrednoj ugrožavajućoj opasnosti. Po pravilu, lako je dokaziv i kod suda se dokazuje veštačenjem
            </li>
            <li>
              pretrpljeni i budući duševni bolovi zbog umanjenja opšte životne aktivnosti je vrsta nematerijalne štete koja nastaje kao posledica povrede tela.Visina i procenat umanjenja opšte životne
              aktivnosti pretežno zavise od sposobnosti veštaka da ovu naknadu personalizuje u skladu sa stanjem oštećenog lica
            </li>
            <li>pretrpljeni i budući duševni bolovi zbog naruženosti je uslovljena stepenom izmene spoljašnosti oštećenog lica i kod suda utvrđuje se veštačenjem</li>
            <li>pretrpljeni i budući duševni bolovi zbog smrti bliskog lica, kao vid štete ograničen je stepenom srodstva i po pravilu sud ga utvrđuje na osnovu slobodne ocene, bez veštačenja</li>
            <li>
              pretrpljeni i budući duševni bolovi zbog teškog invaliditeta bliskog lica, uslovljena je stepenom srodstva i stepenom invalidnosti bliskog lica. Vezana je za umanjenu opštu životnu
              aktivnost oštećenog lica.
            </li>
          </ul>

          <p className={classes.text}>
            <br />
            Naplata nematerijalne štete je moguća, ali i najteže dokaziva i naplativa.
            <br />
            U ovim slučajevima će Vam od velike koristi biti pomoć iskusnih profesionalaca iz oblasti osiguranje i prava.
            <br />
            <b>Zato nas pozovite da Vas posavetujemo kako da naplatite i ovu štetu.</b>
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

export default NaplataStete;
