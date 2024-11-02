import React, { Fragment, useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

import './BlogPage.css';

import fetchBlogs from '../../API/fetchBlogs';

const BlogPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const [blogs, setBlogs] = useState([]);

  useEffect(() => {
    const loadBlogs = async () => {
      const data = await fetchBlogs();
      setBlogs(data);
    };

    loadBlogs();
  }, []);

  return (
    <Fragment>
      <div className="page-title dark-background">
        <div className="position-relative">
          <h1>Blog</h1>
          <nav className="breadcrumbs">
            <ol>
              <li>
                <Link to="/">Početna</Link>
              </li>
              <li className="current">Blog</li>
            </ol>
          </nav>
        </div>
      </div>

      <section id="blog-posts" className="blog-posts section">
        <div className="container">
          <div className="row gy-4">
            {blogs?.map((blog) => {
              return (
                <div key={blog.id} className="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                  <article>
                    <div className="post-img">
                      <img src={`assets/img/blog/blog-${blog.id}.jpg`} alt="" className="img-fluid" />
                    </div>

                    <p className="post-category">{blog.category}</p>

                    <h2 className="title">
                      <Link to={`/blog/${blog.id}`}>{blog.title}</Link>
                    </h2>

                    <div className="mb-4" style={{ maxHeight: `6em`, overflow: `hidden` }} dangerouslySetInnerHTML={{ __html: blog.description }}></div>

                    <Link to={`/blog/${blog.id}`} className="read-more rounded">
                      <span>Pročitaj više</span>
                      <i className="bi bi-arrow-right"></i>
                    </Link>
                  </article>
                </div>
              );
            })}
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default BlogPage;
