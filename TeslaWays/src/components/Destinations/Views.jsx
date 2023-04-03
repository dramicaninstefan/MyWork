import { Fragment } from 'react'
import { useTranslation } from 'react-i18next'

import ViewsList from './ViewsList'
import Loader from '../routes/Loader'

import classes from './Views.module.css'

const Views = (props) => {
  const { preporuka } = props.data

  const { t } = useTranslation()

  return (
    <Fragment>
      <div className={classes.container}>
        <h2 className={classes.naslov}>{t('PREPORUKE')}</h2>
        <div className={classes.views}>
          {!props.isLoading && (
            <ul>
              {preporuka?.map((preporuke) => (
                <ViewsList
                  key={preporuke.id}
                  id={preporuke.id}
                  title={preporuke.naslov}
                  thumb={preporuke.thumb_large}
                  id_zone={preporuke.id_zone}
                  zona={preporuke.zona}
                  tip={preporuke.tip}
                  podtip={preporuke.podtip}
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

export default Views
