<?php
require '../vendor/autoload.php'; // Ako koristiš Composer
use Dompdf\Dompdf;
use Dompdf\Options;

// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


// Provera da li su POST parametri prosleđeni
if (isset($_POST['klijent_id']) && isset($_POST['procenat'])) {
    $klijent_id = $_POST['klijent_id'];
    $procenat = $_POST['procenat']; 

    // SQL upit za uzimanje podataka o klijentu prema ID-u
    $stmt = $conn->prepare("SELECT * FROM klijent WHERE id = ?");
    $stmt->bind_param("i", $klijent_id); // "i" označava integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Provera da li je upit vratio rezultate
    if ($result->num_rows > 0) {
        // Uzimamo podatke iz baze i postavljamo ih u promenljive
        while ($row = $result->fetch_assoc()) {
            $ime_prezime = $row['ime_prezime'];
            $jmbg = $row['jmbg'];
            $adresa = $row['adresa'];
            $mesto = $row['mesto'];
            $telefon = $row['telefon'];
        }
    } else {
        echo "Nema podataka za datog klijenta.";
        exit;
    }
} else {
    echo "Podaci nisu prosleđeni.";
    exit;
}

// Zatvaranje konekcije
$conn->close();


$adv_advokat = "Marija M. Kozomara";
$adv_adresa = "Bulevar Zorana Đinđića 117/4";
$adv_mesto = "Beograd";
$adv_pib = "112969312";
$adv_mb = "57371943";


$options = new Options();
$options->set('defaultFont', 'DejaVu Sans'); // Postavljanje podrazumevanog fonta koji podržava specijalne karaktere
$options->set('isHtml5ParserEnabled', true); // Omogućavanje HTML5 parsera

$dompdf = new Dompdf($options);


// <tr style="border-bottom: 3px solid lightblue;">
//                         <td style="text-align: center;">
//                             <img src="' . $image . '" alt="Logo" style="width: 100px;">
//                         </td>
//                         <td class="header" style="text-align: center; font-weight: bold;">
//                             ADVOKAT<br>
//                         Marija M. Kozomara<br>
//                             Ul. Bulevar Zorana Đinđića 117/4, 11000 Beograd<br>
//                             PIB 112969312 BR 57371943 TIB 65-619310001454-34<br>
//                             e-mail: adv.kozomara@gmail.com
//                         </td>
//                     </tr>

// HTML sadržaj
$html = '
 <div style="width: 100%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 12px;">
                <table>
                    <tr style="border-bottom: 3px solid lightblue;">
                        <td class="header" style="text-align: center; font-weight: bold;" colspan="2">
                            ADVOKAT<br>
                        Marija M. Kozomara<br>
                            Ul. Bulevar Zorana Đinđića 117/4, 11000 Beograd<br>
                            PIB 112969312 BR 57371943 TIB 65-619310001454-34<br>
                            e-mail: adv.kozomara@gmail.com
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="title"
                            style="text-align: center; font-weight: bold; padding-top: 40px; padding-bottom: 40px;">
                            PUNOMOĆJE</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            kojim ovlašćujem advokata Mariju M. Kozomoru, iz Beograda, ul. Bulevar Zorana Đinđića 117/4,
                            da me zastupa u parničnim,
                            vanparničnim, izvršnim i krivičnim postupcima pred svim sudovima, u postupcima pred državnim
                            organima i ustanovama
                            Republike Srbije, osiguravajućim društvima i svim drugim pravnim i fizičkim licima.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            Posebno ga ovlašćujem da u moje ime i za moj račun radi ostvarivanja mog prava na naknadu
                            štete:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>podnosi zahtev za naknadu štete osiguravajućim društvima i drugim obveznicima
                                    naknade u mirnom postupku,</li>
                                <li>preduzima sve pravne radnje i upotrebi sva zakonom predviđena sredstva, a naročito
                                    da podnosi tužbe, ulaže žalbe i druge redovne i vanredne pravne lekove i druge
                                    podneske,</li>
                                <li>sklapa sudska ili vansudska poravnanja,</li>
                                <li>odriče se tužbe i tužbenog zahteva,</li>
                                <li>prima novac i novčane vrednosti na ime ostvarenih advokatskih troškova, na ime
                                    ostvarene naknade u vansudskom</li>
                                <li>i sudskom postupku, kao i da o tome izdaje potvrde</li>
                                <li>preuzima uviđajnu dokumentaciju u osiguravajućim društvima, Udruženju osiguravača
                                    Srbije, nadležnim javim</li>
                                <li>tužilaštvima i sudovima, a povodom saobraćajne nezgode koja se dogodila dana
                                    _________________ , u mestu __________________________________.</li>
                                <li>da u moje ime podnese prigovor _____________ - __________________________ osiguranju
                                    i da preduzima radnje upostupku po tom prigovoru
                                </li>
                                <li>da koristi moje podatke o ličnosti i da mu se isti učine dostupnim, u smislu Zakona
                                    kojim se uređuje zaštita
                                    podataka o ličnosti.</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Napomena: Davalac punomoćja se posebno obavezuje da pribavi i preda advokatu
                            fotokopiju lične karte, fotokopiju kartice
                            tekućeg računa, zapisnika o uviđaju saobraćajne nezgode, fotokopiju medicinske
                            dokumentacije koja se odnosi na
                            povređivanje u konkretnom štetnom događaju, i drugu dokumentaciju koja je potrebna u
                            postupku naknade štete.
                            Nalogodavac ovlašćuje advokata da gore navedenu dokumentaciju može koristiti
                            umnožavati, predati na dalji rad obvezniku
                            naknade, sudu i drugim državnim organima na korišćenje i umnožavanje, kao i čuvanje,
                            a sve u skadu sa čl.3, 10, 15, i 17.
                            Zakona o zaštiti podataka ličnosti.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-bottom: 40px;">
                            Po potrebi, u slučaju sprečenosti, advokat po svome izboru može ovlastiti drugog
                            advokata da ga zameni u preduzimanju
                            pojedinih radnji.
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">U Beogradu, dana: 24. 2. 2025.</td>
                        <td style="vertical-align: top; text-align: center;">
                            <strong>Davalac punomoćja:</strong>
                            <br>
                            <br>
                            <br>
                            <span style="border-top: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 200px;"> ' . $ime_prezime . ' </span>

                            
                            <br>
                            <br>

                           <strong>Br. lične karte / JMBG:</strong>
                            <br>
                            <span style="border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 200px;"> ' . $jmbg . ' </span>
                            <br>
                        </td>
                    </tr>
</table>
</div>

<div style="page-break-before: always;"></div>';


$html .= '<div style="page-break-before: always;"></div>';

$html .= '
<div
    style="width: 100%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 12px;">
    <table>
        <tr>
            <td colspan="2" class="title"
                style="text-align: center; font-weight: bold; padding-top: 40px; padding-bottom: 40px;">
                UGOVOR O ZASTUPANJU</td>
        </tr>

        <tr>
            <td colspan="2">Zaključen dana _________________ godine, u Beogradu, između:</td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                1. VLASTODAVCA: <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;"> ' . $ime_prezime . ' </span>,
                ul. <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 300px;"> ' . $adresa . ' </span>
                <br> Grad <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $mesto . ' </span>
                , Br.l.k./PIB <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $jmbg . ' </span>, 
                Tel. <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $telefon . ' </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                2. ADVOKATA: <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;"> ' . $adv_advokat . ' </span>, 
                ul. <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 300px;"> ' . $adv_adresa . ' </span>
                <br> Grad <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $adv_mesto . ' </span>, 
                PIB <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $adv_pib. ' </span>, 
                MB <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $adv_mb . ' </span>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 1</td>
        </tr>
        <tr>
            <td colspan="2">
                Vlastodavac ovlašćuje Advokata, da u njegovo ime i za njegov račun preduzima sve poslove, po
                sopstvenom uverenju,
                u postupku ostvarenja naknade materijalne i nematerijalne štete, od obveznika naknade štete,
                a povodom štetnog događaja _____________________________
                , koji se dogodio _____________ dana godine.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 2</td>
        </tr>
        <tr>
            <td colspan="2">
                Vlastodavac ovlašćuje Advokata da može po svome izboru angažovati sudske veštake i druga
                stručna pravna i fizička lica,
                radi pripreme dokumentacije za ostvarivanje naknade štete u mirnom ili sudskom postupku.
                Vlastodavac ne snosi nikakve
                troškove ukoliko Advokat nađe da je potrebno da angažuje stručna lica u mirnom postupku.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 3</td>
        </tr>
        <tr>
            <td colspan="2">
                Vlastodavac se obavezuje da na ime naknade za rad Advokata, od svake naplaćene akontacije i
                kasnije ukupno konačno
                naplaćene štete, plati ugovorenu proviziju u visini od 
                <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 80px;"> ' . $procenat . ' % </span> koja uključuje i
                naplaćenu zateznu kamatu,
                najkasnije u roku od 8 dana od dana prijema naplaćenih iznosa.
                Vlastodavac nema nikakvih troškova sve do završetka postupka ostvarivanja naknade štete u
                mirnom postupku.
                Ukoliko obveznik naknade iz nekih razloga odbije da isplati štetu, ni tada Vlastodavac nema
                nikakvih dodatnih
                finansijskih obaveza prema Advokatu.
                Ako se Advokat uključuje u postupak ostvarivanja naknade štete koji nije vodio u
                prvostepenom postupku, ili ako se
                naknada štete potražuje isključivo u sudskom postupku, onda visina provizije iznosi
                <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 80px;"> ' . $procenat . ' % </span> koja uključuje i.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 4</td>
        </tr>
        <tr>
            <td colspan="2">
                Po sporazumu ugovornih strana, iznos štete će biti uplaćen na račun Vlastodavca, a na račun
                Advokata samo u izuzetnim
                situacijama, uz sudski overeno punomoćje od strane Vlastodavca.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 5</td>
        </tr>
        <tr>
            <td colspan="2">
                Ukoliko obveznik naknade štete u mirnom postupku prizna i plati troškove rada lica iz čl.2.
                ovoga ugovora, kao i naknadu
                za rad Advokata, isti troškovi pripadaju Advokatu u mirnom postupku. Troškovi parničnog
                postupka (sudske takse, troškovi
                veštačenja i dr.) pripadaju onome ko ih snosi, a parnični troškovi koje sud prizna na ime
                rada Advokata po A.T. Pripadaju
                isključivo advokatu. Svi ovi troškovi ne ulaze u osnovicu za obračun ugovorene provizije.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 6</td>
        </tr>
        <tr>
            <td colspan="2">
                Vlastodavac se posebno obavezuje da pribavi i preda advokatu fotokopiju lične karte,
                fotokopiju kartice tekućeg računa,
                zapisnika o uviđaju saobraćajne nezgode, fotokopiju medicinske dokumentacije koja se odnosi
                na povređivanje
                u konkretnom štetnom događaju, i drugu dokumentaciju koja je potrebna u postupku naknade
                štete.
                Vlastodavac ovlašćuje Advokata da gore navedenu dokumentaciju može koristiti, umnožavati,
                predati na dalji rad
                obvezniku naknade, sudu i drugim državnim organima na korišćenje i umnožavanje, kao i
                čuvanje, a sve u skadu sa
                Zakonom o zaštiti podataka o ličnosti.
                Vlastodavac se obavezuje da Advokata upozna sa svim stvarnim činjenicama vezanim za štetni
                događaj
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 7</td>
        </tr>
        <tr>
            <td colspan="2">
                Advokat se obavezuje da u ime i za račun Vlastodavca preuzme vršenje poslova iz čl.1. ovog
                Ugovora, u granicama
                svoje registrovane advokatske delatnosti, i profesionalnog odnosa prema poverenom poslu.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 8</td>
        </tr>
        <tr>
            <td colspan="2">
                Advokat je pre potpisivanja ugovora o zastupanju vlastodavcu ukazao da je pretpostavka
                uspešnog zastupanja iskrenost
                klijenta i da je potrebno da mu ovaj iznese sve činjenice i dokaze i otkrije svoje stvarne
                pobude i ciljeve; da je poverljivost
                iznesenih podataka zaštićena obavezom čuvanja advokatske tajne, kao i pod kojim uslovima
                tajna može biti otkrivena.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 9</td>
        </tr>
        <tr>
            <td colspan="2">
                Vlastodavac izjavljuje da ga je Advokat pored svega navedenog u čl. 3. ovog Ugovora upoznao
                sa svojom ocenom
                činjenične i pravne prirode predmeta; vrstom i osnovnim osobinama postupka koji će biti
                primenjen; izgledima i
                mogućnostima za ishod spora, te mogućnošću i celishodnošću rešavanja slučaja mirnim putem i
                da je saglasan da
                u tim okolnostima Advokat preuzme zastupanje.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 10</td>
        </tr>
        <tr>
            <td colspan="2">
                Advokat će redovno usmeno obaveštavati Vlastodavca o stanju poslova, a na pismeni zahtev
                dostaviće i pismeni izveštaj.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 11</td>
        </tr>
        <tr>
            <td colspan="2">
                Svaka ugovorna strana ima pravo na otkaz ugovora sa otkaznim rokom od 15 dana. Obaveštenje o
                otkazu dostavlja se
                suprotnoj strani u pisanoj formi.
                Ukoliko Vlastodavac jednostrano, raskine ovaj ugovor i prekine saradnju sa advokatom, dužan
                je u roku od 8 dana
                Advokatu isplatiti naknadu za sve preduzete radnje u skladu sa Advokatskom tarifom, kao i
                sve troškove koje je Advokat
                imao prema trećim licima koja je angažovao na predmetu, a ukoliko ugovor raskine neposredno
                pre zaključenja
                poravnanja ili donošenja sudske presude, u očiglednoj nameri da izbegne svoju obavezu prema
                Advokatu, dužan je
                isplatiti i proviziju ugovorenu čl. 3 ovog ugovora.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 12</td>
        </tr>
        <tr>
            <td colspan="2">
                Stranke saglasno utvrđuju da će se u delu međusobnih prava i obaveza, koje ovim Ugovorom
                nisu posebno ugovorene,
                kao i u delu prestanka ovog Ugovora, primenjivati važeće odredbe Zakona o obligacionim
                odnosima
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 13</td>
        </tr>
        <tr>
            <td colspan="2">
                Eventualne sporove u vezi sa ovim ugovorom stranke će rešavati na principima dobre volje, a
                u slučaju spora ugovaraju
                nadležnost sudova u Beogradu.
            </td>
        </tr>

        <tr>
            <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                čl. 14</td>
        </tr>
        <tr>
            <td colspan="2"">
                            Ovaj Ugovor je sačinjen u dva ( 2 ) istovetna primerka, i to jedan ( 1 ) za Vlastodavca i
                            jedan ( 1 ) za Advokata, a stupa
                            na snagu kada ga potpišu obe ugovorne strane.
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            

                        </td>
                    </tr>

                    <tr>
                        <td style=" vertical-align: top; text-align: center;">

                <strong>ADVOKAT</strong>
                <br>
                <br>
                ______________________________
            </td>
            <td style="vertical-align: top; text-align: center;">
                <strong>Vlastodavac:</strong>
                <br>
                <br>
                <br>
                <span style="border-top: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 200px;"> ' . $ime_prezime . ' </span>
                <br>
                ' . $jmbg . '
            </td>
        </tr>

    </table>
</div>
';

// Učitavanje HTML-a u Dompdf
$dompdf->loadHtml($html);

// Postavljanje veličine stranice i orijentacije
$dompdf->setPaper('A4', 'portrait');

// Renderovanje PDF-a
$dompdf->render();

// Prikazivanje PDF-a za preuzimanje
$dompdf->stream($ime_prezime . ' Punomoć i Ugovor.pdf', ['Attachment' => true]);