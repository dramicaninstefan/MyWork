import React, { Fragment } from 'react';

import team1 from '../../../../assets/img/team/team-1.png';
import team2 from '../../../../assets/img/team/team-2.png';
import team3 from '../../../../assets/img/team/team-3.png';
import team4 from '../../../../assets/img/team/team-4.png';

const Team = () => {
  return (
    <Fragment>
      <section id="team" class="team section light-background">
        <div class="container section-title" data-aos="fade-up">
          <h2>Naš tim</h2>
          <p>{/* <span>Naš Vredan</span> <span class="description-title">Tim</span> */}</p>
        </div>

        <div class="container d-flex justify-content-center">
          <div class="row gy-4 col-lg-12 col-10">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="team-member">
                <div class="member-img">
                  <img src={team1} class="img-fluid" alt="" />
                </div>
                <div class="member-info">
                  <h4>
                    Goran Petrović,
                    <br /> dipl.inž.
                  </h4>
                  <span>Savetnik za osiguranja - Direktor</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="team-member">
                <div class="member-img">
                  <img src={team2} class="img-fluid" alt="" />
                </div>
                <div class="member-info">
                  <h4>
                    Ana Marković,
                    <br /> Ekon.
                  </h4>
                  <span>Office asistent</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
              <div class="team-member">
                <div class="member-img">
                  <img src={team3} class="img-fluid" alt="" />
                </div>
                <div class="member-info">
                  <h4>
                    Marko Kovačević,
                    <br /> dipl.prav.
                  </h4>
                  <span>Advokat</span>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="team-member">
                <div class="member-img">
                  <img src={team4} class="img-fluid" alt="" />
                </div>
                <div class="member-info">
                  <h4>
                    Nemanja Nikolić, <br /> dipl.maš.inž
                  </h4>
                  <span>Sudski veštak - procenitelj šteta</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Team;
