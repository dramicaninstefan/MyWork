import { Fragment } from 'react'
import { motion } from 'framer-motion'

import Backplate from './Backplate/Backplate'
import Header from '../Header/Header'
import Card from './Cards/Card'
import Footer from '../Footer/Footer'

import TabTitle from '../general/TabTitle'

import classes from './Home.module.css'

import contentImage1 from '../../assets/contentImage1.jpg'
import contentImage2 from '../../assets/contentImage2.jpg'
import contentImage3 from '../../assets/contentImage3.jpg'

const Home = () => {
  TabTitle(`Pet | Pocetna`)
  window.scrollTo(0, 0)

  return (
    <motion.div initial={{ opacity: 0 }} transition={{ duration: 0.5, ease: 'easeIn' }} animate={{ opacity: 1 }} exit={{ opacity: 0 }}>
      <Backplate />
      <Header />

      <Card />

      <div className={classes.main}>
        <div className={classes.content}>
          <div className={classes.left} style={{ backgroundImage: `url(${contentImage1})` }}></div>
          <div className={classes.right}></div>
          <div className={classes.left}></div>
          <div className={classes.right} style={{ backgroundImage: `url(${contentImage2})` }}></div>
          <div className={classes.right} style={{ backgroundImage: `url(${contentImage3})` }}></div>
          <div className={classes.left}></div>
        </div>

        <h1 className={classes.quote}>Vaš pas naša odgovornost.</h1>
      </div>

      <Footer />
    </motion.div>
  )
}

export default Home
