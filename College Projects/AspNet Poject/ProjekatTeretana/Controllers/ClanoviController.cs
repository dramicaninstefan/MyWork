using Microsoft.AspNetCore.Mvc;
using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.EFRepository;

namespace Projekat_Teretana.Controllers
{
    public class ClanoviController : Controller
    {
        private ClanoviRepository _clanoviRepository;

        public ClanoviController()
        {
            _clanoviRepository = new ClanoviRepository();
        }

        public IActionResult Index()
        {
            return View(_clanoviRepository.GetAllClanovi());
        }

        public IActionResult Create()
        {
            ViewBag.Clanovi = _clanoviRepository.GetAllClanovi();
            return View();
        }

        [HttpPost]
        public IActionResult Create(ClanoviBO clanovi)
        {
            if (!ModelState.IsValid)
            {
                ViewBag.Clanovi = _clanoviRepository.GetAllClanovi();
                return View(clanovi);
            }
            else
            {
                _clanoviRepository.Add(clanovi);
                return RedirectToAction("Index");
            }

        }

        public IActionResult DeleteClanovi(int[] clanovi)
        {
            _clanoviRepository.Delete(clanovi);
            return PartialView("Index", _clanoviRepository.GetAllClanovi());
        }

    }
}
