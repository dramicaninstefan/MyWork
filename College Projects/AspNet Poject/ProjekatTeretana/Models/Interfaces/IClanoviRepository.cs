using Projekat_Teretana.Models.BO;

namespace Projekat_Teretana.Models.Interfaces
{
    public interface IClanoviRepository
    {
        IEnumerable<ClanoviBO> GetAllClanovi();

        void Add(ClanoviBO clanovi);

        void Delete(int[] clanoviIds);

    }
}
