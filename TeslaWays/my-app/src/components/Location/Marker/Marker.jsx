import { Marker, Popup } from 'react-leaflet'
import { Link } from 'react-router-dom'
import * as L from 'leaflet'
import { Fragment } from 'react'
import { useTranslation } from 'react-i18next'

import classes from './Marker.module.css'

const MarkerPin = (props) => {
  const LeafIcon = L.Icon.extend({
    options: {},
  })

  const Icon = new LeafIcon({
    iconUrl: `http://teslaways.net/images/markeri/podtip_${props.podtip}.png`,

    iconSize: [35, 35], // size of the icon
    iconAnchor: [5, 40], // point of the icon which will correspond to marker's location
    popupAnchor: [11.5, -35], // point from which the popup should open relative to the iconAnchor
  })

  const { t } = useTranslation()

  return (
    <Fragment>
      <Marker position={[props.lat, props.lng]} icon={Icon}>
        <Popup>
          <div className={classes.popup}>
            <div className={classes['popup-info']}>
              <img
                src={`http://teslaways.net/images/destinacije/thumbnails_large/${props.zona}/${props.thumb}.jpg`}
                alt=""
              />
              <div className={classes.naslov}>
                <h2>{props.title}</h2>
              </div>
            </div>

            <div className={classes.adresa}>
              <h3>
                {t('Adresa')}: {props.adresa}
              </h3>
            </div>
            <Link to={`/lokacije/${props.id}`} className={classes.btn}>
              {t('O lokaciji')}
            </Link>
          </div>
        </Popup>
      </Marker>
    </Fragment>
  )
}

export default MarkerPin
