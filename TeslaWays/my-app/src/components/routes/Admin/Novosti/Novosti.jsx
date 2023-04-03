import React, { useState, useEffect, useRef } from 'react'
import axios from 'axios'
import ReactQuill from 'react-quill'
import 'react-quill/dist/quill.snow.css'
import classes from './Novosti.module.css'

const Novosti = () => {
  const tokenVest = localStorage.getItem('token')
  // console.log('Bearer ' + tokenVest)

  const selectRef = useRef()
  const inputImgRef = useRef()

  const [id, setId] = useState('')
  const [naslov, setNaslov] = useState('')
  const [datum, setDatum] = useState('')
  const [kraci_tekst, setKraci] = useState('')
  const [duzi_tekst, setDuzi] = useState('')

  const [filter, setFilter] = useState('')

  const [imageSrc, setImageSrc] = useState(``)

  function handleReset() {
    setFilter('')
    setId('')
    setKraci('')
    setDuzi('')
    setNaslov('')
    setDatum('')
    setSelectedImage('')
    setImageUrl('')
    setImageSrc('https://fomantic-ui.com/images/wireframe/image.png')
    inputImgRef.current.value = ''
    selectRef.current.selectedIndex = 0
  }

  const [vesti, setVesti] = useState([])

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/novosti')
      .then((res) => {
        setVesti(res.data)
        setImageSrc('https://fomantic-ui.com/images/wireframe/image.png')
      })
      .catch((err) => {
        console.log(err)
      })
  }, [])

  function handleChange() {
    const originalDate = new Date(vesti[filter - 1]?.datum)

    const year = originalDate.getFullYear()
    const month = originalDate.getMonth() + 1
    const day = originalDate.getDate()

    const newDateString = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`

    setId(vesti[filter - 1]?.id_vesti)
    setKraci(vesti[filter - 1]?.kraci_text)
    setDuzi(vesti[filter - 1]?.duzi_text)
    if (vesti[filter - 1]?.naslov === undefined) {
      setNaslov('')
    } else {
      setNaslov(vesti[filter - 1]?.naslov)
    }
    setDatum(newDateString)

    if (!vesti[filter - 1]?.zona === undefined || !vesti[filter - 1]?.thumb) {
      setImageSrc('https://fomantic-ui.com/images/wireframe/image.png')
    } else {
      setImageSrc(
        `http://teslaways.net/images/vesti/thumbnails_large/${vesti[filter - 1]?.id_destinacije}/${
          vesti[filter - 1]?.thumb
        }.jpg`
      )
    }
  }

  const apiSendDate = new Date(datum)

  const year = apiSendDate.getFullYear()
  const month = apiSendDate.getMonth() // Returns zero-based index
  const day = apiSendDate.getDate()

  const monthNames = [
    'Januar',
    'Februar',
    'Mart',
    'April',
    'Maj',
    'Jun',
    'Jul',
    'Avgust',
    'Septembar',
    'Oktobar',
    'Novembar',
    'Decembar',
  ]
  const monthName = monthNames[month]

  var newDate = monthName + ' ' + day + ', ' + year

  const [selectedImage, setSelectedImage] = useState(null)

  const [imageUrl, setImageUrl] = useState(null)

  useEffect(() => {
    if (selectedImage) {
      setImageUrl(URL.createObjectURL(selectedImage))
    }
  }, [selectedImage])

  function vestiAdd() {
    axios
      .post(
        'http://teslaways.net/api/api/novosti/dodaj',
        {
          datum: newDate,
          naslov: naslov,
          kraci_text: kraci_tekst,
          duzi_text: duzi_tekst,
          thumb: 'thumb',
          thumb_large: 'thumb_large',
          gallery_thumb: 'gallery_thumb',
          gallery_image: 'gallery_image',
          id_destinacije: 1,
          position: 0,
        },
        {
          headers: {
            Authorization: 'Bearer ' + tokenVest,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        alert('Vest je uspesno dodata u bazu.')
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
            Authorization: 'Bearer ' + tokenVest,
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
  function vestiEdit() {
    axios
      .post(
        `http://teslaways.net/api/api/novosti/azuriraj/${id}`,
        {
          datum: newDate,
          naslov: naslov,
          kraci_text: kraci_tekst,
          duzi_text: duzi_tekst,
          thumb: 'hjj',
          thumb_large: 'asdasd',
          gallery_thumb: 'asdasd',
          gallery_image: 'sadasdasd',
          id_destinacije: 1,
          position: 0,
        },
        {
          headers: {
            Authorization: 'Bearer ' + tokenVest,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        alert('Vest je uspesno azurirana u bazi.')
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
            Authorization: 'Bearer ' + tokenVest,
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
    var potvrda = window.confirm('Da li sigurno zelite da obrisete ovu vest?')
    if (potvrda === true) {
      vestiDelete()
    }
  }
  function vestiDelete() {
    axios
      .get(`http://teslaways.net/api/api/novosti/obrisi/${id}`, {
        headers: {
          Authorization: 'Bearer ' + tokenVest,
        },
      })
      .then((res) => {
        console.log(res.data)
        alert('Vest je uspesno obrisana iz baze.')
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
            Authorization: 'Bearer ' + tokenVest,
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
    <div id="novosti" className={classes.novosti}>
      <h2 className={classes.naslov}>DODAJ VESTI</h2>

      <h4>Sve vesti</h4>

      <select
        ref={selectRef}
        onChange={(e) => {
          setFilter(e.target.selectedIndex)
        }}
      >
        <option defaultValue value={null}>
          Odaberite vest
        </option>
        {vesti?.map((vest) => {
          return (
            <option key={vest.naslov} value={vest.naslov}>
              {vest.naslov}
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

      <h4>Unesite naslov</h4>
      <input
        className={classes.naslovvest}
        type="text"
        placeholder="Naslov"
        value={naslov}
        onChange={(e) => {
          setNaslov(e.target.value)
        }}
      />

      <h4>Unesite datum</h4>
      <input
        className={classes.datum}
        name="datum"
        type="date"
        value={datum}
        onChange={(e) => {
          setDatum(e.target.value)
        }}
      />

      <h4>Unesite kraći tekst</h4>
      <ReactQuill className={classes['kraci_tekst']} theme="snow" value={kraci_tekst} onChange={setKraci} />
      <h4>Unesite duži tekst</h4>
      <ReactQuill className={classes['duzi_tekst']} theme="snow" value={duzi_tekst} onChange={setDuzi} />

      <h4>Unesite sliku</h4>
      <div className={classes.imageDiv}>
        <input
          ref={inputImgRef}
          type="file"
          onChange={(e) => {
            setSelectedImage(e.target.files[0])
            console.log(e.target.files[0])
          }}
        />

        {!imageUrl && !selectedImage && (
          <div>
            <img src={imageSrc} alt={imageSrc} />
          </div>
        )}

        {imageUrl && selectedImage && (
          <div>
            <img src={imageUrl} alt={selectedImage.name} />
          </div>
        )}
      </div>

      <div className={classes.buttons}>
        <button className={classes.btn} onClick={vestiAdd}>
          Dodaj<i className="fa-solid fa-plus"></i>
        </button>
        <button className={classes.btn} onClick={vestiEdit}>
          Ažuriraj<i className="fa-solid fa-pen-to-square"></i>
        </button>
        <button className={classes.btn} onClick={deleteConfirm}>
          Obriši<i className="fa-solid fa-trash"></i>
        </button>
      </div>
    </div>
  )
}

export default Novosti
