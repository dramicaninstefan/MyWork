using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.Entity;
using Projekat_Teretana.Models.Interfaces;

namespace Projekat_Teretana.Models.EFRepository
{
    public class RacuniRepository : IRacuniRepository
    {
        private ProjekatTeretanaContext racuniEntities = new ProjekatTeretanaContext();

        public IEnumerable<RacuniBO> GetAllRacuni()
        {
            List<RacuniBO> racuniList = new List<RacuniBO>();

            foreach (Racuni clanovi in racuniEntities.Racunis.ToList())
            {
                RacuniBO racuniBO = new RacuniBO();
                racuniBO.Id = clanovi.Id;
                racuniBO.Clan = clanovi.Clan;
                racuniBO.Cena = clanovi.Cena;
                racuniBO.Datum = (DateOnly)clanovi.Datum;
                racuniList.Add(racuniBO);
            }

            return racuniList;
        }

        public void Add(RacuniBO racuni)
        {
            Racuni racuniModel = new Racuni();
            racuniModel.Id = racuni.Id;
            racuniModel.Clan = racuni.Clan;
            racuniModel.Cena = racuni.Cena;
            racuniModel.Datum = racuni.Datum;
            racuniEntities.Racunis.Add(racuniModel);
            racuniEntities.SaveChanges();
        }

        public void Delete(int[] racuniIds)
        {
            foreach (int racuniId in racuniIds)
            {
                Clanovi clanovi = racuniEntities.Clanovis.Single(t => t.Id == racuniId);
                racuniEntities.Clanovis.Remove(clanovi);
            }
            racuniEntities.SaveChanges();
        }


    }
}
