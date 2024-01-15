import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './PrijavaINaknadaStete.module.css';

const PrijavaINaknadaStete = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header />
      <main className={classes.main}>
        <div className={classes.hero}>
          <div className={classes.content}>
            <h2 className={classes['small-title']}>PRIJAVA I NAKNADA ŠTETE</h2>
            <h1 className={classes['title']}>
              PRIJAVA I NAKNADA ŠTETE<span>.</span>
            </h1>
          </div>
        </div>

        <div className={classes.info1}>
          <p className={classes.text}>
            Ukoliko ste pretrpeli štetu na svom vozilu, ukoliko ste povređeni u saobraćajnoj nezgodi kao vozač, suvozač, putnik ili pešak na javnoj površini, a niste adekvatno naplatili štetu, na
            usluzi smo Vam, da Vam svojim znanjem, stručnošću pomognemo.
            <br />
            <br />
            Postupak naplate štete:
            <br />
            <br />
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
          </p>

          <h2 className={classes.title}>NESPORNI DEO ŠTETE</h2>

          <p className={classes.text}>
            Oštećeni ima pravo da prihvati ponuđenu naknadu od osiguravajućeg društva kao nesporni deo štete, čime ne gubi pravo na prigovor i potraživanje spornog dela naknade.
          </p>

          <h2 className={classes.title}>USLOVI ZA NAKNADU ŠTETE U SAOBRAĆAJU DRUGOM LICU</h2>

          <p className={classes.text}>
            U sledećim slučajevima, osiguravajuća kuća će ući u postupak priznanja štete od strane svog klijenta, po osnovu osiguranja od autoodgovornosti:
            <br />
            <br />
            <ul>
              <li>Vozač mora posedovati vozačku dozvolu,</li>
              <li>Vozač ne sme upravljati vozilom pod dejstvom alkohola, ili drugih nedozvoljenih supstanci,</li>
              <li>Vozač ne sme počiniti saobraćajnu nezgodu nemerno,</li>
              <li>Vozač ne sme napustiti mesto nezgode samovoljno,</li>
              <li>Vozač ne sme upotrebljavati vozilom u druge svrhe, kao što je to naznačeno u saobraćajnoj, i</li>
              <li>Vozilo mora biti tehnički ispavno, ako je učestvovalo u saobraćajnoj nezgodi.</li>
            </ul>
            <br />
            <br />
            <b> Vozač mora biti kriv za izazvanu saobraćajnu nezgodu.</b>
            <br />
            <br />U sledećim slučajevima, osiguravajuća kuća će ući u postupak priznanja štete od strane svog klijenta, po osnovu osiguranja od autoodgovornosti:
            <br />
            <br />
            <ul>
              <li>ako vozač nije koristio motorno vozilo u skladu sa njegovom namenom;</li>
              <li>ako vozač nije imao vozačku dozvolu za upravljanje motornim vozilom određene kategorije;</li>
              <li>ako je vozaču oduzeta vozačka dozvola ili je isključen iz saobraćaja;</li>
              <li>ako je vozač upravljao motornim vozilom pod uticajem alkohola, opojnih droga, odnosno zabranjenih lekova ili drugih psihoaktivnih supstanci;</li>
              <li>ako je vozač štetu prouzrokovao sa namerom;</li>
              <li>ako je šteta nastala zbog toga što je motorno vozilo bilo tehnički neispravno, a ta je okolnost vozaču vozila bila poznata;</li>
              <li>ako je vozač posle saobraćajne nezgode napustio mesto događaja.</li>
            </ul>
          </p>
        </div>

        <div id="contact-form"></div>
        <ContactForm />
      </main>

      <Footer />
    </Fragment>
  );
};

export default PrijavaINaknadaStete;
