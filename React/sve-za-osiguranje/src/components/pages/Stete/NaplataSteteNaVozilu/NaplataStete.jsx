import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import CallUs from '../../../UI/CallUs';
import ViberUs from '../../../UI/ViberUs';
import SocialIcons from '../../../UI/SocialIcons';
import ToTop from '../../../UI/ToTop';

import classes from './NaplataStete.module.css';

const NaplataStete = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--hero-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.hero}>
          <div className={classes.content}>
            <h2 className={classes['small-title']}>NAPLATA-NAKNADA ŠTETE NA VOZILU</h2>
            <h1 className={classes['title']}>
              NAPLATA-NAKNADA ŠTETE <br /> NA VOZILU<span>.</span>
            </h1>
          </div>
        </div>

        <div className={classes.info1}>
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
          </p>

          <h2 className={classes.title}>Kako naplatiti štetu od udesa od osiguravajuće kuće</h2>

          <p className={classes.text}>
            Često osiguravajuće kuće ne priznaju štete koje su načinili njihovi klijenti, ističu doprinos šteti oštećenog, ili jednostavno pokušavaju da umanje svoju obavezu.
            <br />U takvim slučajevima, obratit se nama za savet, kako bi ste na najbolji način naplatili štetu.
          </p>
        </div>

        <div id="contact-form"></div>
        <ContactForm />

        <SocialIcons />

        <ViberUs />
        <CallUs />
        <ToTop />
      </main>

      <Footer />
    </Fragment>
  );
};

export default NaplataStete;
