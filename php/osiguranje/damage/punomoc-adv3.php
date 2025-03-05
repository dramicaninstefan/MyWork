<?php
require '../vendor/autoload.php'; // Ako koristiš Composer
use Dompdf\Dompdf;
use Dompdf\Options;

// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


// Provera da li su POST parametri prosleđeni
if (isset($_POST['klijent_id'])) {
    $klijent_id = $_POST['klijent_id'];
    $procenat = $_POST['procenat']; 
    $dinara = $_POST['dinara']; 
    $osig_kuce = $_POST['osig_kuce']; 
    $broj_stete = $_POST['broj_stete']; 
    $created_at = date('d-m-Y'); // trenutni datum i vreme


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
            $telefon = $row['kontakt'];
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


$adv_advokat = "Ozren M. Slović";
$adv_adresa = "Bulevar Zorana Đinđića 54/3 ";
$adv_mesto = "Novi Beograd";
$adv_pib = "111912268";
$adv_mb = "57358084";


$options = new Options();
$options->set('defaultFont', 'Verdana'); // Postavljanje podrazumevanog fonta koji podržava specijalne karaktere
$options->set('isHtml5ParserEnabled', true); // Omogućavanje HTML5 parsera

$dompdf = new Dompdf($options);


// HTML sadržaj
$html = '
 <div
        style="width: 90%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 13px;">
        <table>

            <tr>
                <td colspan="2" class="title"
                    style="text-align: center; font-weight: bold; padding-top: 40px; padding-bottom: 40px;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    P U N O M O Ć J E</td>
            </tr>
            <tr>
                <td colspan="2">
                    Kojim ja <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;">' . $ime_prezime . ' </span> 
                    iz <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;">' . $mesto . ' </span> 
                    JMBG: <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;">' . $jmbg . ' </span>  
                    <b style="margin-right: 5px;">ovlašćujem Ozrena M. Slovića, kao i njegove advokatske pripravnike</b> da u moje ime i za moj račun preduzimaju sve pravne i faktičke radnje pred
                    sudovima, drugim državnim organima i organizacijama, da u moje ime podnosi tužbe, molbe, poreske
                    prijave, predloge i zahteve, ulaže redovne i vanredne pravne lekove, odriče se prava na iste, sklapa
                    poravnanja, provodi izvršenja, predlaže izdavanje privremenih mera, kao i da preduzima sve druge
                    pravne radnje za koje smatra da su u poverenim mu poslovima, u moju korist.
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    Ovo punomoćje je vremenski neogrančiteno do njegovog opoziva.
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Potpisivanjem ovog punomoćja, Vlastodavac daje saglasnost da se svi troškovi vođenih postupaka
                    isplate na racun punomoénika advokata br. 265-1780310001729-95 koji se vodi kod Raiffeisen bank ad
                    Beograd.
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    U slucaju potrebe ovo punomoéje, imenovani moze preneti na drugog advokata ili advokatske
                    pripravnike.
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">U Beogradu, dana: <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; display: inline-block; width: 100px;">
                        ' . $created_at . ' </span>
                <td style="vertical-align: top; text-align: center;">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <strong>VLASTODAVAC:</strong>
                    <br>
                    <br>
                    <br>
                    <span
                        style="border-top: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 200px;">
                        potpis </span>


                    <br>
                </td>
            </tr>
            <tr style="border-bottom: 3px solid lightblue;">
                <td class="header" style="text-align: center; font-size: 11px" colspan="2">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    Bulevar Zorana Dindica 54/3 1 1070 Novi Beograd<br>
                    MB: 57358084, PIB: 111912268, racun br. <b>265-1780310001729-95</b><br>
                    Tel: (+381 64) 94 94 698, e-mail: slovicozren@gmail.com
                </td>
            </tr>
        </table>
    </div>

    <div style="page-break-before: always;"></div>';


    $html .= '<div style="page-break-before: always;"></div>';

    $html .= '
    <div
        style="width: 90%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 12px;">
        <table>
            <tr>
                <td colspan="2" class="title"
                    style="text-align: center; font-weight: bold; padding-top: 40px; padding-bottom: 40px;">
                    UGOVOR O ZASTUPANJU</td>
            </tr>

            <tr>
                <td colspan="2">Zaključen dana <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; display: inline-block; width: 100px;">
                        ' . $created_at . ' </span> godine, u Beogradu, između:</td>
            </tr>
            <tr>
            <tr>
                <td colspan="2">
                    <br>
                    1. VLASTODAVCA: <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;">
                        ' . $ime_prezime . ' </span>,
                    ul. <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 260px;">
                        ' . $adresa . ' </span>
                    <br> Grad <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;">
                        ' . $mesto . ' </span>
                    , Br.l.k./PIB <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;">
                        ' . $jmbg . ' </span>,
                    Tel. <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 150px;">
                        ' . $telefon . ' </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    2. ADVOKATA: <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;">
                        ' . $adv_advokat . ' </span>,
                    ul. <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 300px;">
                        ' . $adv_adresa . ' </span>
                    <br> Grad <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;">
                        ' . $adv_mesto . ' </span>,
                    PIB <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;">
                        ' . $adv_pib. ' </span>,
                    MB <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;">
                        ' . $adv_mb . ' </span>
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
                    <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width:' . (isset($procenat) ? '60px' : '150px')  . ';">
                        ' . (isset($procenat) ? $procenat . ' %' : $dinara . ' dinara') . ' </span> koja uključuje i
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
                    <span
                        style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width:' . (isset($procenat) ? '60px' : '150px')  . ';">
                        ' . (isset($procenat) ? $procenat . ' %' : $dinara . ' dinara') . '</span>.
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
                    <strong>VLASTODAVAC:</strong>
                    <br>
                    <br>
                    <br>
                    <span
                        style="border-top: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 200px;">
                        ' . $ime_prezime . ' </span>
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