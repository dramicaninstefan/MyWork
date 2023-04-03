import { Fragment } from 'react'
import classes from './Filter.module.css'

const FilterIcons = (props) => {
  function handleClick() {
    props.onCLick(props.podtip)
  }

  return (
    <Fragment>
      <li className={classes.icon}>
        <span className={classes.tooltip}>{props.naziv}</span>
        <button className={classes.btn} onClick={handleClick}>
          <img
            src={`http://teslaways.net/images/markeri/podtip_${props.podtip}.png`}
            alt=""
          />
        </button>
      </li>
    </Fragment>
  )
}

export default FilterIcons
