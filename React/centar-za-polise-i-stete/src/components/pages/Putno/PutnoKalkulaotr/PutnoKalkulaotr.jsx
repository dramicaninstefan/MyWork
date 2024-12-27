import { useEffect, useState } from 'react';
import classes from './PutnoKalkulaotr.module.css';

const PutnoKalkulaotr = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const [insuranceType, setInsuranceType] = useState(1); // 1 for individual, 2 for family
  const [startDate, setStartDate] = useState('');
  const [endDate, setEndDate] = useState('');
  const [annualCoverage, setAnnualCoverage] = useState(false);
  const [travelPurpose, setTravelPurpose] = useState(0); // Set default value to 0
  const [territorialCoverage, setTerritorialCoverage] = useState(0); // Set default value to 0
  const [ageGroup, setAgeGroup] = useState(0); // Set default value to 0
  const [pandemicCoverage, setPandemicCoverage] = useState(false);
  const [skiCoverage, setSkiCoverage] = useState(false);

  const today = new Date().toISOString().split('T')[0];
  const nextYear = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toISOString().split('T')[0];

  useEffect(() => {
    if (annualCoverage && startDate) {
      const start = new Date(startDate);
      start.setFullYear(start.getFullYear() + 1);
      setEndDate(start.toISOString().split('T')[0]);
    }
  }, [startDate, annualCoverage]);

  const handleFormSubmit = (e) => {
    e.preventDefault();
    // Handle form submission here
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
  };

  return (
    <div className="container py-4" style={{ marginTop: `150px`, border: '1px solid rgba(241, 241, 241, 0.945)', backgroundColor: 'rgba(241, 241, 241, 0.945)', padding: '25px', borderRadius: '5px' }}>
      <div className="row">
        <div className="col-12">
          <h1 className="h3 mb-2">Osnovni podaci</h1>
          <p className="text-muted mb-4">
            Molimo Vas da najpre izaberete da li želite <b>individualno</b> ili <b>porodično osiguranje</b>, a nakon toga datum početka i trajanje osiguranja, teritorijalno pokriće, svrhu Vašeg
            putovanja i starost.
          </p>
        </div>
      </div>

      <div className="row">
        <div className="col-lg-6">
          <div className="row mb-4">
            {/* Individual Insurance Card */}
            <div className="col-md-6 mb-3 mb-md-0">
              <div className={`${classes.insuranceCard} card h-100 ${insuranceType === 1 ? classes.active : ''}`} onClick={() => setInsuranceType(1)}>
                <div className="card-body">
                  <div className="d-flex justify-content-between align-items-center mb-3">
                    <h2 className="h5 mb-0">INDIVIDUALNO</h2>
                    <div className={classes.radioButton}>{insuranceType === 1 && <div className={classes.radioInner} />}</div>
                  </div>
                  <p className="small">uz mogućnost ugovaranja pokrića pandemije, pokrića za skijanje i otkaza putovanja.</p>
                </div>
              </div>
            </div>

            {/* Family Insurance Card */}
            <div className="col-md-6">
              <div className={`${classes.insuranceCard} card h-100 ${insuranceType === 2 ? classes.active : ''}`} onClick={() => setInsuranceType(2)}>
                <div className="card-body">
                  <div className="d-flex justify-content-between align-items-center mb-3">
                    <h2 className="h5 mb-0">PORODIČNO</h2>
                    <div className={classes.radioButton}>{insuranceType === 2 && <div className={classes.radioInner} />}</div>
                  </div>
                  <p className="small">
                    uz mogućnost ugovaranja pokrića pandemije, pokrića za skijanje i otkaza putovanja. Obuhvata do dve punoletne osobe (starosti do 70 godina) koje ne moraju biti u krvnoj zajednici ni
                    u krvnom srodstvu i najviše pet maloletnih osoba koje ne moraju biti u krvnom srodstvu.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="col-lg-6">
          <div className="row mb-4">
            <div className="col-md-6 mb-3 mb-md-0">
              <label className="form-label small text-muted">POČETAK OSIGURANJA</label>
              <div className="position-relative">
                <input type="date" className="form-control" min={today} max={nextYear} value={startDate} onChange={(e) => setStartDate(e.target.value)} />
              </div>
            </div>
            <div className="col-md-6">
              <label className="form-label small text-muted">ISTEK OSIGURANJA</label>
              <div className="position-relative">
                <input
                  type="date"
                  className={annualCoverage ? `form-control ${classes['readonly-input']}` : `form-control`}
                  min={today}
                  max={nextYear}
                  value={endDate}
                  onChange={(e) => setEndDate(e.target.value)}
                  readOnly={annualCoverage}
                  onFocus={annualCoverage ? (e) => e.target.blur() : undefined}
                  tabIndex={annualCoverage ? -1 : 0}
                />
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
                  style={{ border: `1px solid var(--accent-color)` }}
                  checked={annualCoverage}
                  onChange={() => setAnnualCoverage(!annualCoverage)}
                />
                <label className="form-check-label" htmlFor="annualCoverage">
                  GODIŠNJE POKRIĆE
                </label>
              </div>

              <div className="mb-3">
                <label className="form-label small text-muted">SVRHA PUTOVANJA*</label>
                <select className="form-select" value={travelPurpose} onChange={(e) => setTravelPurpose(Number(e.target.value))}>
                  <option value={0}>Turističko</option>
                  <option value={1}>Poslovno</option>
                  <option value={2}>Studijsko</option>
                  <option value={3}>Privremeni rad u inostranstvu</option>
                </select>
              </div>

              <div className="mb-3">
                <label className="form-label small text-muted">TERITORIJALNO POKRIĆE*</label>
                <select className="form-select" value={territorialCoverage} onChange={(e) => setTerritorialCoverage(Number(e.target.value))}>
                  <option value={0}>Evropa* (+ RU|TR|TU|EG)</option>
                  <option value={1}>Ceo svet</option>
                </select>
              </div>

              <div className="mb-3">
                <label className="form-label small text-muted">STAROST OSIGURANIKA*</label>
                <select className="form-select" value={ageGroup} onChange={(e) => setAgeGroup(Number(e.target.value))}>
                  <option value={0}>do 71 godina</option>
                  <option value={1}>između 71 i 81 godina</option>
                  <option value={2}>preko 81 godine</option>
                </select>
              </div>

              <div className="mb-4">
                <div className="form-check mb-2">
                  <input
                    type="checkbox"
                    className="form-check-input"
                    id="pandemicCoverage"
                    style={{ border: `1px solid var(--accent-color)` }}
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
                    style={{ border: `1px solid var(--accent-color)` }}
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
            </div>
          </div>

          {/* Submit Button */}
          <div className="row">
            <div className="col-12">
              <button className="btn btn-primary" onClick={handleFormSubmit}>
                Pošaljite podatke
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default PutnoKalkulaotr;
