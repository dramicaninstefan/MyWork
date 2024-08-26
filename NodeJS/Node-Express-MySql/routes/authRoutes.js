const express = require('express');
const userControllers = require('../controllers/userControllers.js');
const router = express.Router();

// @route GET && POST - /auth/
router.route('/register').post(userControllers.registerNewUser);

router.route('/login').post(userControllers.loginUser);

router.route('/refresh-token').post(userControllers.refreshToken);

router.route('/logout').delete(userControllers.logoutUser);

module.exports = router;
