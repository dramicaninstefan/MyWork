import { useState } from 'react';

import classes from './FAQ.module.css';

const FAQ = () => {
  // Q&A
  const [question1, setQuestion1] = useState(false);
  const [question2, setQuestion2] = useState(false);
  const [question3, setQuestion3] = useState(false);
  const [question4, setQuestion4] = useState(false);
  const [question5, setQuestion5] = useState(false);
  const [question6, setQuestion6] = useState(false);
  const [question7, setQuestion7] = useState(false);
  const [question8, setQuestion8] = useState(false);
  const [question9, setQuestion9] = useState(false);
  const [question10, setQuestion10] = useState(false);

  // handle question 1
  const handleQuestion1 = () => {
    setQuestion1((current) => !current);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 2
  const handleQuestion2 = () => {
    setQuestion1(false);
    setQuestion2((current) => !current);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 3
  const handleQuestion3 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3((current) => !current);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 4
  const handleQuestion4 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4((current) => !current);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 5
  const handleQuestion5 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5((current) => !current);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 6
  const handleQuestion6 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6((current) => !current);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 7
  const handleQuestion7 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7((current) => !current);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 8
  const handleQuestion8 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8((current) => !current);
    setQuestion9(false);
    setQuestion10(false);
  };

  // handle question 9
  const handleQuestion9 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9((current) => !current);
    setQuestion10(false);
  };

  // handle question 10
  const handleQuestion10 = () => {
    setQuestion1(false);
    setQuestion2(false);
    setQuestion3(false);
    setQuestion4(false);
    setQuestion5(false);
    setQuestion6(false);
    setQuestion7(false);
    setQuestion8(false);
    setQuestion9(false);
    setQuestion10((current) => !current);
  };

  return (
    <ul className={classes.list}>
      <li className={classes.question} onClick={handleQuestion1}>
        Kako se osigurava imovina? <i style={question1 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question1 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion2}>
        Šta znači osiguranje na sumu osiguranja? <i style={question2 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question2 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion3}>
        Šta je podosiguranje? <i style={question3 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question3 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion4}>
        Šta znači osiguranje na ,,prvi rizik”? <i style={question4 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question4 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion5}>
        Kako se određuje vrednost sume osiguranja za osiguranja nekretnina?{' '}
        <i style={question5 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question5 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion6}>
        Šta je franšiza? <i style={question6 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question6 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion7}>
        Ko može ugovoriti osiguranje imovine? <i style={question7 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question7 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion8}>
        Načelo obeštećenja <i style={question8 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question8 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion9}>
        Vinkulacija u korist banke? <i style={question9 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question9 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>

      <li className={classes.question} onClick={handleQuestion10}>
        Da li postoji ograničenje broja prijavljenih šteta? <i style={question10 ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
      </li>
      <li className={question10 ? `${classes.answer} ${classes.active}` : `${classes.answer}`}>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quas culpa nesciunt. Ducimus hic voluptas at, nisi maxime voluptate officia quasi qui minus excepturi pariatur nostrum deleniti,
        odit, distinctio dolore! Atque rem vel similique sed, amet nam nulla animi. Ea itaque delectus facere dolor nisi quos, nemo blanditiis qui nulla eius vero! Accusamus quia cum inventore
        recusandae fugiat nisi. Odio? Quibusdam, nemo qui quam iste voluptatem aliquid repellat corrupti facere debitis deserunt in recusandae nostrum?
      </li>
    </ul>
  );
};

export default FAQ;
