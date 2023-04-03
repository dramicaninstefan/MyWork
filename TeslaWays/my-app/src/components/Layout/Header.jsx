import { Fragment, useRef } from 'react'
import { useState, useEffect } from 'react'
import { NavLink } from 'react-router-dom'
import axios from 'axios'

import { useTranslation } from 'react-i18next'

import ZoneList from './ZoneList/ZoneList'

import logoImage from '../../assets/logo.png'
import srb from '../../assets/serbia.png'
import uk from '../../assets/united-kingdom.png'

import classes from './Header.module.css'
import styles from '././ZoneList/ZoneList.module.css'

const Header = () => {
  const [zones, setZones] = useState([])
  const [destinations, setDestinations] = useState([])
  const [isClicked, setIsClicked] = useState(false)
  const [isOpen, setIsOpen] = useState(false)
  const [index, setIndex] = useState('')

  function handleClick() {
    setIsClicked((current) => !current)
    setIsOpen(false)
    setIndex('')
  }

  function handleOpen() {
    setIsOpen((current) => !current)
    setIsClicked(false)
    setIndex('')
  }

  const divEls = useRef([])
  divEls.current = []

  const h3Els = useRef([])
  h3Els.current = []

  const menuRef = useRef([])
  const menuBtnRef = useRef([])

  const navRef = useRef([])
  const navBtnRef = useRef([])

  const addToH3Ref = (el) => {
    if (el && !h3Els.current.includes(el)) {
      h3Els.current.push(el)

      h3Els.current?.map((element, idx) => {
        element.addEventListener('click', () => setIndex(idx))
        element.addEventListener('dblclick', () => setIndex(''))

        return () => {
          element.removeEventListener('click', () => setIndex(idx))
          element.removeEventListener('dblclick', () => setIndex(''))
        }
      })

      h3Els.current?.map((element3, idx3) => {
        if (index === idx3) {
          element3.classList.add(`${styles.active}`)
        } else {
          element3.classList.remove(`${styles.active}`)
        }
      })
    }
  }

  const addToDivRef = (el) => {
    if (el && !divEls.current.includes(el)) {
      divEls.current.push(el)

      divEls.current?.map((element2, idx2) => {
        if (index === idx2) {
          element2.classList.add(`${styles.open}`)
        } else {
          element2.classList.remove(`${styles.open}`)
        }
      })
    }
  }

  useEffect(() => {
    let handler = (e) => {
      if (!menuRef.current.contains(e.target) && !menuBtnRef.current.contains(e.target)) {
        setIsOpen(false)
        setIndex('')
      }
    }
    document.body.addEventListener('click', handler)
    return () => document.body.addEventListener('click', handler)
  }, [])

  useEffect(() => {
    let handler = (e) => {
      if (!navRef.current.contains(e.target) && !navBtnRef.current.contains(e.target)) {
        setIsClicked(false)
      }
    }
    document.body.addEventListener('click', handler)
    return () => document.body.addEventListener('click', handler)
  }, [])

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/zone')
      .then((res) => setZones(res.data))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  useEffect(() => {
    axios
      .get('http://teslaways.net/api/api/destinacije')
      .then((res) => setDestinations(res.data))
      .catch((err) => {
        console.log(err)
      })
  }, [])

  const { t, i18n } = useTranslation()

  const handleChangeLng = (lng) => {
    i18n.changeLanguage(lng)

    localStorage.setItem('lng', lng)
  }

  return (
    <Fragment>
      <header>
        <nav>
          <ul>
            <li className={classes.navLinks}>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
                {t('Pocetna')}
              </NavLink>
            </li>
            <li className={classes.navLinks}>
              <NavLink
                className={({ isActive }) => (isActive ? classes.active : undefined)}
                to="/lokacije"
                end
              >
                <i className="fas fa-location-dot"></i>
                {t('Lokacije')}
              </NavLink>
            </li>
            <li className={classes.navLinks}>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/vesti" end>
                <i className="fa-solid fa-newspaper"></i>
                {t('Novosti i zanimljivosti')}
              </NavLink>
            </li>

            <li className={classes.navLinks}>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/o_nama" end>
                {t('O nama')}
              </NavLink>
            </li>
            <li className={classes.navLinks}>
              <a href="#footer">{t('Kontakt')}</a>
            </li>
          </ul>
        </nav>

        <div className={classes.language}>
          <button className={classes['lng-btn']} onClick={() => handleChangeLng('srb')}>
            <img src={srb} alt="" />
          </button>
          <button className={classes['lng-btn']} onClick={() => handleChangeLng('en')}>
            <img src={uk} alt="" />
          </button>
        </div>

        <div className={classes['hamburger-icon']}>
          <label htmlFor="check" className={classes.bar} ref={navBtnRef}>
            <input
              id="check"
              type="checkbox"
              onClick={handleClick}
              checked={isClicked}
              onChange={(current) => !current}
            />
            <span className={classes.top}></span>
            <span className={classes.middle}></span>
            <span className={classes.bottom}></span>
          </label>
          <ul
            ref={navRef}
            className={isClicked ? `${classes['mobile-menu']} ${classes.open}` : classes['mobile-menu']}
          >
            <li className={classes.navLinks}>
              <NavLink
                className={({ isActive }) => (isActive ? classes.active : undefined)}
                onClick={isClicked}
                to="/"
                end
              >
                {t('Pocetna')}
              </NavLink>
            </li>
            <li className={classes.navLinks}>
              <NavLink
                className={({ isActive }) => (isActive ? classes.active : undefined)}
                to="/lokacije"
                onClick={isClicked}
                end
              >
                <i className="fas fa-location-dot"></i>
                {t('Lokacije')}
              </NavLink>
            </li>
            <li className={classes.navLinks}>
              <NavLink
                className={({ isActive }) => (isActive ? classes.active : undefined)}
                onClick={isClicked}
                to="/vesti"
                end
              >
                <i className="fa-solid fa-newspaper"></i>
                {t('Novosti i zanimljivosti')}
              </NavLink>
            </li>

            <li className={classes.navLinks}>
              <NavLink
                className={({ isActive }) => (isActive ? classes.active : undefined)}
                onClick={isClicked}
                to="/o_nama"
                end
              >
                {t('O nama')}
              </NavLink>
            </li>
            <li className={classes.navLinks}>
              <a href="#footer" onClick={handleClick}>
                {t('Kontakt')}
              </a>
            </li>
            <div className={classes['language-sidebar']}>
              <button className={classes['lng-btn']} onClick={() => handleChangeLng('srb')}>
                <img src={srb} alt="" />
              </button>
              <button className={classes['lng-btn']} onClick={() => handleChangeLng('en')}>
                <img src={uk} alt="" />
              </button>
            </div>
          </ul>
        </div>
      </header>
      <div
        ref={menuRef}
        className={
          isOpen ? `${classes['side-bar-container']} ${classes.open}` : classes['side-bar-container']
        }
      >
        <div className={classes['side-bar']}>
          <div className={classes.menu}>
            <h2 className={classes.title}>{t('Zone')}</h2>

            {zones?.map((niz) => (
              <ZoneList
                key={niz.naziv}
                naziv={niz.naziv}
                zona={niz.id_zone}
                api={destinations}
                refDivEl={addToDivRef}
                refH3El={addToH3Ref}
              />
            ))}
          </div>
        </div>
      </div>

      <div className={classes['sidebar-toggle']} ref={menuBtnRef}>
        <div className={classes.sidebarBtn}>
          <div className={classes.switch}>
            <input type="checkbox" onClick={handleOpen} checked={isOpen} onChange={(current) => !current} />
            <div>
              <span className={classes['line-1']}></span>
              <span className={classes['line-2']}></span>
              <span className={classes['line-3']}></span>
            </div>
          </div>
        </div>
      </div>

      <div className={classes.logo}>
        <img src={logoImage} alt="TeslaWays-Logo" />
      </div>
    </Fragment>
  )
}

export default Header
