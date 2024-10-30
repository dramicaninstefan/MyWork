import React, { Fragment, useEffect, useState } from 'react';
import { NavLink, Link } from 'react-router-dom';

import './Header.css';

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false); // isScrolled
  const [scrollPosition, setScrollPosition] = useState(0); // scrollPosition
  const [humburger, setHumburger] = useState(false); // scrollPosition

  useEffect(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });

    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);

  // Change header bg color on scroll
  const handleScroll = () => {
    const position = window.scrollY || window.pageYOffSet;
    setScrollPosition(position);
  };

  useEffect(() => {
    scrollPosition > 80 ? setIsScrolled(true) : setIsScrolled(false);
  }, [scrollPosition]);

  const handeMobileNavTogggle = () => {
    setHumburger((current) => !current);
    document.body.classList.toggle('mobile-nav-active');
  };

  return (
    <Fragment>
      <div className={isScrolled ? `scrolled` : ``}>
        <header id="header" className="header d-flex align-items-center fixed-top">
          <div className="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <Link to="/" className="logo d-flex align-items-center">
              {/* <img src="assets/img/logo.png" alt="" /> */}
              <h1 className="sitename">Presidents 011</h1>
            </Link>

            <nav id="navmenu" className="navmenu">
              <ul>
                <li>
                  <NavLink
                    className={({ isActive }) => (isActive ? `active` : ``)}
                    to="/"
                    onClick={() => {
                      handeMobileNavTogggle();
                    }}
                  >
                    Početna
                  </NavLink>
                </li>
                <li>
                  <NavLink
                    className={({ isActive }) => (isActive ? `active` : ``)}
                    to="/o-nama"
                    onClick={() => {
                      handeMobileNavTogggle();
                    }}
                  >
                    O Nama
                  </NavLink>
                </li>
                <li>
                  <NavLink
                    className={({ isActive }) => (isActive ? `active` : ``)}
                    to="/blog"
                    onClick={() => {
                      handeMobileNavTogggle();
                    }}
                  >
                    Blog
                  </NavLink>
                </li>
                <li>
                  <NavLink
                    className={({ isActive }) => (isActive ? `active` : ``)}
                    to="/kontakt"
                    onClick={() => {
                      handeMobileNavTogggle();
                    }}
                  >
                    Kontakt
                  </NavLink>
                </li>
              </ul>
              <i
                className={`mobile-nav-toggle d-xl-none bi ${humburger ? `bi-x` : `bi-list`}`}
                onClick={() => {
                  handeMobileNavTogggle();
                }}
              ></i>
            </nav>
          </div>
        </header>
      </div>
    </Fragment>
  );
};

export default Header;
