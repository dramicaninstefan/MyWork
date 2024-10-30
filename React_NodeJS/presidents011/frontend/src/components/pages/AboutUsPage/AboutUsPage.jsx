import React, { Fragment, useEffect } from 'react';
import { Link } from 'react-router-dom';

const AboutUsPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <div className="page-title dark-background">
        <div className="position-relative">
          <h1>O Nama</h1>
          <nav className="breadcrumbs">
            <ol>
              <li>
                <Link to="/">Početna</Link>
              </li>
              <li className="current">O Nama</li>
            </ol>
          </nav>
        </div>
      </div>
    </Fragment>
  );
};

export default AboutUsPage;
