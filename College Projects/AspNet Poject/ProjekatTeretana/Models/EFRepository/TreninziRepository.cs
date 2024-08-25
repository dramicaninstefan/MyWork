using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.Entity;
using Projekat_Teretana.Models.Interfaces;

namespace Projekat_Teretana.Models.EFRepository
{
    public class TreninziRepository : ITreninziRepository
    {
        private ProjekatTeretanaContext treninziEntities = new ProjekatTeretanaContext();


        public IEnumerable<TreninziBO> GetAllTreninzi()
        {
            List<TreninziBO> treninziList = new List<TreninziBO>();

            foreach (Treninzi treninzi in treninziEntities.Treninzis.ToList())
            {
                TreninziBO treninziBO = new TreninziBO();
                treninziBO.Id = treninzi.Id;
                treninziBO.PocetakTreninga = treninzi.PocetakTreninga;
                treninziBO.KrajTreninga = treninzi.KrajTreninga;
                treninziBO.Clan = treninzi.Clan;
                treninziBO.Trener = treninzi.Trener;
                treninziList.Add(treninziBO);
            }

            return treninziList;
        }

        public void Add(TreninziBO treninzi)
        {
            Treninzi treninziModel = new Treninzi();
            treninziModel.Id = treninzi.Id;
            treninziModel.PocetakTreninga = treninzi.PocetakTreninga;
            treninziModel.KrajTreninga = treninzi.KrajTreninga;
            treninziModel.Clan = treninzi.Clan;
            treninziModel.Trener = treninzi.Trener;
            treninziEntities.Treninzis.Add(treninziModel);
            treninziEntities.SaveChanges();
        }

        public void Delete(int[] treninziIds)
        {
            foreach (int treninziId in treninziIds)
            {
                Treninzi treninzi = treninziEntities.Treninzis.Single(t => t.Id == treninziId);
                treninziEntities.Treninzis.Remove(treninzi);
            }
            treninziEntities.SaveChanges();
        }

       
    }
}
