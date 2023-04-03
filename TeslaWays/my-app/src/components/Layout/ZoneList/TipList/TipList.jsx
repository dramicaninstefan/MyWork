import { Fragment } from 'react'
import { useState } from 'react'
import classes from './TipList.module.css'
import TipDes from './TipListDest/TipDes'

const TipList = (props) => {
  const [tipProp, setTipProp] = useState('')
  const [isClicked, setIsClicked] = useState(false)

  function tipProps() {
    setTipProp(props.id_tip)
    handleClick()
  }

  function handleClick() {
    setIsClicked((current) => !current)
  }

  const filteredStations = props.api.filter((zone) => zone.tip === tipProp && zone.zona === props.zona)

  return (
    <Fragment>
      <div className={`${classes['sub-item']} ${isClicked ? classes.active : null}`} onClick={tipProps}>
        {props.naziv}
      </div>

      <div className={classes['sub-item-list']}>
        {filteredStations?.map((filtered) => (
          <TipDes key={filtered.id} filtered={filtered} isClicked={isClicked} />
        ))}
      </div>
    </Fragment>
  )
}

export default TipList
