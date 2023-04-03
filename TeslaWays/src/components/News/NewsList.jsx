import { Fragment } from 'react'
import { Link } from 'react-router-dom'

import classes from './NewsList.module.css'

const NewsList = (props) => {
  return (
    <Fragment>
      <Link to={`/vesti/${props.id}`} className={classes.cardLink}>
      <li className={classes['card']}>
        <div className={classes['card-details']}>
          <div className={classes['card-box']}>
            <img
              className={classes['card-image']}
              src={`http://teslaways.net/images/vesti/thumbnails/${props.id_zone}/${props.thumb}.jpg`}
              alt={props.title}
            />
            <h2 className={classes['text-title']}>{props.title}</h2>
          </div>
          <p className={classes['text-body']}>{props.zone}</p>
        </div>
      </li> 
      </Link>
      
    </Fragment>
  )
}

export default NewsList
