using Projekat_Teretana.Models.BO;

namespace Projekat_Teretana.Models.Interfaces
{
    public interface ITreninziRepository
    {
        IEnumerable<TreninziBO> GetAllTreninzi();

        void Add(TreninziBO treninzi);

        void Delete(int[] treninziIds);
    }
}
