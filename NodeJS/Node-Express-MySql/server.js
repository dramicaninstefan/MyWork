const dotenv = require('dotenv'); // ALLOWS ENVIRONMENT VARIABLES TO BE SET ON PROCESS.ENV SHOULD BE AT TOP
dotenv.config();
const { verifyAccessToken } = require('./config/jwt.js');

const morgan = require('morgan');
const createError = require('http-errors');

const postRoutes = require('./routes/postRoutes.js');
const authRoutes = require('./routes/authRoutes.js');

const express = require('express');
const cors = require('cors');

const app = express();

app.use(morgan('tiny'));
app.use(cors());

// Middleware
app.use(express.json()); // parse json bodies in the request object

app.get('/', verifyAccessToken, async (req, res, next) => {
  res.send('Hello from express.');
});

// Redirect requests to endpoint starting with /posts to postRoutes.js
app.use('/posts', postRoutes);

// Redirect requests to endpoint starting with /auth to authRoutes.js
app.use('/auth', authRoutes);

app.use((req, res, next) => {
  next(createError.NotFound());
});

// Global Error Handler. IMPORTANT function params MUST start with err
app.use((err, req, res, next) => {
  res.status(err.status || 500);
  res.send({
    error: {
      status: err.status || 500,
      message: err.message,
    },
  });
});

// Listen on pc port
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server running on PORT ${PORT}`));
