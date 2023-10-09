import React from 'react'
import classes from './Jezik.module.css'
import { useState } from 'react'

const Jezik = () => {
  const [lang, setLang] = useState('srb')
  var currentLang = localStorage.getItem('language')
  console.log(currentLang)

  return (
    <div className={classes.jezik} id="jezik">
      <h2>IZABERITE JEZIK</h2>
      <p>Jezik se odnosi na bazu u koju se unose podaci.</p>
      <button
        className={currentLang === 'srb' ? `${classes.lngBtn} ${classes.active}` : classes.lngBtn}
        onClick={() => {
          setLang('srb')
          localStorage.setItem('language', 'srb')
        }}
      >
        Srpski
      </button>
      <button
        className={currentLang === 'en' ? `${classes.lngBtn} ${classes.active}` : classes.lngBtn}
        onClick={() => {
          setLang('eng')
          localStorage.setItem('language', 'en')
        }}
      >
        Engleski
      </button>
      <p>Izabrani jezik: {currentLang === 'srb' ? 'Srpski' : 'Engleski'}</p>
    </div>
  )
}

export default Jezik
