import { Fragment, useState, useEffect } from 'react'
import axios from 'axios'
import { useParams } from 'react-router-dom'

import { TabTitle } from '../../general/GeneralFuntions'
import Loader from '../../routes/Loader'

import classes from './ViewsDetail.module.css'

const ViewsDetals = () => {
  const params = useParams()

  const [viewsDetail, setViewsDetail] = useState([])
  const [isLoading, setIsLoading] = useState(false)

  useEffect(() => {
    setIsLoading(true)
    axios
      .get(`http://teslaways.net/api/api/destinacije/${params.views_id}`)
      .then((res) => {
        setViewsDetail(res.data[0])
        setIsLoading(false)
      })
      .catch((err) => {
        console.log(err)
      })
  }, [params.views_id])

  window.scrollTo(0, 0)

  TabTitle(`TeslaWays | ${viewsDetail.naslov}`)

  const duziTekst = `${viewsDetail.duzi_text}`
  const kraciTekst = `${viewsDetail.kraci_text}`

  return (
    <Fragment>
      <main>
        {isLoading ? (
          <div className={classes.center}>
            <Loader></Loader>
          </div>
        ) : (
          <div className={classes.page}>
            <h1 className={classes.title}>{viewsDetail.naslov}</h1>
            <p className={classes.tekst}>{viewsDetail.adresa}</p>
            <img
              className={classes.image}
              src={`http://teslaways.net/images/destinacije/thumbnails_large/${viewsDetail.id_zone}/${viewsDetail.thumb_large}.jpg`}
              alt={viewsDetail.naslov}
            />
            <p
              className={classes.tekst}
              dangerouslySetInnerHTML={{ __html: duziTekst }}
            />
            <p
              className={classes.tekst}
              dangerouslySetInnerHTML={{ __html: kraciTekst }}
            />
          </div>
        )}
      </main>
    </Fragment>
  )
}

export default ViewsDetals
