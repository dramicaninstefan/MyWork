import React from 'react'
import classes from './AllNewsList.module.css'
import { Fragment } from 'react'
import { Link } from 'react-router-dom'

import { useTranslation } from 'react-i18next'

const AllNewsList = (props) => {
  const kraciTekst = `${props.kraciTekst}`

  const { t } = useTranslation()

  return (
    <Fragment>
      <div className={classes.list}>
        <div className={classes.image}>
          <img
            src={`http://teslaways.net/images/vesti/thumbnails_large/${props.destId}/${props.slika}.jpg`}
            alt=""
          />
        </div>
        <div className={classes.content}>
          <h1 className={classes.title}>{props.title}</h1>
          <p className={classes.date}>{props.datum}</p>
          <p className={classes.tekst} dangerouslySetInnerHTML={{ __html: kraciTekst }} />
          <Link to={`/vesti/${props.id}`} className={classes['learn-more']}>
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

export default AllNewsList
