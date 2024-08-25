using Microsoft.AspNetCore.Mvc;
using Projekat_Teretana.Models.BO;
using Projekat_Teretana.Models.EFRepository;

namespace Projekat_Teretana.Controllers
{
    public class TreneriController : Controller
    {
        private TreneriRepository _treneriRepository;

        public TreneriController()
        {
            _treneriRepository = new TreneriRepository();
        }

        public IActionResult Index()
        {
            return View(_treneriRepository.GetAllTreneri());
        }

        public IActionResult Create()
        {
            ViewBag.Treneri = _treneriRepository.GetAllTreneri();
            return View();
        }

        [HttpPost]
        public IActionResult Create(TreneriBO treneri)
        {
            if (!ModelState.IsValid)
            {
                ViewBag.Treneri = _treneriRepository.GetAllTreneri();
                return View(treneri);
            }
            else
            {
                _treneriRepository.Add(treneri);
                return RedirectToAction("Index");
            }

        }

        public IActionResult DeleteTreneri(int[] treneri)
        {
            _treneriRepository.Delete(treneri);
            return PartialView("Index", _treneriRepository.GetAllTreneri());
        }
    }
}
