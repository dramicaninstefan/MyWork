import React, { Fragment } from 'react';

import classes from './Loader.module.css';

const Loader = () => {
  return (
    <Fragment>
      <div className={classes.bar}>
        <div className={classes.ball}></div>
      </div>
    </Fragment>
  );
};

export default Loader;
