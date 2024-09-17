import React, { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './Team.module.css';

import team1 from '../../../assets/img/team/team-1.png';
import team2 from '../../../assets/img/team/team-2.png';
import team3 from '../../../assets/img/team/team-3.png';
import team4 from '../../../assets/img/team/team-4.png';
import team5 from '../../../assets/img/team/team-5.png';
import team6 from '../../../assets/img/team/team-6.png';

const Team = () => {
  return (
    <Fragment>
      <section id="team" className={`${classes.team} section`}>
        <div className="container section-title" data-aos="fade-up">
          <h2>Naš tim</h2>
        </div>

        <div className="container">
          <div className="row gy-5">
            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="100">
              <div className={classes['member-img']}>
                <img src={team1} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <Link href="#">
                    <i className="bi bi-twitter-x"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-facebook"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-instagram"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-linkedin"></i>
                  </Link>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Goran Dramićanin, dipl.inž.</h4>
                <span>Savetnik za osiguranja - Direktor</span>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="200">
              <div className={classes['member-img']}>
                <img src={team2} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <Link href="#">
                    <i className="bi bi-twitter-x"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-facebook"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-instagram"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-linkedin"></i>
                  </Link>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Mirjana Jokić, Ekon.</h4>
                <span>Office asistent</span>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="300">
              <div className={classes['member-img']}>
                <img src={team3} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <Link href="#">
                    <i className="bi bi-twitter-x"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-facebook"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-instagram"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-linkedin"></i>
                  </Link>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Željko Simić, dipl.inž</h4>
                <span>Savetnik za osiguranje vozila</span>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="300">
              <div className={classes['member-img']}>
                <img src={team4} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <Link href="#">
                    <i className="bi bi-twitter-x"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-facebook"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-instagram"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-linkedin"></i>
                  </Link>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Srđan Petrović, dipl. inž.</h4>
                <span>Savetnik za imovinska osiguranja</span>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="300">
              <div className={classes['member-img']}>
                <img src={team5} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <Link href="#">
                    <i className="bi bi-twitter-x"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-facebook"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-instagram"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-linkedin"></i>
                  </Link>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Stanislava Minić, master menadž.</h4>
                <span>Savetnik za životna osiguranja</span>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="300">
              <div className={classes['member-img']}>
                <img src={team6} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <Link href="#">
                    <i className="bi bi-twitter-x"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-facebook"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-instagram"></i>
                  </Link>
                  <Link href="#">
                    <i className="bi bi-linkedin"></i>
                  </Link>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Borivoje Marković, dipl.prav.</h4>
                <span>Diplomirani pravnik</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Team;
