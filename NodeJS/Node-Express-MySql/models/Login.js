const db = require('../config/db');
const bcrypt = require('bcrypt');

class login {
  constructor(email, password) {
    this.email = email;
    this.password = password;
  }

  async loginUser() {
    let sql = `SELECT * FROM users WHERE email = ?`;

    const [user, _] = await db.query(sql, [this.email]);

    if (user.length === 0) {
      return 'empty';
    }

    const isValid = await bcrypt.compare(this.password, user[0].password);

    if (!isValid) {
      return 'notValid';
    }
    return user;
  }
}

module.exports = login;
