import React, { Fragment } from 'react'

import classes from './HomePage.module.css'
import Card from '../UI/Card'

import dog1 from '../../assets/dog1.jpg'
import dog2 from '../../assets/dog2.jpg'
import dog3 from '../../assets/dog3.jpg'
import dog4 from '../../assets/dog4.jpg'
import dog5 from '../../assets/dog5.jpg'
import dog6 from '../../assets/dog6.jpg'

const HomePage = () => {
  return (
    <Fragment>
      <div className={classes.background}></div>
      <div className={classes['background-overlay']}></div>
      <main className={classes.wrapper}>
        <h1 className={classes.title}>Najbolje mesto za vaše ljubimce.</h1>
        <div className={classes.cards}>
          <Card text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, numquam." image={dog1} title="Igranje"></Card>
          <Card text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, numquam." image={dog2} title="Šetnja"></Card>
          <Card text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, numquam." image={dog3} title="Prostrano dvorište"></Card>
        </div>
        <div className={classes['container']}>
          <div className={classes['content-body']}>
            <div className={classes['content-items']}>
              <div>
                <h2 className={classes['content-title']}>Sigurnost</h2>
                <p className={classes['content-text']}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, tenetur.</p>
              </div>
              <img src={dog6} alt="dog" />
            </div>
            <div className={classes['content-items']}>
              <img src={dog5} alt="dog" />
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
              <img src={dog4} alt="dog" />
            </div>
          </div>
          <h1>Vaš pas naša odgovornost.</h1>
        </div>
        <button
          onClick={() => {
            window.scrollTo(0, 0)
          }}
        >
          <div className={classes.text}>
            <span>Idi</span>
            <span>na</span>
            <span>vrh</span>
          </div>
          <div className={classes.clone}>
            <span>Idi</span>
            <span>na</span>
            <span>vrh</span>
          </div>
          <svg width="20px" xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </button>
      </main>
    </Fragment>
  )
}

export default HomePage
