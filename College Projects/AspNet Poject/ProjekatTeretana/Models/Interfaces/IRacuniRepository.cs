using Projekat_Teretana.Models.BO;

namespace Projekat_Teretana.Models.Interfaces
{
    public interface IRacuniRepository
    {
        IEnumerable<RacuniBO> GetAllRacuni();

        void Add(RacuniBO racuni);

        void Delete(int[] racuniIds);
    }
}
