import { Fragment } from 'react';

import Hero from './Hero/Hero';
import Features from './Features/Features';
import FAQ from '../../UI/FAQ/FAQ';
import SteteForm from './SteteForm/SteteForm';
import Counter from '../../UI/Counter/Counter';
import InfiniteLooper from '../../UI/InfiniteLooper/InfiniteLooper';

import image from '../../../assets/img/stete-c-bg.jpg';

const faq = [
  {
    id: 1,
    question: 'Na koji period je moguće zaključiti kasko osiguranje?',
    answer: `Mogu se zaštititi sve vrste kopnenih motornih vozila standardne izrade, kao i priključna, specijalna i radna vozila, motocikli, šinska vozila, radne mašine i njihovi sastavni delovi.
    <p>Kasko osiguranje može se ugovoriti sa sledećim rokovima trajanja:</p>
    <ul style="list-style: none; padding: 0;">
      <li>
        <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
        Kratkoročno (na godinu dana ili kraće),
      </li>
      <li>
        <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
        Višegodišnje sa određenim rokom trajanja (rok mora biti duži od godinu dana),
      </li>
      <li>
        <i class="bi bi-check" style="color: var(--accent-color); font-size: 25px;"></i>
        Višegodišnje sa neodređenim rokom trajanja (rok ne može biti kraći od godinu dana).
      </li>
    </ul>`,
    show: 'show',
    collapsed: '',
  },
  {
    id: 2,
    question: 'Koje se vrste vozila mogu zaštititi?',
    answer: 'Mogu se zaštititi sve vrste kopnenih motornih vozila standardne izrade, kao i priključna, specijalna i radna vozila, motocikli, šinska vozila, radne mašine i njihovi sastavni delovi.',
    show: '',
    collapsed: 'collapsed',
  },
  {
    id: 3,
    question: 'Kako često dolazi do oštećenja na vozilu?',
    answer: 'Često se dešava da vozilo zateknemo oštećeno na parkingu, ako nemamo kasko moramo sami platiti štetu.',
    show: '',
    collapsed: 'collapsed',
  },
];

const NaplataStete = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <main className="main">
        <Hero />
        <Features />
        <Counter image={image} />
        <FAQ data={faq} />
        <SteteForm />
        <InfiniteLooper />
      </main>
    </Fragment>
  );
};

export default NaplataStete;
