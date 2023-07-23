import React, { Fragment } from 'react'

import TopButton from '../UI/TopButton'
import Main from '../UI/Main'
import Card from '../UI/Card'
import TabTitle from '../general/TabTitle'

import classes from './HomePage.module.css'

import dog1 from '../../assets/dog1.jpg'
import dog2 from '../../assets/dog2.jpg'
import dog3 from '../../assets/dog3.jpg'
import dog4 from '../../assets/dog4.jpg'
import dog5 from '../../assets/dog5.jpg'
import dog6 from '../../assets/dog6.jpg'
import CallUs from '../UI/CallUs'
import Comments from '../Comments/Comments'

const HomePage = () => {
  TabTitle(`Pet | Pocetna`)
  window.scrollTo(0, 0)

  return (
    <Fragment>
      <div className={classes.background}></div>
      <div className={classes['background-overlay']}></div>
      <Main>
        <h1 className={classes.title}>Najbolje mesto za vaše ljubimce.</h1>
        <div className="cards-container">
          <div className={classes.cards}>
            <Card text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, numquam." image={dog1} title="Igranje"></Card>
            <Card text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, numquam." image={dog2} title="Šetnja"></Card>
            <Card text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, numquam." image={dog3} title="Prostrano dvorište"></Card>
          </div>
        </div>
        <div className={classes['container']}>
          <div className={classes['content-body']}>
            <div className={classes['content-items']}>
              <div>
                <h2 className={classes['content-title']}>Sigurnost</h2>
                <p className={classes['content-text']}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, tenetur.</p>
              </div>
              <div className={classes.image} style={{ backgroundImage: `url(${dog6})` }}></div>
            </div>
            <div className={classes['content-items']}>
              <div className={classes.image} style={{ backgroundImage: `url(${dog5})` }}></div>
              <div>
                <h2 className={classes['content-title']}>Briga</h2>
                <p className={classes['content-text']}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, tenetur.</p>
              </div>
            </div>
            <div className={classes['content-items']}>
              <div>
                <h2 className={classes['content-title']}>Komfor</h2>
                <p className={classes['content-text']}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, tenetur.</p>
              </div>
              <div className={classes.image} style={{ backgroundImage: `url(${dog4})` }}></div>
            </div>
          </div>
          <h1 className={classes.quote}>Vaš pas naša odgovornost.</h1>
          <div className={classes.comments}>
            {/* <Comment user="Card1" />
            <Comment user="Card2" />
            <Comment user="Card3" />
            <Comment user="Card4" /> */}
            <Comments></Comments>
          </div>
        </div>

        <CallUs />
        {/* <TopButton /> */}
      </Main>
    </Fragment>
  )
}

export default HomePage
