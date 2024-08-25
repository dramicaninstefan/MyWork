using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.Entity;
using Projekat_Teretana.Models.Interfaces;

namespace Projekat_Teretana.Models.EFRepository
{
    public class ClanoviRepository : IClanoviRepository
    {
        private ProjekatTeretanaContext clanoviEntities = new ProjekatTeretanaContext();

        public IEnumerable<ClanoviBO> GetAllClanovi()
        {
            List<ClanoviBO> clanoviList = new List<ClanoviBO>();

            foreach (Clanovi clanovi in clanoviEntities.Clanovis.ToList())
            {
                ClanoviBO clanoviBO = new ClanoviBO();
                clanoviBO.Id = clanovi.Id;
                clanoviBO.Ime = clanovi.Ime;
                clanoviBO.Prezime = clanovi.Prezime;
                clanoviBO.VrstaClanarine = clanovi.VrstaClanarine;
                clanoviList.Add(clanoviBO);
            }

            return clanoviList;
        }

        public void Add(ClanoviBO clanovi)
        {
            Clanovi clanoviModel = new Clanovi();
            clanoviModel.Id = clanovi.Id;
            clanoviModel.Ime = clanovi.Ime;
            clanoviModel.Prezime = clanovi.Prezime;
            clanoviModel.VrstaClanarine = clanovi.VrstaClanarine;
            clanoviEntities.Clanovis.Add(clanoviModel);
            clanoviEntities.SaveChanges();
        }

        public void Delete(int[] clanoviIds)
        {
            foreach (int clanoviId in clanoviIds)
            {
                Clanovi clanovi = clanoviEntities.Clanovis.Single(t => t.Id == clanoviId);
                clanoviEntities.Clanovis.Remove(clanovi);
            }
            clanoviEntities.SaveChanges();
        }

        
    }
}
