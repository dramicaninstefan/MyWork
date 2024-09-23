import { Fragment } from 'react';

import Hero from './Hero/Hero';
import Features from './Features/Features';
import FAQ from '../../UI/FAQ/FAQ';
// import SteteForm from './SteteForm/SteteForm';
import ContactForm from '../../UI/ContactForm/ContactForm';
import Counter from '../../UI/Counter/Counter';
import InfiniteLooper from '../../UI/InfiniteLooper/InfiniteLooper';

import image from '../../../assets/img/stete-c-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Kada zastareva šteta iz osiguranja, zakonski rok?',
    answer: `Zahtev za naknadu štete iz osiguranja može se podneti u roku od 3 godine od kada je oštećeni saznao za štetu i štetnika (onaj ko ga je oštetio). Pravo oštećenog da potražuje naknadu štete zastareva u konačnosti u roku od 5 godina od nastanka štete.`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Na koji način vršimo naplatu štete?',
    answer:
      'Isprva se obraćamo osiguravajućoj kući zahtevom za naknadu štete, jer je njihov klijent (štetnik) kriv za načinjenu štetu, i to se zove vansudski postupak. Ako ne uspemo mirnim putem da naplatimo štetu, pokrećemo sudski postupak.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Za koje vreme mogu da očekujem da naplatim štetu?',
    answer:
      'Ukoliko je sve čisto, kada je potrebno prikupiti i dostaviti odgovarajuću dokumentaciju, postoje zakonski rokovi do kada osiguravajuća kuća mora da isplati naknadu štete (14 dana). Mada, sve zavisi od slučaja do slučaja. Tako da neki slučajevi mogu i brže biti isplaćeni. Ako se krene u sudski postupak, to ide sporije.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 4,
    question: 'Kada se isplaćuje naknada štete iz osiguranja?',
    answer:
      'Naknada štete se isplaćuje kada se kompletira dokumentacija za isplatu, za likvidaciju štete. Potrebno je prikupiti i dostaviti svu potrebnu dokumentaciju. Po zakonu to je 14 dana. Naravno, postoje različiti slučajevi, manje ili više komplikovani, te od komplikovanosti zavisi i vreme za isplatu štete.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 5,
    question: 'Šta da uradim kada me udari nepoznato vozilo?',
    answer:
      'Obavezno pozovite policiju, da napravi zapisnik. Posle toga pozovite nas, da mi sačinimo “zapisnik”, kako bi bili spremni za slučaj kada policija pronađe onog ko Vas je udario (štetnika), jer tada ćemo moći da naplatimo štetu. <br/> Inače, ako se ne zna ko Vas je udario, nećete moći da naplatite štetu. U ovim situacija ne vredi polisa autoodgovornosti (mala polisa za registraciju).',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 6,
    question: 'Udarilo me je vozilo koje nije osigurano! Da li imam pravo da naplatim štetu?',
    answer:
      'Da, imate. Ukoliko se zapisnikom policije utvdi, da vozilo koje Vas je oštetilo, nije osigurano, u tom slučaju imate pravo naknade štet preko Garantnog fonda pri Udruženju osiguravača Srbije.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 7,
    question: 'Da li imam pravo da naplatim štetu usled pada drveta?',
    answer:
      'Za svako drvo u gradu postoji “vlasnik”, koji je dužan da se na pravi način stara o njemu. To staranje podrazumeva, da sva šteta koju to drvo bude napravilo, vlasnik snosi posledice. Tako da, ako Vam je palo drvo, javite sa nama, jer mi lako možemo da saznamo ko je “vlasnik” drveta, kome ćemo se obratiti za naknadu šte. A većina vlasnika, ima ugovoreno osiguranje za svoje propuste, i u tom slučaju ćemo naplatu štete raditi od osiguravajuće kuće.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 8,
    question: 'Da li imam pravo da naplatim štetu od ujeda pasa?',
    answer:
      'Da, imate. <br/> Vlasnik pasa je odgovoran za svog psa, za ujed. Tako da, naplata šte od ujeda pasa se vrši od vlasnika. Što se tiče pasa lutalica, “vlasnik” tih pasa je grad. U tom slučaju, obraćamo se gradu za naknadu štete. <br/> Naravno, određena procedura se mora ispoštovati. <br/> Zato je najbolje, ako Vam se desi takav slučaj, da nas kontaktirate, kako bi Vas tačno uputili šta treba dalje da se radi.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 9,
    question: 'Da li imam pravo da naplatim štete od predmeta koji je u toku vožnje pao sa drugog vozila?',
    answer:
      'Sve što padne sa drugog vozila (razni predmeti, led, kamen, drvo, plastika, guma i drugo), smatra se sastavnim delom tog vozila i smatra se da je to vozilo odgovorno za nastalu štetu. A svako, registrovano vozilo ima polisu autoodgovornosti, tako da naplata štete ide preko te polise, od njegovog osiguranja. Naravno, za tako neki događaj, potrebni su i materijalni dokazi, potreban je zapisnik policije.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 10,
    question: 'Da li imam pravo na naplatu štete prilikom sudara sa pijanim vozačem vozila, vozačem koji je pod dejstvom alkohola, a vozilo je redovno registrovano-osigurano?',
    answer:
      'Da, imate. <br/> Osiguravajuća kuća koje je osigurala vozilo, isplati će štetu koja je načinjena. Pošto je vozač vozila bio u saobraćajnom (zakonskom) prekršaju, osiguravajuća kuća će regresirati (naplatiti) tu isplatu od vozača vozila koje je napravilo štetu.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 11,
    question: 'Šta da radim kada me ujede pas lutalica?',
    answer:
      'Prvo što treba da uradite, je da se obratite medicinskoj ustanovi, da Vam saniraju povredu, da sačine zapisnik o dešavanju. Nakon toga, obično po službenoj dužnosti, medicinska ustanova je dužna da pozove policiju da oni sačine zapisnik o dešavanju. Na posletku, potrebno je da se javite Veterinaskoj ustanovi koja je zadužena taj grad, da ih obavesite o dešavanju. <br/> Ne posletku je potrebno da imate od svih njih zapisnike, koje ćemo kasnije da koristimo kod naplate štete. <br/> Naplatu možemo raditi vansudskim postupkom, i ovi postuci se završavaju prilično brzo. Manjkavost ovakvog postuka je nizak iznos koji grad isplaćuje (dobrovoljno)…, 10.000 – 30.000 rsd. <br/> Nakon ovoga, sudskim putem se mogu potraživati znatno veći iznosi…, za lakše povrede do 100.000 rsd, a za veće i preko 200.000 rsd.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 12,
    question: 'Da li imam pravo da naplatim štetu ako sam upao u rupu na putu?',
    answer:
      'Ako ste upali u rupu i napravili štetu na vozilu i drugo, imate pravo na naplatite štetu od “vlasnika” puta. U tom slučaju je potrebno prikupiti što više dokaza o dešavanju-fotografišite lice mesta, odmah pozovite policiju da sačini zapisnik o dešavanju…, jer će Vam to sve kasnije olakšati mogućnost naplate štete.',
    show: '',
    collapsed: 'collapsed',
  },
];

const NaplataStete = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <main className="main">
        <Hero />
        <Features />
        <Counter image={image} />
        <FAQ data={faq} />
        <ContactForm defaultValue={'Naplata štete'} />
        {/* <SteteForm /> */}
        <InfiniteLooper />
      </main>
    </Fragment>
  );
};

export default NaplataStete;
