using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.Entity;
using Projekat_Teretana.Models.Interfaces;

namespace Projekat_Teretana.Models.EFRepository
{
    public class TreneriRepository : ITreneriRepository
    {
        private ProjekatTeretanaContext treneriEntities = new ProjekatTeretanaContext();

        public IEnumerable<TreneriBO> GetAllTreneri()
        {
            List<TreneriBO> treneriList = new List<TreneriBO>();

            foreach (Treneri treneri in treneriEntities.Treneris.ToList())
            {
                TreneriBO treneriBO = new TreneriBO();
                treneriBO.Id = treneri.Id;
                treneriBO.Ime = treneri.Ime;
                treneriBO.Prezime = treneri.Prezime;
                treneriBO.Cena = treneri.Cena;
                treneriList.Add(treneriBO);
            }

            return treneriList;
        }

        public void Add(TreneriBO treneri)
        {
            Treneri treneriModel = new Treneri();
            treneriModel.Id = treneri.Id;
            treneriModel.Ime = treneri.Ime;
            treneriModel.Prezime = treneri.Prezime;
            treneriModel.Cena = treneri.Cena;
            treneriEntities.Treneris.Add(treneriModel);
            treneriEntities.SaveChanges();
        }

        public void Delete(int[] treneriIds)
        {
            foreach (int treneriId in treneriIds)
            {
                Treneri treneri = treneriEntities.Treneris.Single(t => t.Id == treneriId);
                treneriEntities.Treneris.Remove(treneri);
            }
            treneriEntities.SaveChanges();
        }
    }
}
