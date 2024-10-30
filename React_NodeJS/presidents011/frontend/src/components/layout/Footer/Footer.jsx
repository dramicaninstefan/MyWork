import React, { Fragment } from 'react';

import './Footer.css';
import { Link } from 'react-router-dom';

const Footer = () => {
  return (
    <Fragment>
      <footer id="footer" className="footer dark-background">
        <div className="container footer-top">
          <div className="row gy-4">
            <div className="col-lg-4 col-md-6 footer-about">
              <a href="index.html" className="d-flex align-items-center">
                <span className="sitename">Presidents 011</span>
              </a>
              <div className="footer-contact pt-3">
                <p>Bulevar Arsenija Čarnojevica 58</p>
                <p>Beograd, 11000</p>
                <p className="mt-3">
                  <strong>Phone:</strong> <span>+381 123 456</span>
                </p>
                <p>
                  <strong>Email:</strong> <span>info@example.com</span>
                </p>
              </div>
            </div>

            <div className="col-lg-4 col-md-3 footer-links">
              <h4>Linkovi</h4>
              <ul>
                <li>
                  <i className="bi bi-chevron-right"></i> <Link to="/">Početna</Link>
                </li>
                <li>
                  <i className="bi bi-chevron-right"></i> <Link to="/o-nama">O Nama</Link>
                </li>
                <li>
                  <i className="bi bi-chevron-right"></i> <Link to="/blog">Blog</Link>
                </li>
                <li>
                  <i className="bi bi-chevron-right"></i> <Link to="/kontakt">Kontakt</Link>
                </li>
              </ul>
            </div>

            <div className="col-lg-4 col-md-12">
              <h4>Zaprati nas</h4>
              <div className="social-links d-flex">
                <Link>
                  <i className="bi bi-instagram"></i>
                </Link>
                <Link>
                  <i className="bi bi-facebook"></i>
                </Link>
                <Link>
                  <i className="bi bi-twitter-x"></i>
                </Link>
              </div>
            </div>
          </div>
        </div>

        <div className="container copyright text-center mt-4">
          <p>
            © <span>Copyright</span> <strong className="px-1 sitename">Presidents 011</strong> <span>All Rights Reserved</span>
          </p>
        </div>
      </footer>
    </Fragment>
  );
};

export default Footer;
