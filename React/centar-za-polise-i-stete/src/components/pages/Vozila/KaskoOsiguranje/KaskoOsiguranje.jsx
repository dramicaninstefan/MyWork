import { Fragment, useState } from 'react';

import Hero from './Hero/Hero';

import FAQ from '../../../UI/FAQ/FAQ';
import Modal from '../../../UI/Modal/Modal';
import Features from './Features/Features';
import KaskoForm from './KaskoForm/KaskoForm';
import Counter from '../../../UI/Counter/Counter';
import InfiniteLooper from '../../../UI/InfiniteLooper/InfiniteLooper';

import image from '../../../../assets/img/kasko-counter-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Da li može da se kasko osigura neregistrovano vozilo?',
    answer: `Ne može!<br/>Neregistrovano vozilo nije moguće kasko osigurati. Evetnualno je moguće osigurati neregistrovano vozilo kao zalihe pravnom licu koje se, npr bavi prodajom vozila. Kasko osiguranje ne važi za neregistrovana vozila.`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Kasko osiguranje prilikom promene vlasništva?',
    answer: `Kada se promeni vlasništvo nad vozilom, automatski se prekida pokriće po kasko polisi. <br/>Tačnije, pokriće važi samo za vlasnika za kojeg je ugovoreno osiguranje, te se promenom po prekida. U toj situaciji, moguće je prekinuti polisu i povratiti višak uplaćenih sredstava.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Datum registracije vozila i kasko osiguranje?',
    answer: `Ova dva datuma nisu povezana.<br/>Može se kasko osigurati vozilo iako je već krenuo datum registracije vozila.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 4,
    question: 'Šta je Učešće u šteti?',
    answer: `Učešće u šteti je deo štete koji moramo sami da platimo iz svog džepa, obavezno je kod svake polise. Ugovarač osiguranja bira učešće u šteti, jer je obično u ponudi više varijanti (5 %, 10 %, 20 %, 50 Eur, 100 Eur, 150 Eur, 200 Eur, 300 Eur i dr. i obično je kombinacija % i Eur). Ukoliko izabarete veće učešć u šteti, imaćete manju premiju za plaćanje-cenu…, ali ćete više platiti kada se desi šteta.<br/>U izuzetnim slučajevima je moguće ugovoriti kasko bez učešća u šteti (za “veće” klijente osiguravajuća kuća može da proceni da može da da takvu ponudu).<br/>CENTAR ZA POLISE I ŠTETE će Vam organizovati ceo postupak, javite nam se.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 5,
    question: 'Koliko imam prava da naplatim štetu godišnje preko kasko osiguranja?',
    answer: `Ne postoji ograničenje u broju štete koji ćete naplatiti u toku godine. Postoji ograničenje na dve štete za dogovorenu premiju. Svaka naplata štete preko dve, koštaće Vas dodatno na ugovorenu premiju-moraćete da doplatite određeni procenat od dogovorene premije (50%, 100%, 150% na premiju, zavisno od broja štete koji prijavljujete).`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 6,
    question: 'Kako sve mogu da popravim vozilo preko kasko osiguranja?',
    answer: `<p>Na 3 načina možete popraviti vozilo!</p><ol><li>U ovlašćenom servisu, gde Vas pošalje osiguravajuća kuća,</li><li>U svom servisu, odakle ćete doneti račun koji ste platitli, da ga refundirate i</li><li>Po kalkulaciji-za KEŠ – stvar dogovora sa osiguravajućom kućom, popravljate gde i kako želite (ili i ne popravljate ako želite).</li></ol>`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 7,
    question: 'Da li se popravka vozila vrši u ovlašćenom servisu?',
    answer: `Da, osiguravajuće kuće imaju dogovorene ugovore sa svim ovlašćenim servisima.`,
    show: '',
    collapsed: 'collapsed',
  },

  {
    id: 8,
    question: 'Da li mogu da prenesem popust - BONUS iz jedne osiguravajuće kuće u drugu?',
    answer: `Da možete!<br/>Ukoliko niste naplaćivali štetu po kasko polisi, sledeće godine Vam sleduje popust prilikom obnove (obično 10% po godini nekorišećenja polise). Ukoliko iz bilo kog razloga želite da promenite osiguravajuću kuću, imate pravo od osiguavajuće kuće da tražite Potvrdu da po određenoj polisi niste imali naplatu štete i sa tom potvrdom da pređete u drugu osiguravajuću kuće, gde će Vam uvažiti popust.<br/>CENTAR ZA POLISE I ŠTETE će Vam organizovati ceo postupak, javite nam se.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 9,
    question: 'Da li se kasko osiguranje može naplatiti bez policijskog zapisnika?',
    answer: `Kod većine osiguravajućih kuća na samoj polisi ili u uslovima osiguranja, piše, da je ugovarač osiguranja obavezan da pozove policiju da dođe na lice mesta, da sačine službenu belešku, kako bi se utvrdile činjenice o dešavanju nezgode, a ponajviše za utvrđivanje alkoholisanosti vozača (jer u tom slučaju ne važi kasko osiguranje). Zato je preporuka, da obavezno pozovete policiju kako bi se izbegla svaka sumnja.<br/>Naravno, preporuka je ako imate situaciju sa vozilom, da odmah kontaktirate CENTAR ZA POLISE I ŠTETE, kako bi ste dobili savet na licu mesta.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 10,
    question: 'Kasko osiguranje za električno vozilo?',
    answer: `Može se osigurati električno vozilo, bez problema.<br/>Ali je u Srbiji problem to što ne postoji ovlašćeni servis za električna vozila, što bi daleko poskupelo uslugu popravke vozila za slučaj nezgode (npr u Hrvatskoj), pored niz drugih teško premostivih stvari…, te iz tog razloga osiguavajuće kuće neće da daju ponudu za kasko osiguranje električnh vozila.<br/>CENTAR ZA POLISE I ŠTETE će Vam organizovati ceo postupak, javite nam se.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 11,
    question: 'Šta je to utaja vozila kod kasko osiguranja?',
    answer: `Utaja spade u dopunsko pokriće kasko osiguranja, posebno se ugovara. To “krađa vozila koje nije ukradeno”.<br/>To se dešava kod rent a car vozila, gde se vozilo zvanično rentira klijentu, npr na 5 dana i posle tog vremena klijent ne želi da vrati vozilo. U tom slučaju rent a car ima pravo na naknadu štete.`,
    show: '',
    collapsed: 'collapsed',
  },

  {
    id: 12,
    question: 'Da li kasko osiguranje važi sa isteklom vozačkom dozvolom?',
    answer: `Ne važi!<br/>Jer u uslovima osiguranja piše da se gubi pravo na naknadu štete ukoliko šteta nastane "Dok vozilom upravlja lice bez odgovarajuće vozačke dozvole za upravljanje motornim vozilom određene kategorije..."`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 13,
    question: 'Kasko osiguranje vozila na lizing?',
    answer: `Kod lizinga, vlasnik vozila je lizing kuća, ne Vi, a zakonsko pravo na kasko naknadu štete po osiguranju ima samo vlasnik vozila, te u tom slučaju naknada štete pripada lizing kući.<br/>Naravno, ako ste u korektnom odnosu sa lizing kućom (između ostalog redovno im plaćate ratu), lizig kuća će dati saglasnost da naknadu dobijete Vi, kako bi popravili vozilo.<br/>CENTAR ZA POLISE I ŠTETE će Vam organizovati ceo postupak, javite nam se.`,
    show: '',
    collapsed: 'collapsed',
  },

  {
    id: 14,
    question: 'Koliko vozila se ukrade u Srbiji godišnje?',
    answer: `U Srbiji, prema statistici, ukrade se oko 2.500 vozila godišnje. Ne mala statistika da ne osigurate svoje vozilo kasko polisom od krađe.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 15,
    question: 'Zašto da osiguram kasko osiguranje, ako se ne plašim da će mi ukrasti vozilo?',
    answer: `Zato što zamena samo jednog dela na vozilu može da iznosi daleko više od cene kasko osiguranja. Pride, tu cenu možete da platite na 12 rata. Možete je platiti i odjednom sa popustom.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 16,
    question: 'Koliko se često dešava oštećenja vozila na parkingu?',
    answer: `Dešava se često da odemo do vozila koje smo ostavili na parkingu, da je oštećeno. U toj situaciji, ako ne znate ko je počinilac, kasko osiguranje će pokriti štetu. Idealno bi bilo kada bi ste znali ko je počinilac, da štetu naplatite po njegovoj polisi koju ima za registraciju vozila (obavezna polisa autoodgovornosti).`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 17,
    question: 'Da li mi kasko osiguranje pokriva štetu ako sam u saobraćajnom prekršaju, pod dejstvom alkohola, prešao na crveno svetlo?',
    answer: `Ne porkiva!<br/>Jer osiguravač nije u obavezi da nadoknadi štetu i troškove koji su nastali usled upravljanja vozilom od strane vozača pod dejstvom alkohola, droge i drugih narkotika, kao i pri prelasku na crveno svetlo i drugo`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 18,
    question: 'Na koji period je moguće zaključiti kasko osiguranje?',
    answer: `<p>Kasko osiguranje može se ugovoriti sa sledećim rokovima trajanja:</p>
    <ul style="list-style: none; padding: 0;">
      <li>
        <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
        Kratkoročno – jednogodišnje i,
      </li>
      <li>
        <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
        Višegodišnje sa određenim ili neodređnim rokom trajanja (rok mora biti duži od godinu dana)
      </li>
    </ul>`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 19,
    question: 'Koje se vrste vozila mogu zaštititi?',
    answer: 'Mogu se zaštititi sve vrste kopnenih motornih vozila standardne izrade, kao i priključna, specijalna i radna vozila, motocikli, šinska vozila, radne mašine i njihovi sastavni delovi.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 20,
    question: 'Kako često dolazi do oštećenja na vozilu?',
    answer: 'Često se dešava da vozilo zateknemo oštećeno na parkingu, ako nemamo kasko moramo sami platiti štetu.',
    show: '',
    collapsed: 'collapsed',
  },
];

const KaskoOsiguranje = () => {
  window.scrollTo(0, 0);

  const [isClicked, setIsClicked] = useState(false);

  const handleIsClicked = () => {
    setIsClicked((current) => !current);
  };

  return (
    <Fragment>
      <main className="main">
        <Hero handleClick={handleIsClicked} />
        <Features />
        <Counter image={image} />
        <FAQ data={faq} />
        <KaskoForm />
        <InfiniteLooper />
        {isClicked ? <Modal handleClick={handleIsClicked} /> : undefined}
      </main>
    </Fragment>
  );
};

export default KaskoOsiguranje;
