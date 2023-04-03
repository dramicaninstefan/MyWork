import React, { Fragment } from 'react'
import { TabTitle } from '../../general/GeneralFuntions'
import { Link } from 'react-router-dom'

import { useTranslation } from 'react-i18next'

import classes from './DestinationList.module.css'

const DestinationList = (props) => {
  TabTitle(`TeslaWays | Lokacije`)

  const { t } = useTranslation()

  const kraciTekst = `${props.kraci_text}`

  return (
    <Fragment>
      <div className={classes.list}>
        <div className={classes.image}>
          <img
            src={`http://teslaways.net/images/destinacije/thumbnails_large/${props.zona}/${props.thumb}.jpg`}
            alt={props.title}
          />
        </div>
        <div className={classes.content}>
          <h1 className={classes.title}>{props.title}</h1>
          <h3 className={classes.zone}>{props.id_zone}</h3>
          <p className={classes.tekst} dangerouslySetInnerHTML={{ __html: kraciTekst }} />
          <Link to={`/lokacije/${props.id}`} className={classes['learn-more']}>
            <span className={classes.circle} aria-hidden="true">
              <span className={`${classes.icon} ${classes.arrow}`}></span>
            </span>
            <span className={classes['button-text']}>{t('Detaljnije')}</span>
          </Link>
        </div>
      </div>
    </Fragment>
  )
}

export default DestinationList
