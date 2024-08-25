using Microsoft.AspNetCore.Mvc;
using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.EFRepository;
using Projekat_Teretana.Models.Entity;

namespace Projekat_Teretana.Controllers
{
    public class RacuniController : Controller
    {
        private RacuniRepository _racuniRepository;

        public RacuniController()
        {
            _racuniRepository = new RacuniRepository();
        }

        public IActionResult Index()
        {
            return View(_racuniRepository.GetAllRacuni());
        }

        public IActionResult Create()
        {
            ViewBag.Racuni = _racuniRepository.GetAllRacuni();
            return View();
        }

        [HttpPost]
        public IActionResult Create(RacuniBO racuni)
        {
            if (!ModelState.IsValid)
            {
                ViewBag.Racuni = _racuniRepository.GetAllRacuni();
                return View(racuni);
            }
            else
            {
                _racuniRepository.Add(racuni);
                return RedirectToAction("Index");
            }

        }

    }
}
