import { Fragment, useState, useEffect } from 'react'
import axios from 'axios'
import { useParams } from 'react-router-dom'
import classes from './NewsDetail.module.css'
import { TabTitle } from '../../general/GeneralFuntions'
import Loader from '../../routes/Loader'

const NewsDetals = () => {
  const params = useParams()
  const [newsPage, setPage] = useState([])
  const [isLoading, setIsLoading] = useState(false)

  useEffect(() => {
    setIsLoading(true)
    axios
      .get(`http://teslaways.net/api/api/novosti/${params.news_id}`)
      .then((res) => {
        setPage(res.data[0])
        setIsLoading(false)
      })
      .catch((err) => {
        console.log(err)
      })
  }, [params.news_id])

  window.scrollTo(0, 0)

  TabTitle(`TeslaWays | ${newsPage.naslov}`)

  const duziTekst = `${newsPage.duzi_text}`
  const kraciTekst = `${newsPage.kraci_text}`

  return (
    <Fragment>
      <main>
        {isLoading ? (
          <div className={classes.wrapper}>
            <div className={classes.center}>
              <Loader></Loader>
            </div>
          </div>
        ) : (
          <div className={classes.page}>
            <p className={classes.datum}>{newsPage.datum}</p>
            <h1 className={classes.title}>{newsPage.naslov}</h1>
            <p
              className={classes.tekst}
              dangerouslySetInnerHTML={{ __html: duziTekst }}
            />
            <img
              className={classes.image}
              src={`http://teslaways.net/images/vesti/thumbnails_large/${newsPage.id_destinacije}/${newsPage.thumb}.jpg`}
              alt={newsPage.naslov}
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

export default NewsDetals
