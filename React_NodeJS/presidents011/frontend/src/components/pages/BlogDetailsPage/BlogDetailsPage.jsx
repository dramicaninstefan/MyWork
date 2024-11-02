import React, { Fragment, useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';

import './BlogDetailsPage.css';

const BlogDetailsPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const params = useParams();
  const [blogs, setBlogs] = useState([]);

  useEffect(() => {
    axios
      .get(`http://localhost:3500/blogs/${params.blog_id}`)
      .then((res) => {
        setBlogs(res.data.blog);
      })
      .catch((err) => {
        console.log(err);
      });
  }, [params.blog_id]);

  return (
    <Fragment>
      {/* {blogs?.map((blog) => {
        return (
          <div key={blog.id} className="page-title dark-background">
            <div className="position-relative">
              <h1>{blog.title}</h1>
              <nav className="breadcrumbs">
                <ol>
                  <li>
                    <Link to="/">Početna</Link>
                  </li>
                  <li className="current">{blog.title}</li>
                </ol>
              </nav>
            </div>
          </div>
        );
      })} */}

      <div className="container pt-5">
        <div className="row justify-content-center">
          <div className="col-lg-10">
            {blogs?.map((blog) => {
              return (
                <section key={blog.id} id="blog-details" className="blog-details section">
                  <div className="container">
                    <article className="article">
                      <div className="post-img">
                        <img src={`../../../assets/img/blog/blog-${blog.id}.jpg`} alt="" className="img-fluid" />
                      </div>
                      <h2 className="title">{blog.title}</h2>
                      <div className="meta-top">
                        <ul>
                          <li className="d-flex align-items-center">
                            Datum:{' '}
                            {`${new Date(blog.CreatedAt).getDate().toString().padStart(2, '0')}.${(new Date(blog.CreatedAt).getMonth() + 1).toString().padStart(2, '0')}.${new Date(
                              blog.CreatedAt
                            ).getFullYear()} ${new Date(blog.CreatedAt).getHours().toString().padStart(2, '0')}:${new Date(blog.CreatedAt).getMinutes().toString().padStart(2, '0')}`}
                            {/* <i className="bi bi-clock"></i>  */}
                          </li>
                        </ul>
                      </div>

                      <div className="content" dangerouslySetInnerHTML={{ __html: blog.description }}></div>
                    </article>
                  </div>
                </section>
              );
            })}
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default BlogDetailsPage;
