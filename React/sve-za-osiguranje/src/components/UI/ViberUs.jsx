import React, { Fragment, useState } from 'react';

import classes from './ViberUs.module.css';

const ViberUs = () => {
  const [isOver, setIsOver] = useState(false);

  return (
    <Fragment>
      <a href="viber://chat/?number=%2B381638489439" className={classes.viberUsBtn}>
        <div className={classes.circle}>
          <i className="fa-brands fa-viber"></i>
        </div>
        <div className={classes.box} style={{ width: isOver ? '220px' : '0px' }}>
          <h1 className={classes['box-title']} style={{ opacity: isOver ? '1' : '0' }}>
            Pozovite nas!
          </h1>
        </div>
      </a>
    </Fragment>
  );
};

export default ViberUs;
