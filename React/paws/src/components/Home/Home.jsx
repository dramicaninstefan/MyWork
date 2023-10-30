import { Fragment } from 'react'
import { motion } from 'framer-motion'

import Backplate from './Backplate/Backplate'
import Header from '../Header/Header'
import Card from './Cards/Card'
import Comments from '../Comments/Comments'
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
          <div className={classes.contentImage} style={{ backgroundImage: `url(${contentImage1})` }}></div>
          <div className={classes.contentItem}>
            <h1 className={classes.contentTitle}>Sigurnost</h1>
            <div className={classes.contentItems}>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
            </div>
          </div>
          <div className={classes.contentItem} style={{ backgroundColor: 'var(--fifth-color)' }}>
            <h1 className={classes.contentTitle}>Briga</h1>
            <div className={classes.contentItems}>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
            </div>
          </div>
          <div className={classes.contentImage} style={{ backgroundImage: `url(${contentImage2})` }}></div>
          <div className={classes.contentImage} style={{ backgroundImage: `url(${contentImage3})` }}></div>
          <div className={classes.contentItem}>
            <h1 className={classes.contentTitle}>Komfor</h1>
            <div className={classes.contentItems}>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
              <div className={classes.item}>
                <h3>Naslov</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore, cupiditate? Rerum, minima veritatis. Error nulla qui modi velit beatae magni officiis placeat quisquam possimus
                  dolore?
                </p>
              </div>
            </div>
          </div>
        </div>

        <h1 className={classes.quote}>Vaš pas naša odgovornost.</h1>

        <div className={classes.comments}>
          <Comments></Comments>
        </div>
      </div>

      <Footer />
    </motion.div>
  )
}

export default Home
