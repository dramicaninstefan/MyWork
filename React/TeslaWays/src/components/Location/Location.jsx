import { useState, useEffect, Fragment } from 'react'
import { MapContainer, TileLayer } from 'react-leaflet'
import axios from 'axios'

import FilterIcons from './FilterIcons/Filter'

import classes from './Location.module.css'
import MarkerPin from './Marker/Marker'

const center = [44.81022997815934, 20.458977556624504]
const center_srbija = [44.14593856292115, 20.899234778331966]

function Location() {
  const [locations, setLocations] = useState([])
  const [podTip, setPodTip] = useState([])
  const [map, setMap] = useState('')
  const [fullMap, setFullMap] = useState(true)

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/destinacije')
      .then((res) => setLocations(res.data))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api')
      .then((res) => setPodTip(res.data.podtip))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  const filteredStations = locations.filter((loc) => (fullMap ? loc : loc.podtip === map))

  var potip = []

  for (var i = 0; i < locations.length; i++) {
    potip.push(locations[i].podtip)
  }

  var podtipDuplicates = [...new Set(potip)]

  function updateMap(data) {
    setMap(data)
    setFullMap(false)
  }

  function seeAllMarkers() {
    setFullMap((current) => !current)
  }

  return (
    <Fragment>
      <div className={classes.location}>
        <MapContainer
          className={classes['leaflet-container']}
          center={center_srbija}
          zoom={7}
          scrollWheelZoom={false}
        >
          <TileLayer
            attribution='&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            url="https://api.maptiler.com/maps/streets-v2/256/{z}/{x}/{y}.png?key=uFPvY7WS8a8OMKBVmRGS"
          ></TileLayer>
          {filteredStations?.map((location) => (
            <MarkerPin
              key={location.id}
              id={location.id}
              zona={location.zona}
              title={location.naslov}
              thumb={location.thumb}
              lat={location.lat}
              lng={location.lng}
              adresa={location.adresa}
              tip={location.tip}
              podtip={location.podtip}
            />
          ))}
        </MapContainer>
        <ul className={classes.wrapper}>
          {podtipDuplicates?.map((duplicate) => (
            <FilterIcons
              key={duplicate}
              naziv={podTip[duplicate - 1]?.naziv_podtipa}
              podtip={duplicate}
              onCLick={updateMap}
              disable={seeAllMarkers}
            />
          ))}
        </ul>
        <label className={classes.switch}>
          <input type="checkbox" className={classes.checkbox} onChange={seeAllMarkers} checked={fullMap} />
          <div className={classes.slider}></div>
        </label>
      </div>
    </Fragment>
  )
}

export default Location
