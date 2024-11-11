import React, { Fragment } from 'react';

import classes from './Features.model.css';
import styles from '../../AboutUsPage/Team/Team.module.css';

import image from '../../../../assets/img/stete-img.jpg';

import team1 from '../../../../assets/img/team/team-1.png';
import team2 from '../../../../assets/img/team/team-2.png';
import team6 from '../../../../assets/img/team/team-6.png';
import team7 from '../../../../assets/img/team/team-7.png';

const Features = () => {
  return (
    <Fragment>
      <section className={`${classes.stete} section`}>
        <div className="container">
          <div className="row gy-4">
            <div className={`${classes.content} col-lg-12 mb-4`} data-aos="fade-up">
              <p>Da bi smo Vas zastupali u postpupku naplate štete iz osiguranja, potrebno je sledeće:</p>
              <ol>
                <li>Vaši lični podaci, iz lične karte,</li>
                <li>Potpisana punomoć za zastupanje u postupku naplate štete</li>
                <li>Ostala dokumenta</li>
              </ol>
              <p>Najbolje je da nas kontaktirate i dogovorimo detalje.</p>
            </div>

            <div className="container-fluid py-5 wow fadeInUp" data-aos="fade-up" style={{ visibility: 'visible', animationDelay: '0.1s', animationName: 'fadeInUp' }}>
              <div className="container pb-5">
                <div className="section-title text-center position-relative pb-3 mb-5 mx-auto" style={{ maxWidth: '800px' }}>
                  <h5 className="fw-bold text-uppercase" style={{ color: `var(--accent-color)` }}>
                    Zašto odabrati nas
                  </h5>
                  <h2 className="mb-0">Ceo postupak naplate štete mi vodimo</h2>
                  <p className="pt-2">Dovoljno je da nam se javite i mi preuzimamo postupak naplate (od dokumentacije, procene štete, komunikaciju za osiguravajućom kućom i drugo)</p>
                </div>

                <section id="team" className={`${styles.team} section mb-5`}>
                  <div className="container">
                    <div className="row gy-5">
                      <div className={`${styles.member} col-lg-3 col-md-6`} data-aos="fade-up" data-aos-delay="100">
                        <div className={styles['member-img']}>
                          <img src={team1} className="img-fluid" alt="" />
                          <div className={styles.social}></div>
                        </div>
                        <div className={`${styles['member-info']} text-center`}>
                          <h4>
                            Goran Dramićanin, <br /> dipl.inž.
                          </h4>
                          <span>Savetnik za osiguranja - Direktor</span>
                        </div>
                      </div>

                      <div className={`${styles.member} col-lg-3 col-md-6`} data-aos="fade-up" data-aos-delay="200">
                        <div className={styles['member-img']}>
                          <img src={team2} className="img-fluid" alt="" />
                          <div className={styles.social}></div>
                        </div>
                        <div className={`${styles['member-info']} text-center`}>
                          <h4>
                            Mirjana Jokić, <br /> Ekon.
                          </h4>
                          <span>Office asistent</span>
                        </div>
                      </div>

                      <div className={`${styles.member} col-lg-3 col-md-6`} data-aos="fade-up" data-aos-delay="300">
                        <div className={styles['member-img']}>
                          <img src={team6} className="img-fluid" alt="" />
                          <div className={styles.social}></div>
                        </div>
                        <div className={`${styles['member-info']} text-center`}>
                          <h4>
                            Borivoje Marković, <br /> dipl.prav.
                          </h4>
                          <span>Advokat</span>
                        </div>
                      </div>

                      <div className={`${styles.member} col-lg-3 col-md-6`} data-aos="fade-up" data-aos-delay="300">
                        <div className={styles['member-img']}>
                          <img src={team7} className="img-fluid" alt="" />
                          <div className={styles.social}></div>
                        </div>
                        <div className={`${styles['member-info']} text-center`}>
                          <h4>
                            Luka Jovanović, <br /> dipl.maš.inž
                          </h4>
                          <span>Sudski veštak - procenitelj šteta</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <div className="row g-5" data-aos="fade-up">
                  <div className="col-lg-4">
                    <div className="row g-5">
                      <div className="col-12 wow zoomIn" data-wow-delay="0.1s" style={{ visibility: 'visible', animationDelay: '0.1s', animationName: 'zoomIn' }}>
                        <div
                          className="rounded d-flex align-items-center justify-content-center mb-3"
                          style={{ width: '60px', height: '60px', color: `var(--accent-color)`, backgroundColor: `var(--accent-color)` }}
                        >
                          <i style={{ color: `var(--accent-color)` }} className="fa fa-cubes text-white"></i>
                        </div>
                        <h4>Isplata naknade štete na Vaš tekući račun</h4>
                        <p className="mb-0">Isplata celokupne naknade ide na Vaš tekući račun</p>
                      </div>
                      <div className="col-12 wow zoomIn" data-wow-delay="0.1s" style={{ visibility: 'visible', animationDelay: '0.1s', animationName: 'zoomIn' }}>
                        <div className="rounded d-flex align-items-center justify-content-center mb-3" style={{ width: '60px', height: '60px', backgroundColor: `var(--accent-color)` }}>
                          <i style={{ color: `var(--accent-color)` }} className="fa fa-award text-white"></i>
                        </div>
                        <h4>Naplate štete sa originalnim delovima</h4>
                        <p className="mb-0">…kad god je moguće, naplate šte se radi sa originalnim delovima, čime dobijate maksimalan iznos naplate.</p>
                      </div>
                    </div>
                  </div>
                  <div className="col-lg-4 wow zoomIn" data-wow-delay="0.1s" style={{ minHeight: '350px', visibility: 'visible', animationDelay: '0.1s', animationName: 'zoomIn' }}>
                    <div className="position-relative h-100">
                      <img
                        className="position-absolute w-100 h-100 rounded wow zoomIn"
                        data-wow-delay="0.1s"
                        src={image}
                        style={{ objectFit: 'cover', visibility: 'visible', animationDelay: '0.1s', animationName: 'zoomIn' }}
                        alt="Naplata štete"
                      />
                    </div>
                  </div>
                  <div className="col-lg-4">
                    <div className="row g-5">
                      <div className="col-12 wow zoomIn" data-wow-delay="0.1s" style={{ visibility: 'visible', animationDelay: '0.1s', animationName: 'zoomIn' }}>
                        <div className="rounded d-flex align-items-center justify-content-center mb-3" style={{ width: '60px', height: '60px', backgroundColor: `var(--accent-color)` }}>
                          <i style={{ color: `var(--accent-color)` }} className="fa fa-users-cog text-white"></i>
                        </div>
                        <h4>Bez troškova sa Vaše strane</h4>
                        <p className="mb-0">Celokupni postupak vodimo bez troškova sa Vaše strane!</p>
                      </div>
                      <div className="col-12 wow zoomIn" data-wow-delay="0.1s" style={{ visibility: 'visible', animationDelay: '0.1s', animationName: 'zoomIn' }}>
                        <div className="rounded d-flex align-items-center justify-content-center mb-3" style={{ width: '60px', height: '60px', backgroundColor: `var(--accent-color)` }}>
                          <i style={{ color: `var(--accent-color)` }} className="fa fa-phone-alt text-white"></i>
                        </div>
                        <h4>Dolazimo po dogovoru na željenu adresu.</h4>
                        <p className="mb-0">Kako bi Vam olakšali neželjenu situaciju sa nazgodom vozila, u dogovoru sa Vam dolazimo na željenu adresu.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className={`${classes.content} col-lg-12 mb-4`} data-aos="fade-up">
              <h3 className="pb-4">PRIJAVA I NAKNADA ŠTETE.</h3>
              <p>
                Ukoliko ste pretrpeli štetu na svom vozilu, ukoliko ste povređeni u saobraćajnoj nezgodi kao vozač, suvozač, putnik ili pešak na javnoj površini, a niste adekvatno naplatili štetu, na
                usluzi smo Vam, da Vam svojim znanjem, stručnošću pomognemo.
                <br />
                <br />
                Postupak naplate štete:
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
                  Od dokaza trebalo bi priložiti, za manje štete Evropksi izveštaj, a za veće štete i zapisnik nadležnog organa MUP-a o izvršenom uviđaju saobraćajne nesreće; zatim i nalaze lekara,
                  izjave svedoka, zapisnik o oštećenju vozila, fotografije oštećenog vozila, i svu prikupljenu dokumentaciju kojom se dokazuje pričinjena šteta.
                </li>
                <li>u slučaju da se ne naplati traženi iznos štete “mirnim” putem, u vansudskom postupku, pokreće se sudski postupak u cilju naplate adekvatnog iznosa štete.</li>
              </ul>
              <p>
                <b>Nesporni deo štete</b>
                <br />
                <br />
                Oštećeni ima pravo da prihvati ponuđenu naknadu od osiguravajućeg društva kao nesporni deo štete, čime ne gubi pravo na prigovor i potraživanje spornog dela naknade.
                <br />
                <br />
                <b>Uslovi za naknadu štete u saobracaju drugom licu</b>
                <br />
                <br />U sledećim slučajevima, osiguravajuća kuća će ući u postupak priznanja štete od strane svog klijenta, po osnovu osiguranja od autoodgovornosti:
              </p>
              <ul>
                <li>Vozač mora posedovati vozačku dozvolu,</li>
                <li>Vozač ne sme upravljati vozilom pod dejstvom alkohola, ili drugih nedozvoljenih supstanci,</li>
                <li>Vozač ne sme počiniti saobraćajnu nezgodu nemerno,</li>
                <li>Vozač ne sme napustiti mesto nezgode samovoljno,</li>
                <li>Vozač ne sme upotrebljavati vozilom u druge svrhe, kao što je to naznačeno u saobraćajnoj, i</li>
                <li>Vozilo mora biti tehnički ispavno, ako je učestvovalo u saobraćajnoj nezgodi.</li>
              </ul>
              <p>
                <b>Vozač mora biti kriv za izazvanu saobraćajnu nezgodu.</b>
                <br />
                <br />U sledećim slučajevima, osiguravajuća kuća će ući u postupak priznanja štete od strane svog klijenta, po osnovu osiguranja od autoodgovornosti:
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

            <div className={`${classes.content} col-lg-12 order-1 order-lg-1  pt-5 mb-4`} id="stete1">
              <h3 className="pb-4">NAPLATA-NAKNADA ŠTETE NA VOZILU</h3>
              <p>
                Naplata štete na vozilu podrazumeva naplatu štete na vozilu nastalu u saobraćajnoj nezgodi. Činjenica je da je sve više vozila na putevima, te sa tim dolazi i do više saobraćajnih
                nezgoda.
                <br />
                <br />
                Pored naplate štete nastala na vozilu, moguće je naplatiti štetu i na licima koji su pretrpeli bilo kakvu štetu-povredu u saobraćajnoj nezgodi.
                <br />
                <br />
                <b>Ukoliko doživite saobraćajnu nezgodu, obavezno nas kontaktirajte kako bi Vam pomogli da Vašu štetu nadoknadite na najbolji mogući način.</b>
                <br />
                <br />
                Pravo na naplatu štete na bazi polise osiguranja od autoodgovornosti ima svaki oštećeni u saobraćajnoj nezgodi, ukoliko vozilo koje je prouzrokovalo nezgdu poseduje polisu od
                autoodgovornosti.
                <br />
                Osiguranje od autoodgovornosti propisano je zakonom i obaveza svakog vlasnika vozila je da ima ovu polisu. Ono pokriva odgovornost vlasnika polise za štete pričinjene nad drugim licima
                i ima za cilj, kako da zaštiti vlasnika-osiguranika u slučaju saobraćajne nezgode od nepredviđenih troškova, tako i da zaštiti oštećenog-tako što će mu isplatiti naknadu štete koju mu
                je prouzrokovala saobraćajna nezgoda.
                <br />
                <br />
                <b>Kako naplatiti štetu od udesa od osiguravajuće kuće</b>
                <br />
                <br />
                Često osiguravajuće kuće ne priznaju štete koje su načinili njihovi klijenti, ističu doprinos šteti oštećenog, ili jednostavno pokušavaju da umanje svoju obavezu. U takvim slučajevima,
                obratit se nama za savet, kako bi ste na najbolji način naplatili štetu.
                <br />
                <br />
                <b>NAKNADA ŠTETE – KASKO OSIGURANJE</b>
                <br />
                <br />
                Auto-kasko osiguranje predstavlja osiguravajuću zaštitu od uništenja i oštećenja vozila u slučaju saobraćajne nezgode, požara, pada ili udara nekog predmeta, udara groma, oluje, grada,
                snežne lavine, poplave, eksplozije, iznenadnog termičkog ili hemijskog delovanja spolja, zemljotresa, manifestacija ili demonstracija, i krađe uz dopunsko ugovaranje. Ovde je situacija
                mnogo jasnija jer se radi o šteti nastaloj na vašem vozilu. Šteta će biti nadoknađena bez obzira na to da li ste vi izazvali udes ili neko drugi.
                <br />
                Međutim, i kod ovog osiguranje, neretko dođe do neželjenih reakcija od strane osiguravajuće kuće (odbijanje prava na naplatu štete, umanjenje obračuna naknade za štetu i drugo). Sve to
                može da bude jako neprijatno i nerešivo za običnog čoveka. U tim slučajevima, kontaktirajte nas da Vam pomognemo.
              </p>
            </div>

            <div className={`${classes.content} col-lg-12 order-1 order-lg-1  pt-5 mb-4`} id="stete2">
              <h3 className="pb-4">NAKNADA ŠTETE ZA FIZIČKI I DUŠEVNI BOL</h3>
              <p>NEMATERIJALNA ŠTETA je pravno priznata povreda nematerijalnog dobra, sa različitim pojavnim oblicima. Sledeći oblici nematerijalne štete postoje:</p>
              <ul>
                <li>
                  pretrpljeni i budući fizički bolovi obično se definiše kao zaštitini mehanizam ljudskog tela, koji se manifestuje refleksnim reagovanjem u slučaju povrede nekog tkiva. Dokazuje se
                  pred sudom, veštačenjem posredstvom veštaka medicinske struke
                </li>
                <li>
                  pretrpljeni i budući strah je najneprijatniji ljudski doživljaj, uslovljen saznanjem o neposrednoj ugrožavajućoj opasnosti. Po pravilu, lako je dokaziv i kod suda se dokazuje
                  veštačenjem
                </li>
                <li>
                  pretrpljeni i budući duševni bolovi zbog umanjenja opšte životne aktivnosti je vrsta nematerijalne štete koja nastaje kao posledica povrede tela.Visina i procenat umanjenja opšte
                  životne aktivnosti pretežno zavise od sposobnosti veštaka da ovu naknadu personalizuje u skladu sa stanjem oštećenog lica
                </li>
                <li>pretrpljeni i budući duševni bolovi zbog naruženosti je uslovljena stepenom izmene spoljašnosti oštećenog lica i kod suda utvrđuje se veštačenjem</li>
                <li>pretrpljeni i budući duševni bolovi zbog smrti bliskog lica, kao vid štete ograničen je stepenom srodstva i po pravilu sud ga utvrđuje na osnovu slobodne ocene, bez veštačenja</li>
                <li>
                  pretrpljeni i budući duševni bolovi zbog teškog invaliditeta bliskog lica, uslovljena je stepenom srodstva i stepenom invalidnosti bliskog lica. Vezana je za umanjenu opštu životnu
                  aktivnost oštećenog lica.
                </li>
              </ul>
              <p>
                Naplata nematerijalne štete je moguća, ali i najteže dokaziva i naplativa. U ovim slučajevima će Vam od velike koristi biti pomoć iskusnih profesionalaca iz oblasti osiguranje i prava.
                <br />
                Zato nas pozovite da Vas posavetujemo kako da naplatite i ovu štetu.
              </p>
            </div>
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 pt-5 mb-4`} id="stete3">
              <h3 className="pb-4">NAPLATA ŠTETE NA VOZILU OD LEDENICA:</h3>
              <p>
                Većina građana kojima je na automobil pao sneg sa krova zgrade, led, ledenice, ili se prelomila i pala neka grana drveta kraj koga je bio parkirano vozilo, ne uspe da nadoknadi
                pričinjenu štetu, a ima prvo na naknadu štete. Obično je to iz razloga neznanja građana. A neretko i “bezobrazluk” osiguravajućih kuća ili vlasnika objekta.
                <br />
                Neretko je i loša organizacija oko prijave štete od strane oštećenog građanina uzrok za kasnije odbijanje odštetnog zahteva.
                <br />
                Zato je dobro, čim Vam se desi ovakav slučaj, da nas pozovet da Vas instruišemo šta i kako je potrebno da uradite, da kasnije ne biste imali problema oko naplate štete. Ono što trebate
                znati u tom slučaju je:
                <br />
                – Potrebno je da, kada uočite štetu na vozilu, pozovete saobraćajnu policiju koja treba da izvrši uviđaj i sačiniti zapisnik
                <br />
                – Nije potrebno kasko osiguranje da bi ste naplatili štetu na vozilu.
                <br />
                – ukoliko imate zaključeno osiguranje stakala uz polisu autoodgovornosti, imate pravo na naplatu štete, ali je i u ovom slučaju potrebno da pozovete policiju da sačini zapisni.
                <br />– Za slučaj da je vozilo oštećeno ispred poslovnog objekta štetu nadoknađuje vlasnik tog objekta
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE OD PADA DRVETA NA AUTO – ZELENILO BEOGRAD</h3>
              <p>
                Ukoliko je pala grana sa drveta koje je u nadležnosti javnog komunalnog preduzeća, onda je neophodno da građani pozovu policiju da prijave slučaj, kako bi kasnije ostvarili pravo na
                naknadu štete. Ovakve štete se naknađuju od javnog komunalnog preduzeća koje održava drvored.
                <br />U ovim slučajevima, obratite se nama da Vam pomognemo oko naplate materijalne, pa i nematerijalne štete.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE OD RUPE NA PUTU</h3>
              <p>
                Ukoliko ste priliokom vožnje upali u rupu, oštetili vozilo, moguće je naplatiti štetu za ovakve situacije.
                <br />
                <br />U ovim slučajevima, obratite se nama da Vam pomognemo oko naplate materijalne, pa i nematerijalne štete.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE U SLUČAJU OŠTEĆENJA VOZILA NA PARKINGU</h3>
              <p>
                Šta uraditi u slučaju da ste ostavili automobil na parkingu, a kada ste se vratili zatekli ste ulubljeno vozilo? Počinilac se, naravno, izgubio, napustio mesto nezgode, a šteta nije
                mala. Pitanje je: da li je moguće u ovakvim slučajevima naplatiti štetu i kome se obratiti kako biste ostvarili svoja prava?
                <br />
                <br />
                Vlasnik vozila koji ima kasko polisu osiguranje, će bez problema naplatiti načinjenu štetu, treba samo da se obrati svojoj osiguravajućoj kući koja će mu isplatiti naknadu za nastalu
                štetu. Ukoliko pak nemate kasko, moguće je da naplatite štetu. Neophodno je da pozove policiju pre pomeranja vozila i policija će napraviti zapisnik i naložiti pregledanje snimaka
                okolnih kamera na javnom parkingu. Na osnovu toga bi se utvrdilo koje je vozilo napravilo štetu, a onda bi se vlasnik oštećenog vozila obratio osiguravajućoj kući u kojoj to vozilo ima
                polisu osiguranja autoodgovornosti.
                <br />
                <br />
                Ukoliko se ispostavi da vozilo koje je napravilo štetu nije osigurano, za naknadu štete bi se trebalo obratiti Garantnom fondu, koji se nalazi pri Udruženju osiguravača. Garantni fond
                inače isplaćuje materijalne štete (nastale na stvarima) i nematerijalne (za povrede ljudi) koje napravi neosigurano vozilo.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE ZBOG UJEDA PSA</h3>
              <p>
                Psi lutalice su, na žalost, postali svakodnevica. Svakodnevno se surećemo sa jednim ili neretno i čoporom pasa. A čopor pasa je najopasniji, jer im je u instinktu da deluju kao čopor,
                da napadaju “plen” – ljude. Neretko ti psi su bezopasni, ako ih se ne uplašimo i ne počnemo da bežimo. Međutim, teško je biti pribran u situacijama kada zalaje čopor pasa. U takvim
                situacijama, ujed pasa ne neminovan, minimu.
                <br />
                <br />
                Godišnje čak 80.000 građana budu žrtve ujeda napuštenih pasa. Ujed pasa je jedna od osnovnih uzroka za naplatu štete od osiguranja.
                <br />
                <br />
                Većina građan i ne zna za svoje pravo nakon ujeda pasa. A to je da imaju pravo da naplate štetu koju su pretrpeli (materijalnu i nematerijalnu).
                <br /> Materijalna šteta je npr pocepana odeća, obuća, dok nematerijalna šteta je pretpljen strah, bol, fizička oštećenja tela i slično.
                <br />
                <br />
                ŠTA UČINITI KADA VAS UJED PAS?
              </p>
              <ul>
                <li>Obavezno se prijaviti u medicinsku ustanovu, radi saniranja ujeda, a i evidentiranja da se desio ujed pasa</li>
                <li>Po službenoj dužnosti, medicinska ustanova treba da pozove MUP, da i oni naprave zapisni o dešavanju…</li>
                <li>Potrebno je slučaj prijaviti JKP koje se bavi psima lutilicama u gradu, radi evidencije slučaja.</li>
              </ul>
              <p>
                Nakon svega je moguće pokrenuti postupak naplate štete od ujeda pasa.
                <br />
                <br />
                KAKO DOKAZATI UJED PSA:
              </p>
              <ul>
                <li>Neophodno je utvrditi da li je pas koji je izvršio ujed vlasnički pas ili je u pitanju pas lutalica.</li>
                <li>
                  U slučaju da je u pitanju vlasnički pas, lice kome se treba obratiti za naknadu štete je vlasnik psa, dok u slučaju kada je u pitanju pas lutalica to je Grad Beograd i Javno
                  komunalno preduzeće ,,Veterina Beograd“ u slučaju da se ujed dogodio na teritoriji Beograda.
                </li>
                <li>
                  Ako se ujed dogodio na teritoriji nekog drugog grada u Srbiji pravna lica kojima se treba obratiti za naknadu štete su opština i javno komunalno preduzeće koje je zaduženo za
                  hvatanje pasa lutalica na teritoriji gde se dogodio napad.
                </li>
                <li>Kada se zahtev podnosi opštini ili gradu gde se dogodio napad o zahtevu neposredno odlučuje komisija za rešavanje ovih šteta.</li>
              </ul>
              <p>
                Odmah nakon ujeda je potrebno pribaviti na licu mesta informacije <b>da li je još neko lice videlo napad</b> i podatke o tom licu u smislu kontakt telefona imena i adrese radi
                eventualnog kasnijeg svedočenja na sudu. <b>Poželjno je pozvati i policiju</b> i prijaviti napad, policija iako nije zadužena za ovakve slučajeve može u slučaju da izađe na lice mesta
                napraviti službenu belešku koja se kasnije može koristiti kao dokaz. Čak i da se ova beleška ne uspe ishodovati (policija nekad ne želi ili ne može da izađe na teren) barem
                <b>podaci o svedocima mogu biti veoma korisni</b> za kasniji postupak.
                <br />
                <br />
                Nakon ujeda potrebno je što pre <b>zatražiti neophodnu medicinsku pomoć </b> i zatražiti od doktora da na svom medicinskom nalazu <b>konstatuje da je reč o povredi</b> koja je izazvana
                ujedom psa. Potrebno je primiti tetanus i to konstatovati na medicinskom nalazu. Potebno je ,,Veterini Beograd“ ili drugom nadležnom javnom preduzeću zavisno od teritorije na kojoj se
                ujed dogodio
                <br />
                <br />
                prijaviti napad radi eventualnog izlaska na teren identifikacije i hvatanja psa lutalice. Nakon procesa pribavljanja dokaza pokreće se postupak za naplatu štete. Ovaj postupak se može
                voditi kao <b>vansudski ili sudski.</b>
              </p>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Features;
