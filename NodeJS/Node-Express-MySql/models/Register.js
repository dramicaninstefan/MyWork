const db = require('../config/db');
const bcrypt = require('bcrypt');

class Register {
  constructor(name, email, password) {
    this.name = name;
    this.email = email;
    this.password = password;
  }

  async registerUser() {
    let d = new Date();
    let yyyy = d.getFullYear();
    let mm = d.getMonth() + 1;
    let dd = d.getDate();

    const hashPassword = await bcrypt.hash(this.password, 15);

    let createdAtDate = `${yyyy}-${mm}-${dd}`;

    let sql = `INSERT INTO users(name, email, password, created_at) VALUES (?, ?, ?, ?)`;

    const [newUser, _] = await db.query(sql, [this.name, this.email, hashPassword, createdAtDate]);

    return newUser;
  }
}

module.exports = Register;
