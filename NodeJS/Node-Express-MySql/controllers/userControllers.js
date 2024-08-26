const Register = require('../models/Register');
const Login = require('../models/Login');
const createError = require('http-errors');
const { signAccessToken, signRefreshToken, verifyRefreshToken } = require('../config/jwt.js');

exports.registerNewUser = async (req, res, next) => {
  try {
    let { name, email, password } = req.body;
    let user = new Register(name, email, password);

    user = await user.registerUser();

    res.status(201).json({ message: 'User created.' });
  } catch (error) {
    console.log(error);
    next(error);
  }
};

exports.loginUser = async (req, res, next) => {
  try {
    let { email, password } = req.body;
    let user = new Login(email, password);

    user = await user.loginUser();

    if (user === 'empty' || user === 'notValid') {
      res.status(404).json({ message: 'Invalid email/password!' });
    } else {
      const refreshToken = await signRefreshToken(user[0].id);
      const accessToken = await signAccessToken(user[0].id);
      res.status(200).send({ accessToken, refreshToken });
    }
  } catch (error) {
    console.log(error);
    next(error);
  }
};

exports.refreshToken = async (req, res, next) => {
  try {
    const { refreshToken } = req.body;
    if (!refreshToken) throw createError.BadRequest();

    const userId = await verifyRefreshToken(refreshToken);

    const accessToken = await signAccessToken(userId);
    const refToken = await signRefreshToken(userId);

    res.send({ accessToken: accessToken, refreshToken: refToken });
  } catch (error) {
    next(error);
  }
};

exports.logoutUser = async (req, res, next) => {
  try {
    const { refreshToken } = req.body;

    const userId = await verifyRefreshToken(refreshToken);

    if (!refreshToken) throw createError.BadRequest();
  } catch (error) {
    next(error);
  }
};
