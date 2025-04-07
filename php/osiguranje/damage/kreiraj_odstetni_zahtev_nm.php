<?php
require '../vendor/autoload.php'; // Ako koristiš Composer
use Dompdf\Dompdf;
use Dompdf\Options;

// Uključite config.php za povezivanje sa bazom
include('../config.php'); // Ovaj fajl mora biti u istoj fascikli ili navedite apsolutnu putanju


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prikupljanje podataka iz forme
    // $stete_id = '28';
    $stete_id = $_POST['stete_id'];
    $klijent_id = $_POST['klijent_id'];
    $created_at = date('d.m.Y'); // trenutni datum i vreme


    // SQL upit da se dobije ime, prezime i JMBG klijenta na osnovu klijent_id
    $sql_klijent = "SELECT ime_prezime, jmbg FROM klijent WHERE id = ?";
    $stmt = $conn->prepare($sql_klijent);
    $stmt->bind_param("i", $klijent_id); // Bindovanje klijent_id kao integer
    $stmt->execute();
    $stmt->bind_result($ime_prezime, $jmbg);
    $stmt->fetch();
    $stmt->close();

    // Prikupljanje ostalih podataka sa forme
    $svojstvo = $_POST['svojstvo'];
    $registraciona_oznaka = $_POST['registraciona_oznaka'];
    $broj_racuna = $_POST['broj_racuna'];
    $naziv_banke = $_POST['naziv_banke'];
    
    $ime_prezime_stetnik = $_POST['ime_prezime_stetnik'];
    $mb_pib_stetnik = $_POST['mb_pib_stetnik'];
    $adresa_stetnik = $_POST['adresa_stetnik'];
    $marka_tip_vozila_stetnik = $_POST['marka_tip_vozila_stetnik'];
    $registraciona_oznaka_stetnik = $_POST['registraciona_oznaka_stetnik'];
    $osiguranje = $_POST['osiguranje'];
    $broj_polise = $_POST['broj_polise'];
    
    $datum_nezgode = $_POST['datum_nezgode'];
    // Formatiraj datum u "d.m.Y" format
    $formatted_date = date('d.m.Y', strtotime($datum_nezgode)); // Pretvaramo datum u željeni format
    $mesto_nezgode = $_POST['mesto_nezgode'];
    $ulica_broj = $_POST['ulica_broj'];
    
    $tip_prijave = $_POST['tipPrijave'];
    
    function cleanAndSum($values) {
        $total = 0;
        
        foreach ($values as $value) {
            // Uklanjanje " RSD"
            $value = str_replace(" RSD", "", $value);
            
            // Prvo uklanjamo tačku (hiljade separator), a zatim zarez menjamo tačkom
            $cleanedValue = str_replace('.', '', $value);
            $cleanedValue = str_replace(',', '.', $cleanedValue);
            
            // Pretvaranje u float i sabiranje
            $total += floatval($cleanedValue);
        }
        
        return $total;
    }
    
    // Primer korišćenja funkcije
    $dusevna_bol = $_POST['dusevna_bol'];
    $fizicka_bol = $_POST['fizicka_bol'];
    $naruzenost = $_POST['naruzenost'];
    $pretrpljen_strah = $_POST['pretrpljen_strah'];
    $sluz_beleska = $_POST['sluz_beleska'];
    
    // Svi uneti podaci u niz
    $values = [$dusevna_bol, $fizicka_bol, $naruzenost, $pretrpljen_strah, $sluz_beleska];
    
    // Pozivanje funkcije za sumiranje
    $total = cleanAndSum($values);

    $total13 = $total  + 13500;
    
    
    // Asocijativni niz sa osiguranjima i njihovim adresama
    $osiguranjeAdrese = [
        "Dunav Osiguranje" => "Bulevar Maršala Tolbuhina 46, 11000 Beograd",
        "DDOR Osiguranje" => "Antifašisticke borbe 13a, 11070 Novi Beograd",
        "Uniqa Osiguranje" => "Milutina Milankovića 134g, 11000 Beograd",
        "Triglav Osiguranje" => "Bulevar Milutina Milankovića 7a, 11000 Beograd",
        "Generali Osiguranje" => "Vojvode Stepe 5, 11000 Beograd",
        "Wiener Osiguranje" => "Španskih boraca 3, 11000 Beograd",
        "Sava Osiguranje" => "Bulevar vojvode Mišića 51, 11000 Beograd",
        "Milenijum Osiguranje" => "Bulevar Milutina Milankovića 3B, 11000 Beograd",
        "Globos Osiguranje" => "Bulevar Milutina Milankovića 23, 11070 Novi Beograd",
        "AMS Osiguranje" => "Ruzveltova 16, 11000 Beograd",
        "GRAWE Osiguranje" => "Bulevar Mihajla Pupina 115d, 11000 Beograd"
    ];

    $adresaOsiguranje = isset($osiguranjeAdrese[$osiguranje]) ? $osiguranjeAdrese[$osiguranje] : "Adresa nije dostupna";
 
    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $options->set('defaultFont', 'Verdana'); // Postavljanje podrazumevanog fonta koji podržava specijalne karaktere
    $options->set('isHtml5ParserEnabled', true); // Omogućavanje HTML5 parsera

    $dompdf = new Dompdf($options);

    $imgData = base64_encode(file_get_contents('../assets/img/slovic-logo.png'));
        
    // HTML sadržaj
$html = '
<div
       style="width: 100%; font-size: 13px; font-family: DejaVu Sans, Verdana, Geneva, Tahoma, sans-serif; margin: auto; background: white; line-height: 15px;">
       <table>
           <tr>
               <th style="padding-bottom: 10px; border-bottom: 2px solid black; "><img src="data:image/png;base64,' . $imgData . '" style="width: 120px; height: 120px;"/></th>
               <td style="padding-bottom: 10px; border-bottom: 2px solid black; text-align: left; font-size: 12px">
                   Advokat Ozren M. Slović<br>
                   Bul. Zorana Đinđića 54/3, Novi Beograd<br>
                   MB: 57358084, PIB: 111912268<br>
                   Tekući račun: 265-1780310001729-95<br>
                   Kontakt telefon: +381 64 94 94 698<br>
                   E-mail: ozren@sloviclaw.rs<br>
               </td>
           </tr>
           <tr>
               <td colspan="2" style="padding-top: 10px; font-weight: bold;">
                   '. $osiguranje .'<br>
                   '. $adresaOsiguranje .'
               </td>
           </tr>
           <tr>
               <td colspan="2" style="text-align: right; padding-block: 5px; font-weight: bold;">
                   Beograd, '. $created_at .'
               </td>
           </tr>
           <tr>
               <td colspan="2" style="text-align: center; font-weight: bold; font-size: 20px; padding-top: 20px; padding-bottom: 20px;">
                   <u>ODŠTETNI ZAHTEV</u>
               </td>
           </tr>
            <tr>
               <td style="width: 50%; padding-top: 10px; padding-bottom: 10px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">
                   <u>Podaci o oštećenom:</u>
                   <br>
                   Ime i prezime/naziv firme: 
                   <span style=" text-align: center; font-weight: bold; display: inline-block;">'. $ime_prezime .'</span>
                   <br>
                   Svojstvo: 
                   <span style=" text-align: center; font-weight: bold; display: inline-block;">'. $svojstvo .'</span>
               </td>
               <td style="width: 50%; border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">
                   MB/PIB: 
                   <span style="font-weight: bold; text-align: center; display: inline-block;">'. $jmbg .'</span>
               </td>
           </tr>
           
           <tr>
               <td>
               </td>
           </tr>
           <tr>
               <td style="width: 50%;  border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;  padding-top: 10px; padding-bottom: 10px;">
                   <u>Podaci o štetniku:</u> <br>
                   Ime i prezime/naziv firme: 
                   <span style="font-weight: bold; text-align: center; display: inline-block;">'. $ime_prezime_stetnik .'</span>
                   <br>
                   Marka i tip vozila:
                   <span style="font-weight: bold; text-align: center; display: inline-block;"> '. $marka_tip_vozila_stetnik .'</span>
                   <br><br>
                   <span style="font-weight: bold; text-align: center;display: inline-block;"> '. $osiguranje .' </span>

               </td>
               <td style="width: 50%; border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; padding-top: 10px; padding-bottom: 10px;">
                   <br>
                   Adresa 
                   <span style="font-weight: bold; text-align: center; display: inline-block;">'. $adresa_stetnik .' </span>
                   <br>
                   Reg. ozn.: 
                   <span style="font-weight: bold; text-align: center; display: inline-block;">'. $registraciona_oznaka_stetnik .' </span>
                   <br><br>
                   Polisa broj: 
                   <span style="font-weight: bold; text-align: center; display: inline-block;">'. $broj_polise .' </span>
               </td>
           </tr>
           <tr>
               <td>
               </td>
           </tr>
           <tr style="border: 1px solid black;">
               <td colspan="2" style=" padding-top: 10px; padding-bottom: 10px; border: 1px solid black;">
                   <u>Saobraćajna nezgoda se dogodila dana:</u>
                   <span style="padding-top: 10px; font-weight: bold; text-align: left; display: inline-block; width: 90px;">'. $formatted_date .' </span>
                   u mestu:
                   <span style="font-weight: bold; text-align: left; display: inline-block; width: 70px;"> '. $mesto_nezgode .' </span>
                   <br/>
                   ul.
                   <span style="font-weight: bold; text-align: left; display: inline-block; width: 300px;"> '. $ulica_broj .' </span>
               </td>
           </tr>
           <tr>
               <td>
                   <br/>
                   <b>Za predmetnu saobraćajnu nezgodu postoji:</b>	
                   <br/>
               </td>
           </tr>
           <tr>
               <td colspan="2">
                   <span style="padding: 2px 5px; border: 1px solid black; color:' . ( ($tip_prijave == '1') ? '#000' : '#fff') . '">
                   ' . (($tip_prijave == '1') ? 'X' : '0') . '
                   </span> Zapisnik policije o izvršenom uviđaju
               </td>
           </tr>
           <tr>
               <td colspan="2">
                   <span style="padding: 2px 5px; border: 1px solid black; color:' . ( ($tip_prijave == '2') ? '#000' : '#fff') . '">
                       ' . (($tip_prijave == '2') ? 'X' : '0') . '
                   </span> Evropski izveštaj bez službene beleške
               </td>
           </tr>
           <tr>
               <td colspan="2">
                   <span style="padding: 2px 5px; border: 1px solid black; color:' . ( ($tip_prijave == '3') ? '#000' : '#fff') . '">
                       ' . (($tip_prijave == '3') ? 'X' : '0') . '
                   </span> Evropski izveštaj sa službenom beleškom
               </td>
           </tr>
           <tr>
               <td>
               </td>
           </tr>
           <tr>
               <td colspan="2">
                   <strong>Napomena:</strong> Advokatske troškove uplatiti na račun advokata br.
                   265-1780310001729-95 otvoren kod Raiffeisen bank ad Beograd,
                   a troškove na ime štete na račun oštećenog:
                   '. $broj_racuna .' otvoren kod '. $naziv_banke .'
               </td>
           </tr>
           <tr>
               <td colspan="2">
                   <br>
                   Odštetni zahtev zasnovan je shodno odr. ZOO-a i ZOOS-a i mišljenja sam da štetu treba nadoknaditi u
                   vansudskom postupku. Molim da opredeljene iznose isplatite u rokovima propisanim odredbama čl. 24. i
                   25.
                   ZOOS-a.
                   <br>
               </td>
           </tr>
           <tr>
               <td style="width: 50%; text-align: left;">
                    <br>
                    ' . ((!$fizicka_bol) ? '' : 'Na ime pretrpljenih duševnih bolova zbog UŽA: <br>') . '
                    ' . ((!$fizicka_bol) ? '' : 'Na ime pretrpljenih fizičkih bolova: <br>') . '
                    ' . ((!$naruzenost) ? '' : 'Na ime naruženosti: <br>') . '
                    ' . ((!$pretrpljen_strah) ? '' : 'Na ime pretrpljenog straha: <br>') . '
                    Na ime advokatskih troškova po A.T.
                    <br>
                    ' . ((!$sluz_beleska) ? '' : 'Na ime troškova pribavljanja službene beleške <br>') . '
                    <br>
                    <b>UKUPNO:</b>
               </td>
               <td style="width: 50%; text-align: right;">
                    <br>
                    ' . ((!$dusevna_bol) ? '' : $dusevna_bol . ' RSD <br>') . '
                    ' . ((!$fizicka_bol) ? '' : $fizicka_bol . ' RSD <br>') . '
                    ' . ((!$naruzenost) ? '' : $naruzenost . ' RSD <br>') . '
                    ' . ((!$pretrpljen_strah) ? '' : $pretrpljen_strah . ' RSD <br>') . '
                    13.500,00 RSD
                    <br>
                    ' . ((!$sluz_beleska) ? '' : $sluz_beleska . ' RSD <br>') . '
                    <br>
                    <span style="border-top: 2px solid black; font-weight: bold; text-align: right; display: inline-block; width: 120px;"> ' . number_format($total13, 2, ',', '.') . ' RSD</span>
               </td>
           </tr>
           <tr>
               <td colspan="2" style="text-align: right;">
                   <br>
                   Advokat punomoćnik
               </td>
           </tr>
       </table>
</div>
';

// Učitavanje HTML-a u Dompdf
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Generisanje PDF-a
$pdf_output = $dompdf->output();

// Prikazivanje PDF-a za preuzimanje
$dompdf->stream($ime_prezime . ' ODŠTETNI ZAHTEV Ozren Slović.pdf', ['Attachment' => true]);

//  // SQL upit za unos podataka u bazu
//  $sql_insert = "INSERT INTO odstetni_zahtev 
//  (id, stete_id, klijent_id, marka_tip_vozila, registraciona_oznaka, broj_racuna, naziv_banke,
//  ime_prezime_stetnik, mb_pib_stetnik, adresa_stetnik, marka_tip_vozila_stetnik, 
//  registraciona_oznaka_stetnik, osiguranje, broj_polise, datum_nezgode, mesto_nezgode,
//  ulica_broj, tip_prijave, iznos_za_naplatu, created_at)
//  VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// $stmt = $conn->prepare($sql_insert);

// // Bindovanje parametara
// $stmt->bind_param("iisssssssssssssssss", 
// $stete_id, 
// $klijent_id, 
// $marka_tip_vozila, 
// $registraciona_oznaka, 
// $broj_racuna, 
// $naziv_banke, 
// $ime_prezime_stetnik, 
// $mb_pib_stetnik, 
// $adresa_stetnik, 
// $marka_tip_vozila_stetnik, 
// $registraciona_oznaka_stetnik, 
// $osiguranje, 
// $broj_polise, 
// $datum_nezgode, 
// $mesto_nezgode, 
// $ulica_broj, 
// $tip_prijave, 
// $iznos_za_naplatu, 
// $created_at
// );

// // Izvršavanje upita
// $stmt->execute();

// $stmt->close();

}

   
?>