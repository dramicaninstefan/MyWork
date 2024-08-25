using Microsoft.AspNetCore.Mvc;
using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.EFRepository;

namespace Projekat_Teretana.Controllers
{
    public class TreninziController : Controller
    {
        private TreninziRepository _treninziRepository;

        public TreninziController()
        {
            _treninziRepository = new TreninziRepository();
        }

        public IActionResult Index()
        {
            return View(_treninziRepository.GetAllTreninzi());
        }

        public IActionResult Create()
        {
            ViewBag.Treninzi = _treninziRepository.GetAllTreninzi();
            return View();
        }

        [HttpPost]
        public IActionResult Create(TreninziBO treninzi)
        {
            if (!ModelState.IsValid)
            {
                ViewBag.Treninzi = _treninziRepository.GetAllTreninzi();
                return View(treninzi);
            }
            else
            {
                _treninziRepository.Add(treninzi);
                return RedirectToAction("Index");
            }
        }

        public IActionResult DeleteTreninzi(int[] treninzi)
        {
            _treninziRepository.Delete(treninzi);
            return PartialView("Index", _treninziRepository.GetAllTreninzi());
        }
    }
}
