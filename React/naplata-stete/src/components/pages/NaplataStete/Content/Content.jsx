import React, { Fragment, useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

import classes from './Content.model.css';

const Features = () => {
  const [screenWidth, setScreenWidth] = useState(window.innerWidth);
  const [mobileScreen, setMobileScreen] = useState(false);

  useEffect(() => {
    // Function to update the screen width
    const handleResize = () => {
      setScreenWidth(window.innerWidth);
    };

    // Add event listener to update width on window resize
    window.addEventListener('resize', handleResize);

    // Clean up event listener on component unmount
    return () => {
      window.removeEventListener('resize', handleResize);
    };
  }, []);

  useEffect(() => {
    screenWidth < 1200 ? setMobileScreen(true) : setMobileScreen(false);
  }, [screenWidth]);

  return (
    <Fragment>
      <section className={`${classes.stete} section`}>
        <div className="container">
          <div class="row gy-4 sticky-top-100">
            <div class="container section-title p-0" data-aos="fade-up">
              <h2>Upoznajte se sa postupkom za različite vrste šteta.</h2>
            </div>
            <div class="col-lg-4 col-md-4 py-lg-0 py-2 mt-0" data-aos="fade-up" data-aos-delay="100">
              <div class="features-item">
                <i class="fa-solid fa-turn-down" style={{ color: `#fff`, fontSize: `16px` }}></i>
                {/* <i class="fa-solid fa-turn-down" style={{ color: `#47aeff`, fontSize: `16px` }}></i> */}
                <h3>
                  <Link
                    onClick={(e) => {
                      e.preventDefault();
                      const y = document.getElementById('stete1').offsetTop;
                      window.scrollTo({ top: y - `${mobileScreen ? `100` : `220`}`, behavior: 'smooth' });
                    }}
                    class="stretched-link"
                  >
                    Naplata štete na vozilu - <span style={{ color: '#ffff3f' }}>Pročitaj više</span>
                  </Link>
                </h3>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 py-lg-0 py-2 mt-0" data-aos="fade-up" data-aos-delay="200">
              <div class="features-item">
                <i class="fa-solid fa-turn-down" style={{ color: `#fff`, fontSize: `16px` }}></i>
                {/* <i class="fa-solid fa-turn-down" style={{ color: `#5578ff`, fontSize: `16px` }}></i> */}
                <h3>
                  <Link
                    onClick={(e) => {
                      e.preventDefault();
                      const y = document.getElementById('stete2').offsetTop;
                      window.scrollTo({ top: y - `${mobileScreen ? `100` : `220`}`, behavior: 'smooth' });
                    }}
                    class="stretched-link"
                  >
                    Naplata štete za povrede - <span style={{ color: '#ffff3f' }}>Pročitaj više</span>
                  </Link>
                </h3>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 py-lg-0 py-2 mt-0" data-aos="fade-up" data-aos-delay="300">
              <div class="features-item">
                <i class="fa-solid fa-turn-down" style={{ color: `#fff`, fontSize: `16px` }}></i>
                {/* <i class="fa-solid fa-turn-down" style={{ color: `#11dbcf`, fontSize: `16px` }}></i> */}
                <h3>
                  <Link
                    onClick={(e) => {
                      e.preventDefault();
                      const y = document.getElementById('stete3').offsetTop;
                      window.scrollTo({ top: y - `${mobileScreen ? `100` : `220`}`, behavior: 'smooth' });
                    }}
                    class="stretched-link"
                  >
                    Druge naplate štete - <span style={{ color: '#ffff3f' }}>Pročitaj više</span>
                  </Link>
                </h3>
              </div>
            </div>
          </div>

          <div className="row gy-4 pt-5">
            <div className={`${classes.content} col-lg-12 mb-4`} data-aos="fade-up">
              <p>Da bi smo Vas zastupali u postpupku naplate štete iz osiguranja, potrebno je sledeće:</p>
              <ol>
                <li>Vaši lični podaci, iz lične karte,</li>
                <li>Potpisana punomoć za zastupanje u postupku naplate štete</li>
                <li>Ostala dokumenta</li>
              </ol>
              <p>Najbolje je da nas kontaktirate i dogovorimo detalje.</p>
              <br />

              <h3 className="pb-4">PRIJAVA I NAKNADA ŠTETE.</h3>
              <p>
                Ako ste pretrpeli štetu na vozilu, povredu u saobraćajnoj nezgodi kao vozač, putnik, suvozač ili pešak, a niste uspeli da adekvatno naplatite štetu, na usluzi smo Vam, da Vam svojim
                znanjem, stručnošću pomognemo.
                <br />
                <br />
                <b>Koraci za naplatu štete:</b>
              </p>
              <ul>
                <li>Provera prava na naknadu štete – Utvrđujemo pravni osnov za podnošenje zahteva.</li>
                <li>Analiza štetnog događaja – Izvršavamo rekonstrukciju događaja uz detaljnu procenu svih faktora koji su doprineli nezgodi.</li>
                <li>Angažovanje veštaka – Po potrebi se konsultuju stručnjaci kako bi se utvrdio tačan iznos štete.</li>
                <li>Podnošenje zahteva – Priprema i dostavljanje dokumentacije osiguravajućoj kući, koja je obavezna da odgovori u zakonskom roku.</li>
              </ul>
              <p>
                Oštećeni može zahtevati i nadoknadu dodatnih troškova, poput pretrpljenog bola i straha, lečenja, izgubljene zarade, troškova sahrane, tuđe nege i pomoći, u zavisnosti od okolnosti
                slučaja.
                <br />
                <br />
                <b>Od dokaza trebalo bi priložiti:</b>
              </p>
              <ol>
                <li>Evropski izveštaj za manje štete ili zapisnik MUP-a za veće nezgode</li>
                <li>Medicinska dokumentacija i nalazi lekara.</li>
                <li>Izjave svedoka i fotografije oštećenja.</li>
                <li>Sva ostala dokumentacija koja potvrđuje nastalu štetu.</li>
              </ol>
              <p>
                Ukoliko traženi iznos štete ne bude naplaćen “mirnim” putem, van sudskim putem, pokreće se sudski proces radi adekvatne naknade.
                <br />
                <br />
                <b>Nesporni deo štete</b>
                <br />
                <br />
                Oštećeni ima pravo da prihvati ponuđenu naknadu od osiguravajućeg društva kao nesporni deo štete, čime ne gubi pravo na prigovor i potraživanje spornog dela naknade.
                <br />
                <br />
                <b>Uslovi za naknadu štete trećem licu</b>
                <br />
                <br />
                Osiguranje od autoodgovornosti pokriva štetu u sledećim slučajevima:
              </p>
              <ul>
                <li>Vozač mora imati važeću vozačku dozvolu.</li>
                <li>Vozilom se ne sme upravljati pod uticajem alkohola ili nedozvoljenih supstanci.</li>
                <li>Saobraćajna nezgoda ne sme biti izazvana namerno.</li>
                <li>Vozač ne sme napustiti mesto nezgode bez odobrenja nadležnih organa.</li>
                <li>Vozilo se mora koristiti isključivo u svrhe predviđene saobraćajnom dozvolom.</li>
                <li>Vozilo mora biti tehnički ispravno u trenutku nezgode.</li>
              </ul>
              <p>
                <b>Vozač mora biti kriv za izazvanu saobraćajnu nezgodu.</b>
              </p>

              <p>Osiguranje od autoodgovornosti može priznati štetu klijenta čak i u sledećim slučajevima:</p>
              <ul>
                <li>Kada vozilo nije korišćeno u skladu sa njegovom namenom.</li>
                <li>Ako vozač nije imao odgovarajuću vozačku dozvolu za kategoriju vozila.</li>
                <li>U situaciji kada je vozaču oduzeta dozvola ili je isključen iz saobraćaja.</li>
                <li>Ako je vozač bio pod uticajem alkohola, opojnih droga ili zabranjenih psihoaktivnih supstanci.</li>
                <li>Ukoliko je vozač namerno prouzrokovao štetu.</li>
                <li>Kada je vozilo bilo tehnički neispravno, a vozač je bio svestan te činjenice.</li>
                <li>Ako je vozač napustio mesto saobraćajne nezgode.</li>
              </ul>
            </div>

            <div className={`${classes.content} col-lg-12 order-1 order-lg-1  pt-5 mb-4`} id="stete1">
              <h3 className="pb-4">NAPLATA-NAKNADA ŠTETE NA VOZILU</h3>
              <p>
                Šteta na vozilu nastala u saobraćajnoj nezgodi može se nadoknaditi kroz odgovarajući postupak. Sa sve većim brojem vozila na putevima, raste i broj saobraćajnih nezgoda, što zahteva
                adekvatan pristup naplati štete.
                <br />
                <br />
                Pored naknade štete na vozilu, moguće je ostvariti pravo na nadoknadu za povrede zadobijene u saobraćajnoj nezgodi, bilo da ste vozač, putnik, suvozač ili pešak.
                <br />
                <br />
                <b>Ako ste učestvovali u saobraćajnoj nezgodi, odmah nas kontaktirajte kako bismo Vam pomogli da svoju štetu nadoknadite na najbolji mogući način.</b>
                <br />
                <br />
                Pravo na naplatu štete na bazi polise osiguranja od autoodgovornosti ima svaki oštećeni u saobraćajnoj nezgodi, ukoliko vozilo koje je prouzrokovalo nezgdu poseduje polisu od
                autoodgovornosti.
                <br />
                <br />
                Autoodgovornost osiguranje je propisano zakonom i obaveza je svakog vlasnika vozila da poseduje ovu polisu. Njegova svrha je da zaštiti vlasnika osiguranika od nepredviđenih troškova u
                slučaju saobraćajne nezgode, ali i da oštećenom obezbedi naknadu za štetu nastalu u nezgodi. Ova polisa pokriva odgovornost vlasnika za štete nanesene drugim licima.
                <br />
                <br />
                <b>Kako naplatiti štetu od osiguravajuće kuće?</b>
                <br />
                <br />
                U praksi se često dešava da osiguravajuće kuće osporavaju štetu svojih klijenata, ističući navodni doprinos oštećenog štetnom događaju ili smanjujući iznos naknade.
                <br />
                U takvim slučajevima, obratite se nama za pravni savet i podršku kako biste uspešno ostvarili svoja prava i naplatili odgovarajuću naknadu štete.
                <br />
                <br />
                <b>NAKNADA ŠTETE – KASKO OSIGURANJE</b>
                <br />
                <br />
                Auto-kasko osiguranje pruža zaštitu od oštećenja i uništenja vozila u različitim situacijama, kao što su saobraćajne nezgode, požar, udar predmeta, grom, oluja, grad, snežna lavina,
                poplava, eksplozija, spoljašnje termičko ili hemijsko delovanje, zemljotres, demonstracije ili krađa (uz dodatno ugovaranje). Situacija je ovde jasna jer se odnosi na štetu nastalu na
                vašem vozilu, koja će biti nadoknađena bez obzira na to da li ste vi izazvali udes ili neko drugi.
                <br />
                <br />
                Ipak, čak i kod ovog osiguranja, mogu se javiti problemi sa osiguravajućom kućom, poput odbijanja prava na naplatu štete ili umanjenja obračunate naknade. To može biti veoma neprijatno
                i komplikovano za rešavanje. U takvim situacijama, obratite nam se da vam pružimo pomoć.
              </p>
            </div>

            <div className={`${classes.content} col-lg-12 order-1 order-lg-1  pt-5 mb-4`} id="stete2">
              <h3 className="pb-4">NAKNADA ŠTETE ZA FIZIČKI I DUŠEVNI BOL</h3>
              <p>NEMATERIJALNA ŠTETA je pravno priznata povreda nematerijalnog dobra, koja se može manifestovati u različitim oblicima. Neki od najčešćih oblika nematerijalne štete su:</p>
              <ul>
                <li>
                  Pretrpljeni i budući fizički bolovi – Ovo je zaštitni mehanizam ljudskog tela koji se manifestuje refleksnim reagovanjem u slučaju povrede tkiva. Dokazuje se pred sudom veštačenjem
                  posredstvom medicinskog veštaka.
                </li>
                <li>Pretrpljeni i budući strah – Strah je najneprijatniji ljudski doživljaj, izazvan saznanjem o neposrednoj opasnosti. Lako je dokaziv i pred sudom se utvrđuje veštačenjem.</li>
                <li>
                  Pretrpljeni i budući duševni bolovi zbog umanjenja opšte životne aktivnosti – Ova vrsta nematerijalne štete nastaje kao posledica povrede tela. Visina i procenat umanjenja opšte
                  životne aktivnosti zavise od sposobnosti veštaka da ovu naknadu personalizuje u skladu sa stanjem oštećenog.
                </li>
                <li>Pretrpljeni i budući duševni bolovi zbog naruženosti – Ova šteta zavisi od stepena promene spoljašnosti oštećenog lica, a utvrđuje se veštačenjem pred sudom.</li>
                <li>Pretrpljeni i budući duševni bolovi zbog smrti bliskog lica – Ovaj oblik štete je ograničen stepenom srodstva, a sud ga utvrđuje na osnovu slobodne ocene, bez veštačenja.</li>
                <li>
                  Pretrpljeni i budući duševni bolovi zbog teškog invaliditeta bliskog lica – Uslovljena je stepenom srodstva i stepenom invalidnosti, a vezana je za umanjenu opštu životnu aktivnost
                  oštećenog.
                </li>
              </ul>
              <p>
                Naplata nematerijalne štete je moguća, ali najteže dokaziva i naplativa. U ovim slučajevima, pomoć iskusnih profesionalaca iz oblasti osiguranja i prava može biti od velike pomoći.
                <br />
                Zato nas pozovite da vas posavetujemo kako da ostvarite pravo na naknadu za nematerijalnu štetu.
              </p>
            </div>
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 pt-5 mb-4`} id="stete3">
              <h3 className="pb-4">NAPLATA ŠTETE NA VOZILU OD LEDENICA:</h3>
              <p>
                Mnogi građani koji su doživeli štetu na vozilu usled pada snega sa krova zgrade, ledenica, grane drveta ili sličnih okolnosti, često ne uspevaju da naplate štetu iako imaju pravo na
                naknadu. Ovo je najčešće posledica neznanja, ali i ponekad "bezobrazluka" osiguravajućih kuća ili vlasnika objekta. Takođe, loša organizacija oštećenog građanina u vezi sa prijavom
                štete često dovodi do odbijanja odštetnog zahteva.
                <br />
                Kada se ovakav slučaj dogodi, odmah nas pozovete da Vas instruišemo šta i kako je potrebno da uradite. Važno je odmah postupiti ispravno kako biste izbegli probleme u naplati štete.
                Evo šta treba da znate:
                <br />
                – Kada uočite štetu na vozilu, obavezno pozovite saobraćajnu policiju koja će izvršiti uviđaj i sačiniti zapisnik.
                <br />
                – Za naplatu štete nije nužno imati kasko osiguranje.
                <br />
                – Ako imate osiguranje stakala uz polisu autoodgovornosti, imate pravo na naplatu štete, ali i u ovom slučaju je obavezno pozvati policiju da sačini zapisnik.
                <br />– Ukoliko je vozilo oštećeno ispred poslovnog objekta, štetu nadoknađuje vlasnik tog objekta.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE OD PADA DRVETA NA AUTO – ZELENILO BEOGRAD</h3>
              <p>
                Ukoliko je grana pala sa drveta koje je u nadležnosti javnog komunalnog preduzeća, građani moraju pozvati policiju i prijaviti slučaj, kako bi kasnije ostvarili pravo na naknadu štete.
                Štete ovog tipa naknaduju se od strane javnog komunalnog preduzeća koje je odgovorno za održavanje drvoreda.
                <br />
                <br />
                U ovim slučajevima, obratite se nama da vam pomognemo u procesu naplate kako materijalne, tako i nematerijalne štete.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE OD RUPE NA PUTU</h3>
              <p>
                Ukoliko ste prilikom vožnje upali u rupu i oštetili vozilo, moguće je naplatiti štetu za ovakve situacije. Odgovornost za oštećenje može preuzeti nadležna opštinska ili gradska vlast,
                ukoliko se dokaže da je rupa nastala zbog njihove nebrige u održavanju puta.
                <br />
                <br />
                U ovim slučajevima, obratite se nama da vam pomognemo u procesu naplate materijalne, pa i nematerijalne štete.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE U SLUČAJU OŠTEĆENJA VOZILA NA PARKINGU</h3>
              <p>
                U slučaju da ste ostavili automobil na parkingu, a kada ste se vratili zatekli ulubljeno vozilo, počinilac se, naravno, izgubio i napustio mesto nezgode, a šteta nije mala. Pitanje je:
                da li je moguće u ovakvim slučajevima naplatiti štetu i kome se obratiti kako biste ostvarili svoja prava?
                <br />
                <br />
                Vlasnik vozila koji ima kasko polisu osiguranje, bez problema će naplatiti načinjenu štetu, potrebno je samo da se obrati svojoj osiguravajućoj kući koja će mu isplatiti naknadu za
                nastalu štetu. Ukoliko pak nemate kasko, moguće je da naplatite štetu. Neophodno je da pozovete policiju pre pomeranja vozila i policija će napraviti zapisnik i naložiti pregledanje
                snimaka okolnih kamera na javnom parkingu. Na osnovu toga bi se utvrdilo koje je vozilo napravilo štetu, a onda bi se vlasnik oštećenog vozila obratio osiguravajućoj kući u kojoj to
                vozilo ima polisu osiguranja autoodgovornosti.
                <br />
                <br />
                Ukoliko se ispostavi da vozilo koje je napravilo štetu nije osigurano, za naknadu štete bi se trebalo obratiti Garantnom fondu, koji se nalazi pri Udruženju osiguravača. Garantni fond
                isplaćuje materijalne štete (nastale na stvarima) i nematerijalne (za povrede ljudi) koje napravi neosigurano vozilo.
                <br />
                <br />
              </p>
              <h3 className="pb-4">NAKNADA ŠTETE ZBOG UJEDA PSA</h3>
              <p>
                Psi lutalice su, na žalost, postali svakodnevna pojava. Svakodnevno se susrećemo sa jednim ili neretko čoporom pasa. A čopor pasa je najopasniji, jer im je u instinktu da deluju kao
                čopor, da napadaju "plen" – ljude. Neretko ti psi su bezopasni, ako ih se ne uplašimo i ne počnemo da bežimo. Međutim, teško je biti pribran u situacijama kada zalaja čopor pasa. U
                takvim situacijama, ujed pasa neizbežan je, minimum.
                <br />
                <br />
                Godišnje čak 80.000 građana budu žrtve ujeda napuštenih pasa. Ujed pasa je jedan od osnovnih uzroka za naplatu štete od osiguranja.
                <br />
                <br />
                Većina građana i ne zna za svoje pravo nakon ujeda pasa. A to je da imaju pravo da naplate štetu koju su pretrpeli (materijalnu i nematerijalnu).
                <br />
                Materijalna šteta je npr pocepana odeća, obuća, dok nematerijalna šteta je pretrpljen strah, bol, fizička oštećenja tela i slično.
                <br />
                <br />
                ŠTA UČINITI KADA VAS UJEDNE PAS?
              </p>
              <ul>
                <li>Obavezno se prijaviti u medicinsku ustanovu, radi saniranja ujeda, a i evidentiranja da se desio ujed pasa</li>
                <li>Po službenoj dužnosti, medicinska ustanova treba da pozove MUP, da i oni naprave zapisnik o dešavanju…</li>
                <li>Potrebno je slučaj prijaviti JKP koje se bavi psima lutalicama u gradu, radi evidencije slučaja.</li>
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
                <li>Kada se zahtev podnosi opštini ili gradu gde se dogodio napad, o zahtevu neposredno odlučuje komisija za rešavanje ovih šteta.</li>
              </ul>
              <p>
                Odmah nakon ujeda je potrebno pribaviti na licu mesta informacije da li je još neko lice videlo napad i podatke o tom licu u smislu kontakt telefona, imena i adrese radi eventualnog
                kasnijeg svedočenja na sudu. Poželjno je pozvati i policiju i prijaviti napad, policija iako nije zadužena za ovakve slučajeve može u slučaju da izađe na lice mesta napraviti službenu
                belešku koja se kasnije može koristiti kao dokaz. Čak i da se ova beleška ne uspe ishodovati (policija nekad ne želi ili ne može da izađe na teren) barem
                <b>podaci o svedocima mogu biti veoma korisni</b> za kasniji postupak.
                <br />
                <br />
                Nakon ujeda potrebno je što pre zatražiti neophodnu medicinsku pomoć i zatražiti od doktora da na svom medicinskom nalazu konstatuje da je reč o povredi koja je izazvana ujedom psa.
                Potrebno je primiti tetanus i to konstatovati na medicinskom nalazu. Potrebno je „Veterini Beograd“ ili drugom nadležnom javnom preduzeću, zavisno od teritorije na kojoj se ujed
                dogodio, prijaviti napad radi eventualnog izlaska na teren, identifikacije i hvatanja psa lutalice.
                <br />
                <br />
                Nakon procesa pribavljanja dokaza pokreće se postupak za naplatu štete. Ovaj postupak se može voditi kao vansudski ili sudski.
              </p>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Features;
