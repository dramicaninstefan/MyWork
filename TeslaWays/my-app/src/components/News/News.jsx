import { Fragment } from 'react'
import { useTranslation } from 'react-i18next'

import Loader from '../routes/Loader'
import classes from './News.module.css'
import NewsList from './NewsList'

const News = (props) => {
  const { vesti } = props.data

  const { t } = useTranslation()

  return (
    <Fragment>
      <div className={classes.container}>
        <h2 className={classes.naslov}>{t('VESTI')}</h2>
        <div className={classes.news}>
          {!props.isLoading && (
            <ul>
              {vesti?.map((vest) => (
                <NewsList
                  key={vest.id_vesti}
                  id={vest.id_vesti}
                  title={vest.naslov}
                  zone={vest.naziv_zone}
                  thumb={vest.thumb}
                  id_zone={vest.id_zone}
                />
              ))}
            </ul>
          )}
          {props.isLoading && <Loader></Loader>}
        </div>
      </div>
    </Fragment>
  )
}

export default News
