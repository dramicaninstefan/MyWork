using Microsoft.AspNetCore.Mvc;
using Projekat_Teretana.Models.Entity;
using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.EFRepository;

namespace Projekat_Teretana.Controllers
{
    public class ClanarineController : Controller
    {
        private ClanarineRepository _clanarineRepository;

        public ClanarineController()
        {
            _clanarineRepository = new ClanarineRepository();
        }

        public IActionResult Index()
        {
            return View(_clanarineRepository.GetAllClanarine()); 
        }

        public IActionResult Create()
        {
            ViewBag.Clanarine = _clanarineRepository.GetAllClanarine(); 
            return View();
        }

        [HttpPost]
        public IActionResult Create(ClanarineBO clanarina)
        {
            if (!ModelState.IsValid) 
            {
                ViewBag.Clanarine = _clanarineRepository.GetAllClanarine();
                return View(clanarina);
            }
            else 
            {
                _clanarineRepository.Add(clanarina);
                return RedirectToAction("Index");
            }

        }

        public IActionResult DeleteClanarine(int[] clanarine)
        {
            _clanarineRepository.Delete(clanarine);
            return PartialView("Index", _clanarineRepository.GetAllClanarine());
        }



    }
}
