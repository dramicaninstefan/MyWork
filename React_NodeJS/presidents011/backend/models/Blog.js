const db = require('../config/db');

class Blog {
  constructor(title, description, category, image) {
    this.title = title;
    this.description = description;
    this.category = category;
    this.image = image;
  }

  async save() {
    let d = new Date();
    let yyyy = d.getFullYear();
    let mm = d.getMonth() + 1;
    let dd = d.getDate();

    let createdAtDate = `${yyyy}-${mm}-${dd}`;

    let sql = `INSERT INTO blogs(title, description, category, image, CreatedAt) VALUES ('${this.title}', '${this.description}', '${this.category}', '${this.image}', '${createdAtDate}')`;

    const [newBlog, _] = await db.execute(sql);

    return newBlog;
  }

  static findAll() {
    let sql = 'SELECT * FROM blogs;';

    return db.execute(sql);
  }

  static findById(id) {
    let sql = `SELECT * FROM blogs WHERE id = ${id};`;

    return db.execute(sql);
  }
}

module.exports = Blog;
