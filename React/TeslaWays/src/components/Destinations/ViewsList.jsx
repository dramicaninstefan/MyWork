import { Fragment } from 'react'
import { Link } from 'react-router-dom'
import classes from './ViewsList.module.css'

const ViewsList = (props) => {
  return (
    <Fragment>
      <li className={classes.list}>
        <div className={classes.polaroid}>
          <Link to={`/lokacije/${props.id}`} title={props.title}>
            <span></span>
            <img
              src={`http://teslaways.net/images/destinacije/thumbnails_large/${props.id_zone}/${props.thumb}.jpg`}
              alt={props.title}
              title={props.title}
            />
            <h2 className={classes.title}>{props.title}</h2>
          </Link>
        </div>
      </li>
    </Fragment>
  )
}

export default ViewsList
