import React, { Fragment } from 'react';

import classes from './Team.module.css';

import team1 from '../../../assets/img/team/team-1.jpg';
import team2 from '../../../assets/img/team/team-2.jpg';
import team3 from '../../../assets/img/team/team-3.jpg';

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
                  <a href="#">
                    <i className="bi bi-twitter-x"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-facebook"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-instagram"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-linkedin"></i>
                  </a>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="200">
              <div className={classes['member-img']}>
                <img src={team2} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <a href="#">
                    <i className="bi bi-twitter-x"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-facebook"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-instagram"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-linkedin"></i>
                  </a>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium aut quod dolores exercitationem ut</p>
              </div>
            </div>

            <div className={`${classes.member} col-lg-4 col-md-6`} data-aos="fade-up" data-aos-delay="300">
              <div className={classes['member-img']}>
                <img src={team3} className="img-fluid" alt="" />
                <div className={classes.social}>
                  <a href="#">
                    <i className="bi bi-twitter-x"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-facebook"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-instagram"></i>
                  </a>
                  <a href="#">
                    <i className="bi bi-linkedin"></i>
                  </a>
                </div>
              </div>
              <div className={`${classes['member-info']} text-center`}>
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut praesentium vel tque sed facilis at qui</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Team;