import React from 'react'
import classes from './Zone.module.css'
import axios from 'axios'
import { useEffect, useState, useRef } from 'react'

const Zone = () => {
  const tokenZone = localStorage.getItem('token')
  // console.log('Bearer ' + tokenZone)

  const selectRef = useRef()

  const [zones, setZones] = useState([])
  const [nazivZone, setNaziv] = useState('')
  const [id, setId] = useState('')

  const [index, setIndex] = useState('')

  function handleChange() {
    setNaziv(zones[index - 1]?.naziv)
    setId(zones[index - 1]?.id_zone)
  }

  function handleReset() {
    setNaziv('')
    setId('')
    selectRef.current.selectedIndex = 0
  }

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/zone')
      .then((res) => setZones(res.data))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  function addZone() {
    axios
      .post(
        'http://teslaways.net/api/api/zone/dodaj',
        {
          naziv: nazivZone,
        },
        {
          headers: {
            Authorization: 'Bearer ' + tokenZone,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        alert('Zona je uspesno dodata u bazu.')
        window.location.reload()
      })
      .catch((err) => {
        localStorage.removeItem('token')
        window.location.reload()
      })

    axios
      .post(
        `http://teslaways.net/api/api/refresh`,
        {},
        {
          headers: {
            Authorization: 'Bearer ' + tokenZone,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        localStorage.removeItem('token')
        localStorage.setItem('token', res.data.authorisation.token)
        window.location.reload()
      })
      .catch((err) => {
        console.log(err)
      })
  }

  function editZone() {
    axios
      .post(
        `http://teslaways.net/api/api/zone/azuriraj/${id}`,
        {
          naziv: nazivZone,
        },
        {
          headers: {
            Authorization: 'Bearer ' + tokenZone,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        alert('Zona je uspesno azurirana u bazi.')
        window.location.reload()
      })
      .catch((err) => {
        localStorage.removeItem('token')
        window.location.reload()
      })

    axios
      .post(
        `http://teslaways.net/api/api/refresh`,
        {},
        {
          headers: {
            Authorization: 'Bearer ' + tokenZone,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        localStorage.removeItem('token')
        localStorage.setItem('token', res.data.authorisation.token)
        window.location.reload()
      })
      .catch((err) => {
        console.log(err)
      })
  }

  function deleteConfirm() {
    var potvrda = window.confirm('Da li sigurno zelite da obrisete ovu zonu?')
    if (potvrda === true) {
      zonaDelete()
    }
  }
  function zonaDelete() {
    axios
      .get(`http://teslaways.net/api/api/zone/obrisi/${id}`, {
        headers: {
          Authorization: 'Bearer ' + tokenZone,
        },
      })
      .then((res) => {
        console.log(res.data)
        alert('Zona je uspesno obrisana iz baze.')
        window.location.reload()
      })
      .catch((err) => {
        localStorage.removeItem('token')
        window.location.reload()
      })
    axios
      .post(
        `http://teslaways.net/api/api/refresh`,
        {},
        {
          headers: {
            Authorization: 'Bearer ' + tokenZone,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        localStorage.removeItem('token')
        localStorage.setItem('token', res.data.authorisation.token)
        window.location.reload()
      })
      .catch((err) => {
        console.log(err)
      })
  }

  return (
    <div id="zone" className={classes.zone}>
      <h2 className={classes.naslov}>DODAJ ZONE</h2>

      <h4>Sve zone</h4>

      <select
        ref={selectRef}
        onChange={(e) => {
          setIndex(e.target.selectedIndex)
        }}
      >
        <option value="">Odaberite zonu</option>
        {zones?.map((niz) => {
          return (
            <option key={niz.naziv} value={niz.naziv}>
              {niz.naziv}
            </option>
          )
        })}
      </select>

      <button className={classes.confirm} onClick={handleChange}>
        <i className="fa-solid fa-check"></i>
      </button>
      <button className={classes.reset} onClick={handleReset}>
        <i className="fa-solid fa-xmark"></i>
      </button>

      <h4>Unesite Naslov</h4>
      <input
        type="text"
        placeholder="Naziv zone"
        onChange={(e) => {
          setNaziv(e.target.value)
        }}
        value={nazivZone}
      />

      <div className={classes.buttons}>
        <button className={classes.btn} onClick={addZone}>
          Dodaj<i className="fa-solid fa-plus"></i>
        </button>
        <button className={classes.btn} onClick={editZone}>
          Ažuriraj<i className="fa-solid fa-pen-to-square"></i>
        </button>
        <button className={classes.btn} onClick={deleteConfirm}>
          Obriši<i className="fa-solid fa-trash"></i>
        </button>
      </div>
    </div>
  )
}

export default Zone
