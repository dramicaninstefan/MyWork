import { Fragment } from 'react';
import classes from './SocialIcons.module.css';

const SocialIcons = () => {
  return (
    <Fragment>
      <div className={classes.social}>
        <a href="viber://chat/?number=%2B381638489439" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.viber}`}>
          <i className="fa-brands fa-viber"></i>
        </a>
        <a href="https://wa.me/+381638489439" target="_blank" rel="noreferrer" className={`${classes.icons} ${classes.whatsup}`}>
          <i className="fa-brands fa-whatsapp"></i>
        </a>
        <a href="mailto: svezaosiguranje@gmail.com" rel="noreferrer" className={`${classes.icons} ${classes.email}`}>
          <i className="fa-solid fa-envelope"></i>
        </a>
      </div>
    </Fragment>
  );
};

export default SocialIcons;
