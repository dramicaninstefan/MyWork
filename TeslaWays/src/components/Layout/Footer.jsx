import { Fragment } from 'react'

import { useTranslation } from 'react-i18next'

import classes from './Footer.module.css'

const Footer = () => {
  function toTop() {
    window.scrollTo(0, 0)
  }

  const { t } = useTranslation()

  return (
    <Fragment>
      <div className={classes.wrapper}>
        <div className={classes.banners}>
          <div className={classes.banner}>
            <img src="http://teslaways.net/images/baners/tesla.png" alt="logo1" />
          </div>
          <div className={classes.banner}>
            <img src="http://teslaways.net/images/baners/teslaEPS.png" alt="logo2" />
          </div>
          <div className={classes.banner}>
            <img src="http://teslaways.net/images/baners/teslaITA.png" alt="logo3" />
          </div>
          <div className={classes.banner}>
            <img src="http://teslaways.net/images/baners/teslaKLASTER.png" alt="logo4" />
          </div>
          <div className={classes.banner}>
            <img src="http://teslaways.net/images/baners/teslaMUZEJ.png" alt="logo5" />
          </div>
          <div className={classes.banner}>
            <img src="http://teslaways.net/images/baners/teslaTOS.png" alt="logo6" />
          </div>
        </div>
      </div>

      <div className={classes.btn}>
        <button onClick={toTop}>
          <div className={classes.text}>
            <span>{t('Idi')}</span>
            <span>{t('na')}</span>
            <span>{t('vrh')}</span>
          </div>
          <div className={classes.clone}>
            <span>{t('Idi')}</span>
            <span>{t('na')}</span>
            <span>{t('vrh')}</span>
          </div>
          <svg
            width="20px"
            xmlns="http://www.w3.org/2000/svg"
            className="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            strokeWidth="2"
          >
            <path strokeLinecap="round" strokeLinejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </button>
      </div>

      <div id="footer" className={classes.footer}>
        <div className={classes.container}>
          <h2>Kontakt</h2>
          <p>
            Zavod za proučavanje kulturnog razvitka <br /> Rige od Fere 4 <br /> 11000 Beograd
          </p>
        </div>
        <p className={classes.tm}>TESLAWAYS 2023 &copy; </p>
      </div>
    </Fragment>
  )
}

export default Footer
