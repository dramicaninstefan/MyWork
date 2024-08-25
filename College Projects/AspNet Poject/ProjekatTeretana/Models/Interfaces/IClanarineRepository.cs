using Projekat_Teretana.Models.BO;

namespace Projekat_Teretana.Models.Interfaces
{
    public interface IClanarineRepository
    {
        IEnumerable<ClanarineBO> GetAllClanarine();

        void Add(ClanarineBO clanarine);

        void Delete(int[] clanarineIds);
    }
}
