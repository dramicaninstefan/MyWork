const db = require('../config/db');

class Blog {
  constructor(title, description, category, image) {
    this.title = title;
    this.description = description;
    this.category = category;
    this.image = image;
  }

  async save() {
    // const date = new Date();
    // const formattedForDatabase = date.toISOString();

    const date = new Date();
    const formattedForDatabase = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')} ${date
      .getHours()
      .toString()
      .padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')}`;

    let sql = `INSERT INTO blogs(title, description, category, image, CreatedAt) VALUES ('${this.title}', '${this.description}', '${this.category}', '${this.image}', '${formattedForDatabase}')`;

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
