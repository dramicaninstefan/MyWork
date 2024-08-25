using Projekat_Teretana.Models.BO;

namespace Projekat_Teretana.Models.Interfaces
{
    public interface ITreneriRepository
    {
        IEnumerable<TreneriBO> GetAllTreneri();

        void Add(TreneriBO treneri);

        void Delete(int[] treneriIds);
    }
}
