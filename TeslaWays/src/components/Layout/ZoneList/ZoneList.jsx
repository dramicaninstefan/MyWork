import { useState, useEffect, Fragment } from 'react'
import axios from 'axios'
import TipList from './TipList/TipList.jsx'
import classes from './ZoneList.module.css'

const ZoneList = (props) => {
  const [api, setApi] = useState([])
  const [zonaProp, setZonaProp] = useState('')


  function zonaProps() {
    setZonaProp(props.zona)
  }

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api')
      .then((res) => setApi(res.data))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  const tip = api.tip

  return (
    <Fragment>
      <div className={classes.item}>
        <h3 ref={props.refH3El} className={`${classes.title}`} onClick={zonaProps}>
          {props.naziv}
          <i className="fa-solid fa-chevron-down"></i>
        </h3>
        <div ref={props.refDivEl} className={classes['sub-menu']}>
          {tip?.map((tip) => (
            <TipList
              key={tip.id_tip}
              id={tip.id_tip}
              naziv={tip.naziv_tipa}
              id_tip={tip.id_tip}
              zona={zonaProp}
              api={props.api}
            />
          ))}
        </div>
      </div>
    </Fragment>
  )
}

export default ZoneList
