require('dotenv').config(); // ALLOWS ENVIRONMENT VARIABLES TO BE SET ON PROCESS.ENV SHOULD BE AT TOP

const morgan = require('morgan');
const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');

const app = express();

// Middleware
app.use(cors());
app.use(morgan('tiny'));
app.use(express.json()); // parse json bodies in the request object
app.use(bodyParser.json());

// Redirect requests to endpoint starting with /posts to postRoutes.js
app.use('/blogs', require('./routes/blogRoutes'));

// Global Error Handler. IMPORTANT function params MUST start with err
app.use((err, req, res, next) => {
  console.log(err.stack);
  console.log(err.name);
  console.log(err.code);

  res.status(500).json({
    message: 'Something went rely wrong',
  });
});

// Listen on pc port
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server running on PORT ${PORT}`));
