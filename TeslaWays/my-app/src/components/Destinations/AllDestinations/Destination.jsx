import { useState, useEffect, Fragment } from 'react'
import axios from 'axios'

import DestinationList from './DestinationList'
import Loader from '../../routes/Loader'

import classes from './Destination.module.css'

const Destination = () => {
  const [destinations, setDestinations] = useState([])
  const [isLoading, setIsLoading] = useState(false)

  useEffect(() => {
    setIsLoading(true)
    axios
      .get('http://teslaways.net/api/api/destinacije')
      .then((res) => {
        setDestinations(res.data)
        setIsLoading(false)
      })
      .catch((err) => {
        console.log(err)
      })
  }, [])

  window.scrollTo(0, 0)

  return (
    <Fragment>
      <main>
        <div className={classes.container}>
          <div className={classes.destinations}>
            {isLoading ? (
              <div className={classes.center}>
                <Loader></Loader>
              </div>
            ) : (
              destinations?.map((destination) => (
                <DestinationList
                  key={destination.id}
                  id={destination.id}
                  id_zone={destination.naziv_zone}
                  zona={destination.zona}
                  title={destination.naslov}
                  thumb={destination.thumb}
                  kraci_text={destination.kraci_text}
                  adresa={destination.adresa}
                  tip={destination.tip}
                  podtip={destination.podtip}
                />
              ))
            )}
          </div>
        </div>
      </main>
    </Fragment>
  )
}

export default Destination
