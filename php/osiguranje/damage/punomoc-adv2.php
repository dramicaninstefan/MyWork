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


$adv_advokat = "Strahinja Mavrenski, advokat";
// $adv_adresa = "Bulevar Zorana Đinđića 117/4";
// $adv_mesto = "Beograd";
// $adv_pib = "112969312";
// $adv_mb = "57371943";


$options = new Options();
$options->set('defaultFont', 'DejaVu Sans'); // Postavljanje podrazumevanog fonta koji podržava specijalne karaktere
$options->set('isHtml5ParserEnabled', true); // Omogućavanje HTML5 parsera

$dompdf = new Dompdf($options);




// HTML sadržaj
$html = '
 <div
        style="width: 100%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 15px;">
        <table>

            <tr>
                <td colspan="2" class="title"
                    style="text-align: center; font-weight: bold; padding-top: 40px; padding-bottom: 40px;">
                    PUNOMOĆJE</td>
            </tr>
            <tr>
                <td colspan="2">
                    Kojim ovlašćujem Zajedničku advokatsku kancelariju Mavrenski i saradnici, i to Mavrenski Strahinju,
                    Jovančić Strahinju i Janićijević Anđelu, advokate u Beogradu, ul. Kraljice Marije br. 12/III/14 da
                    me u celosti zastupaju u svim mojim pravnim poslovima – pred svim sudovima, državnim organima i
                    trećim licima, da u moje ime podižu i povlače tužbe, priznaju ili se odriču od tužbenih zahteva,
                    zaključuju poravnanja, podnose pravne lekove i od istih odustaju ili ih se odriču, predlažu
                    izdavanje privremenih mera obezbeđenja, preduzimaju radnje u izvršnom postupku i sve druge pravne
                    radnje za koje nađu da u poverenim zastupanjima idu u moju korist.
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    U slučaju potrebe ovo punomoćje prenosivo je na drugog advokata, koga advokat Mavrenski Strahinja,
                    Jovančić Strahinja i Janićijević Anđela odrede, kao i na advokatskog pripravnika zaposlenog kod
                    ovlašćenih advokata.
                    <br>

                    <br>

                    <br>

                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">
                    U Beogradu, dana: <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; display: inline-block; width: 100px;"> ' . $created_at . ' </span>
                </td>
                <td style="vertical-align: top; text-align: center;">
                    <strong>DAVALAC PUNOMOĆJA:</strong>
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

    <div style="page-break-before: always;"></div>';


    $html .= '<div style="page-break-before: always;"></div>';

    $html .= '
    <div
        style="width: 100%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 15px;">
        <table>
            <tr>
                <td colspan="2" class="title"
                    style="text-align: center; font-weight: bold; padding-top: 40px; padding-bottom: 40px;">
                    UGOVOR O ZASTUPANJU</td>
            </tr>

            <tr>
                <td colspan="2">Zaključen u Beogradu dana <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; display: inline-block; width: 100px;"> ' . $created_at . ' </span> godine, između ugovornih strana:</td>
            </tr>
            <tr>
                <td colspan="2">
                <br>
                1. VLASTODAVCA: <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;"> ' . $ime_prezime . ' </span>,
                ul. <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 300px;"> ' . $adresa . ' </span>
                <br> Grad <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 100px;"> ' . $mesto . ' </span>
                , Br.l.k./PIB <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 200px;"> ' . $jmbg . ' </span>, 
                Tel. <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px;  display: inline-block; width: 150px;"> ' . $telefon . ' </span>
            </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    2. Zajedničke advokatske kancelarije Mavrenski i saradnici, sa adresom sedišta ZAK MNA u Beogradu,
                    Palilula, u ul. Kraljice Marije br.12/III/14, čiji je zastupnik Strahinja Mavrenski advokat, u
                    daljem tekstu: MNA i Zastupnik neizmenično, s druge strane
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <br>
                    Ugovorne strane su se sporazumele o sledećem:
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 1.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Vlastodavac ovim ugovorom poverava, a Zastupnik prihvata zastupanje u vezi sa naplatom štete
                    <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 90px;"> ' . $osig_kuce . ' </span> - 
                                <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 180px;"> ' . $broj_stete . ' </span>.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 2. </td>
            </tr>
            <tr>
                <td colspan="2">
                    Naknada za rad advokata obračunaće se po odredbama važeće Tarife o nagradama i naknadama troškova za
                    rad advokata, s tim da ugovorne strane ovim ugovaraju i nagradu advokata u iznosu od 
                    <span style="text-align: center; border-bottom: 1px solid black; padding-top: 5px; display: inline-block; width:' . (isset($procenat) ? '60px' : '150px')  . ';"> ' . (isset($procenat) ? $procenat . ' %' : $dinara . ' dinara') . ' % </span>
                    konačno
                    naplaćne naknade štete.
                    <br>
                    <br>
                    Advokat ima pravo na nagradu i naknadu troškova shodno Tarifi o nagradama i naknadama troškova za
                    rad advokata za radnje koje je preuzeo za Vlastodavca na osnovu ovog Ugovora.

                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 3.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Ovim ugovorom Vlastodavac se obavezuje da će Zastupniku uredno platiti sve advokatske radnje i
                    troškove u skladu sa važećom Tarifom o nagradama i naknadama troškova za rad advokata u roku od osam
                    dana od dana fakturisanja od strane Zastupnika.
                    <br>
                    <br>
                    Posle okončanja postupka iz člana 1. ovog Ugovora jednostranom izjavom volje, ugovorom, pravosnažnom
                    odlukom, poravnanjem ili na na bilo koji drugi način, kao i po naplati potraživanja, celokupnog ili
                    delimičnog iz donesene odluke ili poravnanja ili ugovora, Vlastodavac će Zastupniku isplatiti
                    ugovoren iznos iz člana 2. ovog ugovora u roku od osam dana od prijema celokupnog ili svakog
                    delimično naplaćenog iznosa potraživanja iz člana 2. ovog ugovora.

                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 4.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Vlastodavac se obavezuje da će izmiriti troškove sudskih taksi, troškove veštačenja i svedoka, kao i
                    ostale troškove postupka, ukoliko u celosti ili delimično ne bude oslobođen Vlastodavac od plaćanja
                    istih.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 5.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Zastupnik se obavezuje da sve poverene poslove obavlja sa dužnom pažnjom, profesionalno i stručno i
                    da redovno obaveštava Vlastodavca o svim preduzetim radnjama u poverenim poslovima.
                    <br>
                    <br>
                    Vlastodavac je upozoren i razume da Zastupnik ne može ništa obećati ili jemčiti u odnosu na ishod
                    postupka.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 6.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Zastupnik se obavezuje da će kao tajnu čuvati sve poverljive informacije i činjenice koje sazna od
                    Vlastodavca u vezi postupka iz čl. 1. ovog ugovora.
                    <br>
                    <br>
                    Vlastodavac je dužan čuvati kao poslovnu tajnu sve poverljive informacije i činjenice koje sazna od
                    Zastupnika u vezi postupka iz čl. 1. ovog ugovora.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 7.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Vlastodavac se obavezuje da će Zastupniku predati svu raspoloživu dokumentaciju u vezi predmeta iz
                    čl. 1. ovog ugovora i potpisati mu punomoćje za zatupanje u tom postupku.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 8.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Ovaj ugovor može se raskinuti sporazumno ili jednostrano, prema volji ugovornih strana.
                    <br>
                    <br>
                    U slučaju raskida ovog ugovora i otkaza ili opoziva punomoći za zastupanje u predmetu iz čl. 1. ovog
                    ugovora, advokat je dužan završiti sve neodložne započete poslove, čije bi neizvršavanje nanelo
                    štetu vlastodavcu, a u skladu sa zakonom, dok je vlastodavac obavezan isplatiti advokatu dospeli
                    iznos naknade do dana raskida ugovora, kao i naknadu za sve preduzete radnje advokata prema
                    odredbama važeće Tarife o nagradama i naknadama troškova za rad advokata.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 9.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Na sva pitanja koja nisu uređena ovim ugovorom primenjuju se odredbe važeće Zakona o obliagacionim
                    odnosima i Tarife o nagradama i naknadama troškova za rad advokata.
                </td>
            </tr>

            <tr>
                <td colspan="2" class="title" style="text-align: center; padding-top: 12px; padding-bottom: 12px;">
                    Član 10.</td>
            </tr>
            <tr>
                <td colspan="2">
                    Ovaj ugovor je sačinjen u dva (2) istovetna primerka od kojih svakoj ugovornoj strani pripada po
                    dva.
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
                </td>
            </tr>


            <tr>
                <td style=" vertical-align: top; text-align: center;">

                    <strong>ZASTUPNIK</strong>
                    <br>
                    <br>
                    <span style="border-top: 1px solid black; padding-top: 5px; padding-botton: 5px;  display: inline-block; width: 200px;"> ' . $adv_advokat . ' </span>
                </td>
                <td style="vertical-align: top; text-align: center;">
                    <strong>VLASTODAVAC</strong>
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