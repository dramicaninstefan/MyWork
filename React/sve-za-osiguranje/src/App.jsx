import { Fragment } from 'react';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';

import Home from './components/Home/Home';

import KaskoOsiguranje from './components/pages/Vozila/KaskoOsiguranje/KaskoOsiguranje';
import Autoodgovornost from './components/pages/Vozila/Autoodgovornost/Autoodgovornost';
import PomocNaPutu from './components/pages/Vozila/PomocNaPutu/PomocNaPutu';
import RegistracijaVozila from './components/pages/Vozila/RegistracijaVozila/RegistracijaVozila';

import Domacinstvo from './components/pages/Domacinstvo/Domacinstvo';

import ZivotnoOsiguranje from './components/pages/ZivotnoIZdravstveno/ZivotnoOsiguranje/ZivotnoOsiguranje';
import DobrovoljnoZdravstvenoOsiguranje from './components/pages/ZivotnoIZdravstveno/DobrovoljnoZdravstvenoOsiguranje/DobrovoljnoZdravstvenoOsiguranje';
import OsiguranjeOdNezgode from './components/pages/ZivotnoIZdravstveno/OsiguranjeOdNezgode/OsiguranjeOdNezgode';

import Putno from './components/pages/Putno/Putno';

import NaknadaSteteKasko from './components/pages/Stete/NaknadaSteteKasko/NaknadaSteteKasko';
import NaknadaSteteZaFizickuIDusevnuBol from './components/pages/Stete/NaknadaSteteZaFizickuIDusevnuBol/NaknadaSteteZaFizickuIDusevnuBol';
import NaplataSteteNaVozilu from './components/pages/Stete/NaplataSteteNaVozilu/NaplataStete';
import OsiguranjePutnikaUJavnomPrevozu from './components/pages/Stete/OsiguranjePutnikaUJavnomPrevozu/OsiguranjePutnikaUJavnomPrevozu';
import PrijavaINaknadaStete from './components/pages/Stete/PrijavaINaknadaStete/PrijavaINaknadaStete';

import RootLayout from './components/routes/RootLayout';
import ErrorPage from './components/routes/ErrorPage';

function App() {
  window.onbeforeunload = function () {
    window.scrollTo(0, 0);
  };

  const router = createBrowserRouter([
    {
      path: '/',
      element: <RootLayout />,
      errorElement: <ErrorPage />,
      children: [
        { path: '/', element: <Home /> },
        { path: '/kasko-osiguranje-vozila', element: <KaskoOsiguranje /> },
        { path: '/autoodgovornost', element: <Autoodgovornost /> },
        { path: '/pomoc-na-putu', element: <PomocNaPutu /> },
        { path: '/registracija-vozila', element: <RegistracijaVozila /> },

        { path: '/osiguranje-domacinstva', element: <Domacinstvo /> },

        { path: '/zivotno-osiguranje', element: <ZivotnoOsiguranje /> },
        { path: '/dobrovoljno-zdravstveno-osiguranje', element: <DobrovoljnoZdravstvenoOsiguranje /> },
        { path: '/osiguranje-od-nezgode', element: <OsiguranjeOdNezgode /> },

        { path: '/putno-osiguranje', element: <Putno /> },

        { path: '/prijava-i-naknada-stete', element: <PrijavaINaknadaStete /> },
        { path: '/naplata-naknada-stete-na-vozilu', element: <NaplataSteteNaVozilu /> },
        { path: '/naknada-stete-kasko-osiguranje', element: <NaknadaSteteKasko /> },
        { path: '/osiguranje-putnika-u-javnom-prevozu', element: <OsiguranjePutnikaUJavnomPrevozu /> },
        { path: '/naknada-stete-za-fizicki-i-dusevni-bol', element: <NaknadaSteteZaFizickuIDusevnuBol /> },
      ],
    },
  ]);

  return (
    <Fragment>
      <RouterProvider router={router} />
    </Fragment>
  );
}

export default App;
