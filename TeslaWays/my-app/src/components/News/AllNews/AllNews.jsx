import React, { useEffect, useState } from 'react'
import axios from 'axios'
import AllNewsList from './AllNewsList'
import classes from './AllNews.module.css'
import { TabTitle } from '../../general/GeneralFuntions'
import Loader from '../../routes/Loader'

const AllNews = () => {
  TabTitle(`TeslaWays | Novosti i Zanimljivosti`)

  const [sveVesti, setSveVesti] = useState([])
  const [isLoading, setIsLoading] = useState(false)

  useEffect(() => {
    setIsLoading(true)
    axios
      .get(`http://teslaways.net/api/api/novosti`)
      .then((res) => {
        setSveVesti(res.data)
        setIsLoading(false)
      })
      .catch((err) => {
        console.log(err)
      })
  }, [])

  window.scrollTo(0, 0)

  return (
    <main>
      <div className={classes.container}>
        <div className={classes.allNews}>
          {isLoading ? (
            <div className={classes.center}>
              <Loader></Loader>
            </div>
          ) : (
            sveVesti?.map((vest) => (
              <AllNewsList
                key={vest.id_vesti}
                id={vest.id_vesti}
                title={vest.naslov}
                datum={vest.datum}
                duziTekst={vest.duzi_text}
                kraciTekst={vest.kraci_text}
                destId={vest.id_destinacije}
                slika={vest.thumb_large}
              />
            ))
          )}
        </div>
      </div>
    </main>
  )
}

export default AllNews
