import { useEffect, useState } from 'react';
import classes from './PutnoKalkulaotr.module.css';

const PutnoKalkulaotr = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const today = new Date().toISOString().split('T')[0];
  const nextYear = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toISOString().split('T')[0];

  const [activeTab, setActiveTab] = useState('osnovniPodaci');
  const [insuranceType, setInsuranceType] = useState('individual');
  const [startDate, setStartDate] = useState(today);
  const [endDate, setEndDate] = useState(today);
  const [annualCoverage, setAnnualCoverage] = useState(false);
  const [travelPurpose, setTravelPurpose] = useState(0);
  const [territorialCoverage, setTerritorialCoverage] = useState('');
  const [ageGroup, setAgeGroup] = useState();
  const [pandemicCoverage, setPandemicCoverage] = useState(false);
  const [skiCoverage, setSkiCoverage] = useState(false);

  // Error state for validation
  const [errors, setErrors] = useState({
    startDate: '',
    endDate: '',
    travelPurpose: '',
    territorialCoverage: '',
    ageGroup: '',
  });

  const handleFormSubmit = (e) => {
    e.preventDefault();

    // Reset errors
    setErrors({
      startDate: '',
      endDate: '',
      travelPurpose: '',
      territorialCoverage: '',
      ageGroup: '',
    });

    // Validation check
    let valid = true;
    let newErrors = {};

    if (!startDate) {
      newErrors.startDate = 'Početak osiguranja je obavezan.';
      valid = false;
    }
    if (!endDate) {
      newErrors.endDate = 'Kraj osiguranja je obavezan.';
      valid = false;
    }
    // if (travelPurpose === 'hidden') {
    //   newErrors.travelPurpose = 'Morate odabrati svrhu putovanja.';
    //   valid = false;
    // }
    if (territorialCoverage !== 0 && territorialCoverage !== 1) {
      newErrors.territorialCoverage = 'Morate odabrati teritorijalno pokriće.';
      valid = false;
    }
    if (ageGroup !== 0 && ageGroup !== 1 && ageGroup !== 2) {
      newErrors.ageGroup = 'Morate odabrati starosnu grupu.';
      valid = false;
    }

    setErrors(newErrors);

    if (valid) {
      const formData = {
        insuranceType,
        startDate,
        endDate,
        annualCoverage,
        travelPurpose,
        territorialCoverage,
        ageGroup,
        pandemicCoverage,
        skiCoverage,
      };
      console.log(formData);
      setActiveTab('odabirPokrica');
    }
  };

  const handleAnnualCoverageChange = () => {
    setAnnualCoverage(!annualCoverage);
    if (!annualCoverage) {
      const nextYearDate = new Date(new Date(startDate).setFullYear(new Date(startDate).getFullYear() + 1)).toISOString().split('T')[0];
      setEndDate(nextYearDate);
    } else {
      setEndDate('');
    }
  };

  return (
    <div className="container py-4" style={{ marginTop: `150px`, border: '1px solid rgba(241, 241, 241, 0.945)', backgroundColor: 'rgba(241, 241, 241, 0.945)', padding: '25px', borderRadius: '5px' }}>
      {/* Tabs */}
      <ul className="nav nav-tabs mb-4">
        <li className="nav-item">
          <button className={`nav-link ${activeTab === 'osnovniPodaci' ? 'active' : ''}`} onClick={() => setActiveTab('osnovniPodaci')}>
            Osnovni podaci
          </button>
        </li>
        <li className="nav-item">
          <button className={`nav-link ${activeTab === 'odabirPokrica' ? 'active' : ''}`} disabled={activeTab !== 'odabirPokrica'} onClick={() => setActiveTab('odabirPokrica')}>
            Prikaz osiguranja
          </button>
        </li>
      </ul>

      {activeTab === 'osnovniPodaci' && (
        <div className="row">
          <div className="col-lg-6">
            <div className="row mb-4">
              {/* Individual Insurance Card */}
              <div className="col-md-6 mb-3 mb-md-0">
                <div className={`${classes.insuranceCard} card h-100 ${insuranceType === 'individual' ? classes.active : ''}`} onClick={() => setInsuranceType('individual')}>
                  <div className="card-body">
                    <div className="d-flex justify-content-between align-items-center mb-3">
                      <h2 className="h5 mb-0">INDIVIDUALNO</h2>
                      <div className={classes.radioButton}>{insuranceType === 'individual' && <div className={classes.radioInner} />}</div>
                    </div>
                    <p className="small">uz mogućnost ugovaranja pokrića pandemije, pokrića za skijanje i otkaza putovanja.</p>
                  </div>
                </div>
              </div>

              {/* Family Insurance Card */}
              <div className="col-md-6">
                <div className={`${classes.insuranceCard} card h-100 ${insuranceType === 'family' ? classes.active : ''}`} onClick={() => setInsuranceType('family')}>
                  <div className="card-body">
                    <div className="d-flex justify-content-between align-items-center mb-3">
                      <h2 className="h5 mb-0">PORODIČNO</h2>
                      <div className={classes.radioButton}>{insuranceType === 'family' && <div className={classes.radioInner} />}</div>
                    </div>
                    <p className="small">
                      uz mogućnost ugovaranja pokrića pandemije, pokrića za skijanje i otkaza putovanja. Obuhvata do dve punoletne osobe (starosti do 70 godina) koje ne moraju biti u krvnoj zajednici
                      ni u krvnom srodstvu i najviše pet maloletnih osoba koje ne moraju biti u krvnom srodstvu.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="col-lg-6">
            <div className="row mb-4">
              <div className="col-md-6 mb-3 mb-md-0">
                <label className="form-label small">POČETAK OSIGURANJA</label>
                <div className="position-relative">
                  <input style={{ fontSize: `18px` }} type="date" className="form-control" min={today} max={nextYear} value={startDate} onChange={(e) => setStartDate(e.target.value)} />
                  {errors.startDate && <div className="text-danger">{errors.startDate}</div>}
                </div>
              </div>
              <div className="col-md-6">
                <label className="form-label small">ISTEK OSIGURANJA</label>
                <div className="position-relative">
                  <input
                    type="date"
                    className="form-control"
                    min={today}
                    max={nextYear}
                    value={endDate}
                    onChange={(e) => setEndDate(e.target.value)}
                    readOnly={annualCoverage}
                    style={{ pointerEvents: annualCoverage ? 'none' : ``, fontSize: `18px` }}
                  />
                  {errors.endDate && <div className="text-danger">{errors.endDate}</div>}
                </div>
              </div>
            </div>

            {/* Form Controls */}
            <div className="row">
              <div className="col-12">
                <div className="form-check mb-3">
                  <input
                    type="checkbox"
                    className="form-check-input"
                    id="annualCoverage"
                    style={{ border: '1px solid var(--accent-color)' }}
                    checked={annualCoverage}
                    onChange={handleAnnualCoverageChange}
                  />
                  <label className="form-check-label" htmlFor="annualCoverage">
                    GODIŠNJE POKRIĆE
                  </label>
                </div>

                <div className="mb-3">
                  <label className="form-label small">SVRHA PUTOVANJA*</label>
                  <select className="form-select" value={travelPurpose} onChange={(e) => setTravelPurpose(Number(e.target.value))}>
                    <option value={0}>Turističko</option>
                    <option value={1}>Poslovno</option>
                    <option value={2}>Studijsko</option>
                    <option value={3}>Privremeni rad u inostranstvu</option>
                  </select>
                  {errors.travelPurpose && <div className="text-danger">{errors.travelPurpose}</div>}
                </div>

                <div className="mb-3">
                  <label className="form-label small">TERITORIJALNO POKRIĆE*</label>
                  <select className="form-select" value={territorialCoverage} onChange={(e) => setTerritorialCoverage(Number(e.target.value))}>
                    <option value="hidden" hidden></option>
                    <option value={0}>Evropa* (+ RU|TR|TU|EG)</option>
                    <option value={1}>Ceo svet</option>
                  </select>
                  {errors.territorialCoverage && <div className="text-danger">{errors.territorialCoverage}</div>}
                </div>

                <div className="mb-3">
                  <label className="form-label small">STAROST OSIGURANIKA*</label>
                  <select className="form-select" value={ageGroup} onChange={(e) => setAgeGroup(Number(e.target.value))}>
                    <option value="hidden" hidden></option>
                    <option value={0}>do 71 godina</option>
                    <option value={1}>između 71 i 81 godina</option>
                    <option value={2}>preko 81 godine</option>
                  </select>
                  {errors.ageGroup && <div className="text-danger">{errors.ageGroup}</div>}
                </div>

                <div className="mb-4">
                  <div className="form-check mb-2">
                    <input
                      type="checkbox"
                      className="form-check-input"
                      id="pandemicCoverage"
                      style={{ border: '1px solid var(--accent-color)' }}
                      checked={pandemicCoverage}
                      onChange={() => setPandemicCoverage(!pandemicCoverage)}
                    />
                    <label className="form-check-label" htmlFor="pandemicCoverage">
                      POKRIĆE ZA SLUČAJ PANDEMIJE
                    </label>
                  </div>
                  <div className="form-check">
                    <input
                      type="checkbox"
                      className="form-check-input"
                      id="skiCoverage"
                      style={{ border: '1px solid var(--accent-color)' }}
                      checked={skiCoverage}
                      onChange={() => setSkiCoverage(!skiCoverage)}
                    />
                    <label className="form-check-label" htmlFor="skiCoverage">
                      POKRIĆE ZA SKIJANJE
                    </label>
                  </div>
                </div>

                <div className="alert alert-info">
                  <p className="small mb-2">
                    <strong>Napomena:</strong> Polisa osiguranja pomoći na putovanju je važeća samo ukoliko je kupite pre početka putovanja, odnosno dok se nalazite na teritoriji Republike Srbije.
                  </p>
                  <p className="small mb-2">
                    *Teritorijalno pokriće "Evropa" uključuje i Tunis, Egipat, Tursku i Rusiju
                    <br />
                    *Starost osiguranika utvrđuje se na dan kreiranja polise:
                  </p>
                  <ul className="small mb-0">
                    <li>Do 70 godina: pre 71-og rođendana</li>
                    <li>Između 71 i 81 godina: Od 71-og rođendana do 81-og rođendana</li>
                    <li>Preko 81 godine: posle 81-og rođendana</li>
                  </ul>
                </div>

                <button className="btn btn-primary" onClick={handleFormSubmit}>
                  Naredni korak
                </button>
              </div>
            </div>
          </div>
        </div>
      )}

      {activeTab === 'odabirPokrica' && (
        <div>
          <h1 className="h3 mb-2">Prikaz osiguranja</h1>
          <p className="text-muted">Ova sekcija je trenutno prazna i spremna za dalji rad.</p>
        </div>
      )}
    </div>
  );
};

export default PutnoKalkulaotr;
