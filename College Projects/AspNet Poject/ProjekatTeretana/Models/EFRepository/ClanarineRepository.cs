using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.Entity;
using Projekat_Teretana.Models.Interfaces;

namespace Projekat_Teretana.Models.EFRepository
{
    public class ClanarineRepository : IClanarineRepository
    {
        private ProjekatTeretanaContext clanarineEntities = new ProjekatTeretanaContext();

        public IEnumerable<ClanarineBO> GetAllClanarine()
        {
            List<ClanarineBO> clanarineList = new List<ClanarineBO>();

            foreach (Clanarine clanarina in clanarineEntities.Clanarines.ToList())
            {
                ClanarineBO clanarineBO = new ClanarineBO();
                clanarineBO.Id = clanarina.Id;
                clanarineBO.Naziv = clanarina.Naziv;
                clanarineBO.Trajanje = clanarina.Trajanje;
                clanarineBO.Cena = clanarina.Cena;
                clanarineList.Add(clanarineBO);
            }

            return clanarineList;
        }

        public void Add(ClanarineBO clanarine)
        {
            Clanarine clanarineModel = new Clanarine();
            clanarineModel.Id = clanarine.Id;
            clanarineModel.Naziv = clanarine.Naziv;
            clanarineModel.Trajanje = clanarine.Trajanje;
            clanarineModel.Cena = clanarine.Cena;
            clanarineEntities.Clanarines.Add(clanarineModel);
            clanarineEntities.SaveChanges();
        }


        public void Delete(int[] clanarineIds)
        {
            foreach (int clanarinaID in clanarineIds)
            {
                Clanarine predmet = clanarineEntities.Clanarines.Single(t => t.Id == clanarinaID);
                clanarineEntities.Clanarines.Remove(predmet);
            }
            clanarineEntities.SaveChanges();
        }

    }
}
