import React, { Fragment } from 'react'
import { TabTitle } from '../general/GeneralFuntions'
import { useTranslation } from 'react-i18next'

import classes from './AboutUs.module.css'

const AboutUs = () => {
  TabTitle(`TeslaWays | O Nama`)

  const { t } = useTranslation()

  window.scrollTo(0, 0)

  return (
    <Fragment>
      <main>
        <div className={classes.container}>
          <h1 className={classes.header}>{t('O Nama')}</h1>
          <h3 className={classes.naslov}>Zavod za proučavanje kulturnog razvitka</h3>
          <p className={classes.tekst}>
            <b>Zavod za proučavanje kulturnog razvitka</b> već treću godinu mapira kulturne potencijale Srbije
            koji mogu da se upotrebe za razvoj kulturnog turizma. Iz tog velikog projekta proizašlo je i
            nekoliko kulturnih ruta, kao specifičnih kulturno turističkih proizvoda koji se mogu razvijati u
            budućnosti. Među njima su i Putevi Tesle, koji su privukli ogromnu pažnju i stručnjaka i medija i
            javnosti uopšte.
            <br />
            <br />
            Zavod je tokom 2012. godine postavio osnovni koncept rute "Putevima Tesle". Izložbu ovog puta
            kulture otvorio je 18. aprila 2012. godine u Zavodu za proučavanje kulturnog razvitka Goran
            Petković, državni sekretar Sektora za turizam Ministarstva ekonomije i regionalnog razvoja. Nakon
            otvaranja izložbe održana je tribina o industrijskom turizmu na kojoj su učestvovali Aca Marković,
            predsednik Upravnog odbora EPS-a, Vladimir Jelenković, direktor Muzeja Nikole Tesle, Rifat
            Kulenović, industrijski arheolog u Muzeju nauke i tehnike Maja Todorović, istraživač Zavoda za
            proučavanje kulturnog razvitka, i Manuela Graf, autor projekta “Putevima Tesle”.
            <br />
            <br />
            Projekat je 2012. godine predstavljen u Rijeci na 5. Međunarodnoj konferenciji o industrijskoj
            baštini, u Rektoratu Univeriteta u Beogradu na svečanoj tribini "Nikola Tesla i 21. vek - Srbija u
            svetlu pobede naizmeničnih struja Nikole Tesle 1896. godine", koja je organizovana povodom 120
            godina od dolaska Nikole Tesle u Beograd, kao i na konferenciji CEDEF-a “Mini hidroelektrane –
            prednosti i potencijali” u Gamzigradskoj banji.
            <br />
            <br />
            Tokom prošle godine, Zavod je potpisao protokole o saradnji na razvoju projekta "Putevima Tesle"
            sa Muzejem Nikole Tesle i Turističkom organizacijom Srbije. Sredstva za postavljanje osnove
            projekta obezbedila je Elektroprivreda Srbije, a izradu sajta rute poklonila je ITAkademy LINK
            group iz Beograda. Veliku važnost projekta istakli su i Sektor za turizam Ministarstva finansija i
            privrede Republike Srbije, zatim Ministarstvo prosvete, nauke i tehnološkog razvoja i Ministarstvo
            energetike, razvoja i zaštite životne sredine. Ministarstvo kulture i informisanja je obezbedilo
            sredstva za dalje istraživanje.
            <br />
            <br />
            Zavod za proučavanje kulturnog razvitka se ove godine bavi proučavanjem mogućnosti razvoja ove
            kulturno-turističke rute i stvaranjem osnove za buduću strategiju.
            <br />
            <br />
            Sve pomenuto motivisalo je preko 40 institucija kulture, turističkih organizacija, privrednika,
            čak pet fakulteta (ETF iz Beograda, Tehnički fakultet iz Novog Sada, Departman za turizam
            Prirodno-matematiččkog fakulteta iz Novog Sada, Univerzitet Singidunum i Elektronski fakultet iz
            Niša) da osnuju <b>Klaster puteva kulture</b>. Klaster će, nadovezujući se na istraživanja Zavoda
            za proučavanje kulturnog razvitka, nastaviti da razvija ovaj i slične projekte kao specifične
            kulturno-turističke proizvode.
            <br />
            <br />
            Ukoliko bude sve išlo kako je planirano, kulturna ruta Putevima Tesle biće dobar primer projekta
            koji je uspeo da udruži više sektora – kulturu, nauku, obrazovanje, turizam i privredu, ali i da
            aktivno uključi lokalne zajednice u dalji razvoj projekta.
          </p>
        </div>
      </main>
    </Fragment>
  )
}

export default AboutUs
