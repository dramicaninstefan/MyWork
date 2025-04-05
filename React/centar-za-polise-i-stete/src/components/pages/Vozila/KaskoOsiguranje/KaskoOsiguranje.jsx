import { Fragment, useState, useEffect } from 'react';
import { Helmet } from 'react-helmet';

import Hero from './Hero/Hero';

import FAQ from '../../../UI/FAQ/FAQ';
import Modal from '../../../UI/Modal/Modal';
import ModalKasko from '../../../UI/ModalKasko/ModalKasko';
import Features from './Features/Features';
import KaskoForm from './KaskoForm/KaskoForm';
import Counter from '../../../UI/Counter/Counter';
import InfiniteLooper from '../../../UI/InfiniteLooper/InfiniteLooper';
import ModalButtonKasko from '../../../UI/ModalKasko/ModalButtonKasko/ModalButtonKasko';

import image from '../../../../assets/img/kasko-counter-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Da li može da se kasko osigura neregistrovano vozilo?',
    answer: `Ne može!
            </br>
            </br>
            Neregistrovano vozilo nije moguće kasko osigurati. Eventualno je moguće osigurati neregistrovano vozilo kao zalihe pravnom licu koje se, npr bavi prodajom vozila. Kasko osiguranje ne važi za neregistrovana vozila.`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Da li se kasko osiguranje prenosi prilikom promene vlasništva?',
    answer: `Kada se promeni vlasništvo nad vozilom, automatski se prekida pokriće po kasko polisi.
Tačnije, pokriće važi samo za vlasnika za kojeg je ugovoreno osiguranje, te se promenom prekida. U toj situaciji, moguće je prekinuti polisu i povratiti višak uplaćenih sredstava.
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Da li su datum registracije vozila i kasko osiguranje povezani?',
    answer: `Ova dva datuma nisu povezana.
    </br>
            </br>
Vozilo se može kasko osigurati iako je već krenuo datum registracije vozila.
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 4,
    question: 'Šta je učešće u šteti?',
    answer: `Učešće u šteti je <b>deo štete koji moramo sami da platimo</b> i obavezno je kod svake polise. Ugovarač osiguranja bira učešće u šteti, jer je obično u ponudi više varijanti (5 %, 10 %, 20 %, 50 €, 100 €, 150 €, 200 €, 300 € i dr. i obično je kombinacija % i €). Ukoliko izaberete veće učešće u šteti, imaćete manju premiju za plaćanje, ali ćete više platiti kada se desi šteta.
</br>
            </br>
    U izuzetnim slučajevima je moguće ugovoriti kasko bez učešća u šteti (<b>za “veće” klijente</b> osiguravajuća kuća može da proceni da može da da takvu ponudu).
    </br>
            </br>
CENTAR ZA POLISE I ŠTETE će vam organizovati ceo postupak, javite nam se.

`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 5,
    question: 'Koliko puta godišnje imam prava da naplatim štetu preko kasko osiguranja?',
    answer: `<b>Ne postoji ograničenje</b> u broju štete koji ćete naplatiti u toku godine. Postoji ograničenje na dve štete za dogovorenu premiju. Svaka naplata štete preko dve, koštaće vas dodatno na ugovorenu premiju. Odnosno, moraćete da doplatite određeni procenat od dogovorene premije (50 %, 100 % ili 150 % na premiju, zavisno od broja štete koji prijavljujete).
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 6,
    question: 'Kako sve mogu da popravim vozilo preko kasko osiguranja?',
    answer: `<p>Vozilo možete popraviti na tri načina:</p><ol><li>U ovlašćenom servisu, gde vas pošalje osiguravajuća kuća,
</li><li>U svom servisu, odakle ćete doneti račun koji ste platili, da ga refundirate,
</li><li>Po kalkulaciji (za KEŠ) – stvar dogovora sa osiguravajućom kućom, popravljate gde i kako želite (ili i ne popravljate ako ne želite).
</li></ol>`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 7,
    question: 'Da li se popravka vozila vrši u ovlašćenom servisu?',
    answer: `Da, osiguravajuće kuće imaju <b>dogovorene ugovore</b> sa svim ovlašćenim servisima.`,
    show: '',
    collapsed: 'collapsed',
  },

  {
    id: 8,
    question: 'Da li mogu da prenesem popust - BONUS iz jedne osiguravajuće kuće u drugu?',
    answer: `Da. Ukoliko niste naplaćivali štetu po kasko polisi, sledeće godine vam sleduje <b>popust prilikom obnove</b> (obično 10% po godini nekorišćenja polise). Ukoliko iz bilo kog razloga želite da promenite osiguravajuću kuću, imate pravo od osiguravajuće kuće da tražite Potvrdu da po određenoj polisi niste imali naplatu štete i sa tom potvrdom da pređete u drugu osiguravajuću kuće, gde će vam uvažiti popust.
    </br>
    </br>
    CENTAR ZA POLISE I ŠTETE će vam organizovati ceo postupak, javite nam se.
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 9,
    question: 'Da li se kasko osiguranje može naplatiti bez policijskog zapisnika?',
    answer: `Kod većine osiguravajućih kuća na samoj polisi ili u uslovima osiguranja, piše, da je ugovarač osiguranja <b>obavezan da pozove policiju</b> da dođe na lice mesta, da sačine službenu belešku, kako bi se utvrdile činjenice o dešavanju nezgode, a ponajviše za utvrđivanje alkoholisanosti vozača (jer u tom slučaju ne važi kasko osiguranje). Zato je preporuka, da obavezno pozovete policiju kako bi se izbegla svaka sumnja.
    </br>
    </br>
Naravno, preporuka je ako imate situaciju sa vozilom, da odmah kontaktirate CENTAR ZA POLISE I ŠTETE, kako bi ste dobili savet na licu mesta.
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 10,
    question: 'Da li postoji kasko osiguranje za električno vozilo?',
    answer: `Da, električno vozilo može se kasko osigurati bez problema.
    </br>
    </br>
Međutim, u Srbiji je problem to što ne postoji ovlašćeni servis za električna vozila, što bi daleko poskupelo uslugu popravke vozila za slučaj nezgode (npr u Hrvatskoj), pored niza drugih teško premostivih prepreka…, te iz tog razloga osiguravajuće kuće uglavnom ne daju ponudu za kasko osiguranje električnih vozila.
</br>
    </br>
CENTAR ZA POLISE I ŠTETE će vam organizovati ceo postupak, javite nam se.
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 11,
    question: 'Šta je utaja vozila kod kasko osiguranja?',
    answer: `Utaja spada u dopunsko pokriće kasko osiguranja i posebno se ugovara. Dešava se kod rent a car vozila, gde se vozilo zvanično rentira klijentu, npr na 5 dana i posle tog vremena <b>klijent odbija da vrati vozilo.</b> U tom slučaju rent a car ima pravo na naknadu štete.
`,
    show: '',
    collapsed: 'collapsed',
  },

  {
    id: 12,
    question: 'Da li kasko osiguranje važi sa isteklom vozačkom dozvolom?',
    answer: `Ne važi! U uslovima osiguranja je navedeno da se gubi pravo na naknadu štete ukoliko šteta nastane "Dok vozilom upravlja lice bez odgovarajuće vozačke dozvole za upravljanje motornim vozilom određene kategorije..."`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 13,
    question: 'Da li se može uzeti kasko osiguranje vozila na lizing?',
    answer: `Kod lizinga, vlasnik vozila je lizing kuća, ne vi, a zakonsko pravo na kasko naknadu štete po osiguranju ima samo vlasnik vozila, te u tom slučaju <b>naknada štete pripada lizing kući</b>.
    </br>
    </br>
    Naravno, ako ste u korektnom odnosu sa lizing kućom (između ostalog redovno im plaćate ratu), lizing kuća će dati saglasnost da naknadu dobijete Vi, kako bi popravili vozilo.
    </br>
    </br>
CENTAR ZA POLISE I ŠTETE će vam organizovati ceo postupak, javite nam se.

`,
    show: '',
    collapsed: 'collapsed',
  },

  {
    id: 14,
    question: 'Koliko vozila se ukrade u Srbiji godišnje?',
    answer: `U Srbiji, prema statistici, ukrade se oko <b>2.500 vozila godišnje</b>. Ne mala statistika da ne osigurate svoje vozilo kasko polisom od krađe.`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 15,
    question: 'Zašto da osiguram kasko osiguranje, ako se ne plašim da će mi ukrasti vozilo?',
    answer: `Zato što zamena samo jednog dela na vozilu može da iznosi daleko više od cene kasko osiguranja. Pride, tu cenu možete da platite na 12 rata. Možete je platiti i odjednom sa popustom.
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 16,
    question: 'Koliko se često dešava oštećenja vozila na parkingu?',
    answer: `Često se desi da odemo do vozila koje smo ostavili na parkingu i shvatimo da je oštećeno. U toj situaciji <b>kasko osiguranje će pokriti štetu čak i ako ne znate ko je počinilac</b>. Ipak, idealno bi bilo kada biste uspeli da saznate jer se onda šteta može naplatiti po njegovoj polisi koju ima za registraciju vozila (obavezna polisa autoodgovornosti).
`,
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 17,
    question: 'Da li mi kasko osiguranje pokriva štetu ako sam u saobraćajnom prekršaju, pod dejstvom alkohola, prešao na crveno svetlo?',
    answer: `<b>Ne pokriva.</b> Osiguravač nije u obavezi da nadoknadi štetu i troškove koji su nastali usled upravljanja vozilom od strane vozača pod dejstvom alkohola, droge i drugih narkotika, kao ni pri prelasku na crveno svetlo i usred sličnih saobraćajnih prekršaja.
`,
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
         Kratkoročno – jednogodišnje;
      </li>
      <li>
        <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
        Višegodišnje sa određenim ili neodređnim rokom trajanja (rok mora biti duži od godinu dana).
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
    question: 'Koliko često dolazi do oštećenja na vozilu?',
    answer: 'Često se dešava da vozilo zateknemo oštećeno na parkingu, a ako nemamo kasko moramo sami platiti štetu.',
    show: '',
    collapsed: 'collapsed',
  },
];

const KaskoOsiguranje = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const [screenWidth, setScreenWidth] = useState(window.innerWidth);
  const [showInfinte, setShowInfinte] = useState(false);

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
    screenWidth < 1200 ? setShowInfinte(true) : setShowInfinte(false);
  }, [screenWidth]);

  const [isClicked, setIsClicked] = useState(false);
  const [isClickedKasko, setIsClickedKasko] = useState(false);

  const handleIsClicked = () => {
    setIsClicked((current) => !current);
  };

  const handleIsClickedKasko = () => {
    setIsClickedKasko((current) => !current);
  };

  return (
    <Fragment>
      <main className="main">
        <Helmet>
          <title>Kasko osiguranje - Centar za polise i štete</title>
          <meta name="description" content="Kasko osiguranje je najsigurniji vid zaštite vozila. Ne prepuštajte ništa slučaju! Zaštitite sebe i svoj automobil - pokrijte svaki neplaniran trošak." />
        </Helmet>
        <Hero handleClick={handleIsClicked} />
        <ModalButtonKasko handleClick={handleIsClickedKasko} />
        <Features />
        <Counter image={image} />
        <FAQ data={faq} />
        <KaskoForm />
        {showInfinte ? `` : <InfiniteLooper />}

        {isClicked ? <Modal handleClick={handleIsClicked} /> : undefined}
        {isClickedKasko ? <ModalKasko handleClick={handleIsClickedKasko} /> : undefined}
      </main>
    </Fragment>
  );
};

export default KaskoOsiguranje;
