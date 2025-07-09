import os
import re
import cv2
import pytesseract
import pandas as pd
from passporteye import read_mrz
from tkinterdnd2 import DND_FILES, TkinterDnD
from tkinter import Label, Button, messagebox, filedialog, Canvas, Frame, Scrollbar
from openpyxl import load_workbook
from PIL import Image, ImageTk

pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

def ocisti_mrz_tekst(text):
    if not text:
        return ""
    return text.replace('K', '').replace('<', '').strip()

class PasosOCRApp:
    def __init__(self, root):
        self.root = root
        root.title("Pasos OCR aplikacija")
        root.geometry("720x520")
        root.resizable(False, False)

        self.label = Label(root, text="Prevuci slike pasoša ovde ili klikni na dugme za izbor fajlova", font=("Segoe UI", 11))
        self.label.pack(pady=8)

        self.file_paths = []
        self.thumbnails = []

        # Canvas za slike
        self.frame_canvas = Frame(root)
        self.frame_canvas.pack(fill='both', expand=True, padx=15, pady=5)

        self.canvas = Canvas(self.frame_canvas, height=240, bg="#f7f7f7", bd=0, highlightthickness=0)
        self.canvas.pack(side='left', fill='both', expand=True)

        self.scrollbar = Scrollbar(self.frame_canvas, orient='vertical', command=self.canvas.yview)
        self.scrollbar.pack(side='right', fill='y')

        self.canvas.configure(yscrollcommand=self.scrollbar.set)

        self.frame_thumbs = Frame(self.canvas, bg="#f7f7f7")
        self.canvas.create_window((0, 0), window=self.frame_thumbs, anchor='nw')

        self.frame_thumbs.bind("<Configure>", self.on_frame_configure)

        root.drop_target_register(DND_FILES)
        root.dnd_bind('<<Drop>>', self.drop)

        # Dugmad
        self.frame_buttons = Frame(root)
        self.frame_buttons.pack(fill='x', padx=20, pady=10)

        self.btn_select = Button(self.frame_buttons, text="Izaberi slike", font=("Segoe UI", 10), width=15, command=self.select_files)
        self.btn_select.pack(side='left')

        self.btn_process = Button(self.frame_buttons, text="Obradi i sačuvaj Excel", font=("Segoe UI", 10), width=22,
                                  command=self.process_files, state='disabled')
        self.btn_process.pack(side='right')

        self.status_label = Label(root, text="", font=("Segoe UI", 10), fg="green")
        self.status_label.pack(pady=5)

    def on_frame_configure(self, event=None):
        self.canvas.configure(scrollregion=self.canvas.bbox("all"))

    def update_thumbnails(self):
        for widget in self.frame_thumbs.winfo_children():
            widget.destroy()
        self.thumbnails.clear()

        for idx, filepath in enumerate(self.file_paths):
            outer_frame = Frame(self.frame_thumbs, bd=1, relief='solid', width=130, height=160)
            row = idx // 4
            col = idx % 4
            outer_frame.grid(row=row, column=col, padx=5, pady=5)
            outer_frame.grid_propagate(False)

            try:
                img = Image.open(filepath)
                img.thumbnail((100, 100))
                img_tk = ImageTk.PhotoImage(img)
                self.thumbnails.append(img_tk)

                label_img = Label(outer_frame, image=img_tk)
                label_img.pack(pady=5)

                filename = os.path.basename(filepath)
                label_name = Label(outer_frame, text=filename, wraplength=120, font=("Segoe UI", 8), justify='center')
                label_name.pack()

                btn_remove = Button(outer_frame, text="X", command=lambda i=idx: self.remove_file(i),
                                    fg='white', bg='red', bd=0, font=("Segoe UI", 10, "bold"))
                btn_remove.place(relx=1.0, y=2, anchor="ne", width=25, height=25)
            except Exception as e:
                print(f"Greška u učitavanju slike {filepath}: {e}")

    def remove_file(self, index):
        if 0 <= index < len(self.file_paths):
            removed = self.file_paths.pop(index)
            self.update_thumbnails()
            self.status_label.config(text=f"Uklonjen fajl: {os.path.basename(removed)}", fg="blue")
            if not self.file_paths:
                self.btn_process.config(state='disabled')
                self.label.config(text="Nema izabranih fajlova")

    def drop(self, event):
        files = self.root.splitlist(event.data)
        filtered_files = [f for f in files if f.lower().endswith(('.jpg', '.jpeg', '.png'))]
        if filtered_files:
            self.file_paths.extend(filtered_files)
            self.label.config(text=f"Odabrano {len(self.file_paths)} fajlova")
            self.btn_process.config(state='normal')
            self.status_label.config(text="", fg="green")
            self.update_thumbnails()
        else:
            messagebox.showwarning("Upozorenje", "Molimo prevucite samo slike (.jpg, .jpeg, .png)")

    def select_files(self):
        files = filedialog.askopenfilenames(
            title="Izaberite slike",
            filetypes=[("Image files", "*.jpg *.jpeg *.png")]
        )
        if files:
            self.file_paths.extend(files)
            self.label.config(text=f"Odabrano {len(self.file_paths)} fajlova")
            self.btn_process.config(state='normal')
            self.status_label.config(text="", fg="green")
            self.update_thumbnails()
        else:
            self.label.config(text="Niste izabrali fajlove")
            if not self.file_paths:
                self.btn_process.config(state='disabled')

    def process_files(self):
        if not self.file_paths:
            messagebox.showwarning("Upozorenje", "Nema odabranih fajlova!")
            return

        results = []
        for filepath in self.file_paths:
            self.status_label.config(text=f"Obrada fajla: {os.path.basename(filepath)}")
            self.root.update()

            mrz = read_mrz(filepath)
            img = cv2.imread(filepath)
            full_text = pytesseract.image_to_string(img, lang='srp+eng')
            jmbg_match = re.search(r'\b\d{13}\b', full_text)
            jmbg = jmbg_match.group() if jmbg_match else ""

            if mrz is not None:
                mrz_data = mrz.to_dict()
                extracted_data = {
                    "Fajl": os.path.basename(filepath),
                    "Ime": ocisti_mrz_tekst(mrz_data.get("names", "")),
                    "Prezime": ocisti_mrz_tekst(mrz_data.get("surname", "")),
                    "Broj pasosa": mrz_data.get("number", ""),
                    "JMBG": jmbg
                }
                results.append(extracted_data)
            else:
                results.append({
                    "Fajl": os.path.basename(filepath),
                    "Ime": "",
                    "Prezime": "",
                    "Broj pasosa": "",
                    "JMBG": "",
                    "Napomena": "MRZ zona nije prepoznata"
                })

        if results:
            df = pd.DataFrame(results)
            save_path = filedialog.asksaveasfilename(
                defaultextension=".xlsx",
                filetypes=[("Excel files", "*.xlsx")],
                title="Sačuvaj Excel fajl kao"
            )
            if save_path:
                df.to_excel(save_path, index=False)

                wb = load_workbook(save_path)
                ws = wb.active
                for col in ws.columns:
                    max_length = 0
                    column = col[0].column_letter
                    for cell in col:
                        if cell.value:
                            cell_length = len(str(cell.value))
                            if cell_length > max_length:
                                max_length = cell_length
                    ws.column_dimensions[column].width = max_length + 2
                wb.save(save_path)

                messagebox.showinfo("Uspeh", f"Podaci su sačuvani u:\n{save_path}")
                self.status_label.config(text="Obrada završena.", fg="green")
            else:
                messagebox.showinfo("Otkazano", "Čuvanje Excel fajla otkazano.")
        else:
            messagebox.showwarning("Upozorenje", "Nema podataka za snimanje.")

if __name__ == "__main__":
    root = TkinterDnD.Tk()
    app = PasosOCRApp(root)
    root.mainloop()

