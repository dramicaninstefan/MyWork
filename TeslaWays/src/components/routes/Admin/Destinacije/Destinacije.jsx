import React, { useState, useEffect, useRef } from 'react'
import classes from './Destinacije.module.css'
import axios from 'axios'
import ReactQuill from 'react-quill'

const Destinacije = () => {
  const inputImgRef = useRef()

  const selectRef = useRef()
  const zoneRef = useRef()
  const tipRef = useRef()
  const podtipRef = useRef()

  zoneRef.current = []

  const addToZoneRef = (el) => {
    if (el && !zoneRef.current.includes(el)) {
      zoneRef.current.push(el)
    }
  }

  tipRef.current = []

  const addToTipRef = (el) => {
    if (el && !tipRef.current.includes(el)) {
      tipRef.current.push(el)
    }
  }

  podtipRef.current = []

  const addToPodtipRef = (el) => {
    if (el && !podtipRef.current.includes(el)) {
      podtipRef.current.push(el)
    }
  }

  const [dest, setDest] = useState([])
  const [tips, setTips] = useState([])
  const [podtips, setPodtips] = useState([])
  const [id, setId] = useState([])
  const [naslov, setNaslov] = useState('')
  const [zone, setZone] = useState('')
  const [zoneNaziv, setZoneNaziv] = useState('')
  const [tip, setTip] = useState('')
  const [podtip, setPodtip] = useState('')
  const [address, setAddress] = useState('')
  const [lat, setLat] = useState('')
  const [lang, setLang] = useState('')

  const [kraci_tekst, setKraci] = useState('')
  const [duzi_tekst, setDuzi] = useState('')

  const [index, setIndex] = useState('')

  const [imageSrc, setImageSrc] = useState(``)

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/destinacije')
      .then((res) => {
        setDest(res.data)
        setImageSrc('https://fomantic-ui.com/images/wireframe/image.png')
      })
      .catch((err) => {
        console.log(err)
      })
  }, [])

  function handleChange() {
    setId(dest[index - 1]?.id)
    if (dest[index - 1]?.naslov === undefined) {
      setNaslov('')
    } else {
      setNaslov(dest[index - 1]?.naslov)
    }
    setAddress(dest[index - 1]?.adresa)
    setLat(dest[index - 1]?.lat)
    setLang(dest[index - 1]?.lng)
    setKraci(dest[index - 1]?.kraci_text)
    setDuzi(dest[index - 1]?.duzi_text)
    setZone(dest[index - 1]?.zona)
    setZoneNaziv(dest[index - 1]?.naziv_zone)
    console.log(dest[index - 1]?.zona)
    for (var i = 0; i < zoneRef.current.length; i++) {
      if (dest[index - 1]?.zona == zoneRef.current[i].value) {
        console.log(zoneRef.current[i].value)
        zoneRef.current[i].checked = true
      } else {
        zoneRef.current[i].checked = false
      }
    }
    setTip(dest[index - 1]?.tip)
    for (var j = 0; j < tipRef.current.length; j++) {
      if (dest[index - 1]?.tip == tipRef.current[j].value) {
        console.log(tipRef.current[j].value)
        tipRef.current[j].checked = true
      } else {
        tipRef.current[j].checked = false
      }
    }
    setPodtip(dest[index - 1]?.podtip)
    console.log(dest[index - 1]?.podtip)
    for (var k = 0; k < podtipRef.current.length; k++) {
      if (dest[index - 1]?.podtip == podtipRef.current[k].value) {
        console.log(podtipRef.current[k].value)
        podtipRef.current[k].checked = true
      } else {
        podtipRef.current[k].checked = false
      }
    }
    if (!dest[index - 1]?.zona === undefined || !dest[index - 1]?.thumb === undefined) {
      setImageSrc(``)
    } else {
      setImageSrc(
        `http://teslaways.net/images/destinacije/thumbnails_large/${dest[index - 1]?.zona}/${
          dest[index - 1]?.thumb
        }.jpg`
      )
    }
  }

  function handleReset() {
    setId('')
    setNaslov('')
    setAddress('')
    setLat('')
    setLang('')
    setKraci('')
    setDuzi('')
    setZone('')
    setZoneNaziv('')
    setTip('')
    setPodtip('')
    setSelectedImage('')
    setImageUrl('')
    inputImgRef.current.value = ''
    for (var i = 0; i < zoneRef.current.length; i++) {
      zoneRef.current[i].checked = false
    }
    for (var j = 0; j < tipRef.current.length; j++) {
      tipRef.current[j].checked = false
    }
    for (var k = 0; k < podtipRef.current.length; k++) {
      podtipRef.current[k].checked = false
    }
    setImageSrc('https://fomantic-ui.com/images/wireframe/image.png')
    selectRef.current.selectedIndex = 0
  }

  const [zones, setZones] = useState([])

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/zone')
      .then((res) => setZones(res.data))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api')
      .then((res) => {
        setTips(res.data.tip)
        setPodtips(res.data.podtip)
      })
      .catch((err) => {
        console.log(err)
      })
  }, [])

  const [selectedImage, setSelectedImage] = useState(null)

  const [imageUrl, setImageUrl] = useState(null)

  useEffect(() => {
    if (selectedImage) {
      setImageUrl(URL.createObjectURL(selectedImage))
    }
  }, [selectedImage])

  const tokenDest = localStorage.getItem('token')

  function destinacijeAdd() {
    axios
      .post(
        'http://teslaways.net/api/api/destinacije/dodaj',
        {
          naslov: naslov,
          kraci_text: kraci_tekst,
          duzi_text: duzi_tekst,
          thumb: 'hjj',
          thumb_large: 'asdasd',
          gallery_thumb: 'asdasd',
          gallery_image: 'sadasdasd',
          lat: lat,
          lng: lang,
          tip: tip,
          podtip: podtip,
          zona: zone,
          adresa: address,
          id_kategorije: zone,
        },
        {
          headers: {
            Authorization: 'Bearer ' + tokenDest,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        alert('Destinacija je uspesno dodata u bazu.')
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
            Authorization: 'Bearer ' + tokenDest,
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

  function destinacijeEdit() {
    axios
      .post(
        `http://teslaways.net/api/api/destinacije/azuriraj/${id}`,
        {
          naslov: naslov,
          kraci_text: kraci_tekst,
          duzi_text: duzi_tekst,
          thumb: 'thumb',
          thumb_large: 'thumb_large',
          gallery_thumb: 'gallery_thumb',
          gallery_image: 'gallery_image',
          lat: lat,
          lng: lang,
          tip: tip,
          podtip: podtip,
          zona: zone,
          adresa: address,
          id_kategorije: zone,
        },
        {
          headers: {
            Authorization: 'Bearer ' + tokenDest,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        alert('Destinacija je uspesno azurirana u bazi.')
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
            Authorization: 'Bearer ' + tokenDest,
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
    var potvrda = window.confirm('Da li sigurno zelite da obrisete ovu destinaciju?')
    if (potvrda === true) {
      destinacijeDelete()
    }
  }
  function destinacijeDelete() {
    axios
      .get(`http://teslaways.net/api/api/destinacije/obrisi/${id}`, {
        headers: {
          Authorization: 'Bearer ' + tokenDest,
        },
      })
      .then((res) => {
        console.log(res.data)
        alert('Destinacija je uspesno obrisana iz baze.')
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
            Authorization: 'Bearer ' + tokenDest,
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

  function imageUpload() {
    const formdata = new FormData()
    formdata.append('slika', selectedImage)
    formdata.append('destinacija', 'destinacije')
    formdata.append('thumb', 'thumb')

    axios
      .post('http://teslaways.net/api/api/upload', formdata, {
        headers: {
          Authorization: 'Bearer ' + tokenDest,
        },
      })
      .then((res) => {
        console.log(res.data)
        alert('Slika je uspesno dodata u bazu.')
        // window.location.reload()
      })
      .catch((err) => {
        console.log(err)
        alert('Doslo je do greske, pokusajte ponovo.')
      })
  }


  return (
    <div id="destinacije" className={classes.destinacije}>
      <h2 className={classes.naslov}>DODAJ DESTINACIJE</h2>

      <h4>Sve destinacije</h4>

      <select
        ref={selectRef}
        onChange={(e) => {
          setIndex(e.target.selectedIndex)
        }}
      >
        <option defaultValue value={null}>
          Odaberite destinaciju
        </option>
        {dest?.map((des) => {
          return (
            <option key={des.naslov} value={des.naslov}>
              {des.naslov}
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
        className={classes.naslovdest}
        type="text"
        placeholder="Naslov"
        value={naslov}
        onChange={(e) => {
          setNaslov(e.target.value)
        }}
      />

      <h4>Unesite adresu</h4>
      <input
        className={classes.adresadest}
        type="text"
        placeholder="Adresa"
        value={address}
        onChange={(e) => {
          setAddress(e.target.value)
        }}
      />

      <h4>Unesite latitudu za marker na mapi</h4>
      <input
        type="text"
        placeholder="45.112305"
        value={lat}
        onChange={(e) => {
          setLat(e.target.value)
        }}
      />

      <h4>Unesite longitudu za marker na mapi</h4>
      <input
        type="text"
        placeholder="40.209332"
        value={lang}
        onChange={(e) => {
          setLang(e.target.value)
        }}
      />

      <h4>Unesite kraći tekst</h4>
      <ReactQuill className={classes['kraci_tekst']} theme="snow" value={kraci_tekst} onChange={setKraci} />

      <h4>Unesite duži tekst</h4>
      <ReactQuill className={classes['duzi_tekst']} theme="snow" value={duzi_tekst} onChange={setDuzi} />

      <h4>Zone</h4>
      <fieldset id="groupZone">
        <ul>
          {zones?.map((niz) => {
            return (
              <li key={niz.naziv}>
                <input
                  ref={addToZoneRef}
                  type="radio"
                  value={niz.id_zone}
                  id={niz.id_zone}
                  name="groupZone"
                  onClick={() => {
                    setZone(niz.id_zone)
                    setZoneNaziv(niz.naziv)
                  }}
                />
                <label htmlFor={niz.id_zone}>{niz.naziv}</label>
              </li>
            )
          })}
        </ul>
      </fieldset>

      <h4>Tip Destinacije</h4>
      <fieldset id="groupTip">
        <ul>
          {tips?.map((tip) => {
            return (
              <li key={tip.naziv_tipa}>
                <input
                  ref={addToTipRef}
                  type="radio"
                  value={tip.id_tip}
                  id={tip.naziv_tipa}
                  name="groupTip"
                  onClick={() => {
                    setTip(tip.id_tip)
                  }}
                />
                <label htmlFor={tip.naziv_tipa}>{tip.naziv_tipa}</label>
              </li>
            )
          })}
        </ul>
      </fieldset>

      <h4>Podtip Destinacije</h4>
      <fieldset id="groupPodtip">
        <ul>
          {podtips?.map((podtip) => {
            return (
              <li key={podtip.naziv_podtipa}>
                <input
                  ref={addToPodtipRef}
                  type="radio"
                  value={podtip.id_podtip}
                  id={podtip.naziv_podtipa}
                  name="groupPodtip"
                  onClick={() => {
                    setPodtip(podtip.id_podtip)
                  }}
                />
                <label htmlFor={podtip.naziv_podtipa}>{podtip.naziv_podtipa}</label>
              </li>
            )
          })}
        </ul>
      </fieldset>

      <h4>Unesite sliku</h4>
      <div className={classes.imageDiv}>
        <input
          type="file"
          ref={inputImgRef}
          onChange={(e) => {
            setSelectedImage(e.target.files[0])
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
        <button className={classes.btn} onClick={destinacijeAdd}>
          Dodaj<i className="fa-solid fa-plus"></i>
        </button>
        <button className={classes.btn} onClick={destinacijeEdit}>
          Ažuriraj<i className="fa-solid fa-pen-to-square"></i>
        </button>
        <button className={classes.btn} onClick={deleteConfirm}>
          Obriši<i className="fa-solid fa-trash"></i>
        </button>

        {/* <button className={classes.btn} onClick={imageUpload}>
          Dodaj<i className="fa-solid fa-plus"></i>
        </button> */}
      </div>
    </div>
  )
}

export default Destinacije
